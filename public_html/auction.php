<?php
    session_start();
    require_once("../resources/modules/check_login.php");
    require_once("../resources/modules/watchlists.php");
    require_once("../resources/modules/email.php");
    check_login(true);

    if (!isset($_GET['auction_id'])) {
        header("location:index.php");
        die();
    }

    require_once("../resources/modules/auctions.php");
    require_once("../resources/modules/items.php");
    require_once("../resources/modules/bids.php");
    require_once("../resources/modules/users.php");


    $auction = get_auctions_id($_GET['auction_id']);
    if (!$auction) {
        header("location:index.php");
        die();
    }
    update_auction_views($auction['id']);
    $highest_bid = get_highest_bid($auction['id']);
    $item = get_item_id($auction['item_id']);
    $seller = find_user_id($auction['seller_id']);
    $seller_rating = "No Seller Rating";

    if ($seller['seller_rating']) {
        $seller_rating = $seller['seller_rating'];
    }

    $lowest_price = $auction['start_price'];
    $highest_bid_username = "N/A";
    $highest_bid_price = "No Bids Yet";
    if ($highest_bid) {
        $lowest_price = $highest_bid['price'];
        $highest_bid_username = find_user_id($highest_bid['user_id'])["name"];
        $highest_bid_price = $lowest_price;
    }
    $lowest_price = $lowest_price + 1;

    if (isset($_POST['watchlist'])){
      add_watchlist($_SESSION['id'], $auction['id']);
      // send_update_on_watch_list($auction, $_SESSION['id']);
    }

    if (isset($_POST['placeBid'])) {
        if ($auction['seller_id'] === $_SESSION['id'] || $lowest_price > floatval($_POST['yourBid'])) {
            echo 'Your Bid is not Valid';
        } else {
            make_bid($auction['id'], floatval($_POST['yourBid']), $_SESSION['id']);
            if ($highest_bid) {
               send_update_on_outbid($auction, $highest_bid["user_id"]);
            }
//            send_update_on_auctions($auction);
            send_update_on_watch_list($auction, $_SESSION['id'], $highest_bid["user_id"]);
        }
    }

    $auction = get_auctions_id($_GET['auction_id']);
    $bids_count = get_num_bids_auction($auction['id']);
    $highest_bid = get_highest_bid($auction['id']);

    $lowest_price = $auction['start_price'];
    $highest_bid_username = "N/A";
    $highest_bid_price = "No Bids Yet";
    if ($highest_bid) {
        $lowest_price = $highest_bid['price'];
        $highest_bid_username = find_user_id($highest_bid['user_id'])["name"];
        $highest_bid_price = $lowest_price;
    }
    $lowest_price = $lowest_price + 1;


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Auction</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="http://www.jqueryscript.net/demo/Simple-jQuery-Image-Magnifier-Enlargement-Plugin-imagezoom/imagezoom.js"></script>
  </head>
  <body>

    <?php
      require("../resources/templates/header.php");
    ?>
    <!--Wrapper for page content-->
    <div class="wrapper">
      <div class="row">
      <!--Item Image Gallery-->
        <div id="auctionCarousel" class="carousel slide" interval=false>
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#auctionCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#auctionCarousel" data-slide-to="1"></li>
            <li data-target="#auctionCarousel" data-slide-to="2"></li>
            <li data-target="#auctionCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox"> <!--PHP NEEDED: images for gallery-->
            <div class="item active">
              <img src="img/image_view.php?item_id=<?= $item["id"] ?>" class="auction-item-img" data-imagezoom="true">
            </div>
            <div class="item">
              <img src="img/placeholder.png" class="auction-item-img" data-imagezoom="true">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#auctionCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#auctionCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <p class="image-zoom-caption">Mouseover image to zoom</p>
        </div>

      <!--Item Details-->
      <div class="auction-item-details">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?= $item['name'] ?></h3><!--PHP NEEDED: item name-->
          </div>

          <div class="panel-body">
            <div class="seller-info">
              <span class="selling-info">Seller: <a href="profile.php?user_id=<?= $seller["id"] ?>"><?= $seller["name"] ?></a></span><!--PHP NEEDED: seller profile link-->
              <span class="selling-info">Rating: <span name="seller-rating"></span><?= $seller_rating ?></span><!--PHP NEEDED: seller rating--> <br/>
              <span class="selling-info">Bids: </span><span name="numBids"><?= $bids_count ?></span><!--PHP NEEDED: number of bids-->
              <span class="selling-info">Highest Bid User: </span>
              <?php if ($highest_bid) { ?><a href="profile.php?user_id=<?= $highest_bid["user_id"] ?>" name="highestBid"><?= $highest_bid_username ?></a>
              <?php } else { ?>
              <span name="highestBid"><?= $highest_bid_username ?></span>
              <?php } ?>
              <br>
              <!--PHP NEEDED: end date-->
              <!--JS or PHP NEEDED: Countdown from current time until end date-->
              <span class="selling-info">End Date: </span><span name="endDate"><?= $auction['end_date'] ?></span>
            </div>
            <h4>Details</h4>
            <p><!--PHP NEEDED: item details-->
                <?= $item['description'] ?>
            </p>
          </div>
        </div>
        <?php if ($auction['seller_id'] === $_SESSION['id']) { ?>
        <span> This is your Auction, you can't bid! </span>
        <?php } else if (!get_auctions_id_current($auction["id"])) { ?>
        <span> Auction has ended, you can't bid anymore! </span>
        <?php } else { ?>
        <!--Bidding Section-->
        <div class="item-bid">
          <form class='form-horizontal' method="post">
            <div class="col-sm-4">
              Reserve Price: £<span name="reservePrice"><?= $auction['reserve_price'] ?></span> <!--PHP NEEDED: reserve price-->
            <span class="selling-info">Highest Bid Price: £</span><span name="numBids"><?= $highest_bid_price ?></span><!--PHP NEEDED: number of bids-->

            </div>
            <div class="bid-input">
              <div class="col-sm-4">
                <div class="input-group">
                  <span class="input-group-addon">£</span>
                  <input type="number" class='form-control' placeholder="<?= $lowest_price ?>" step="1" min="<?= $lowest_price ?>" name="yourBid">
                </div>
              </div>
              <div class="bid-button">
                  <button type="submit" class='btn btn-info' name="placeBid">Place Bid!</button>
              </div>
              <?php if (check_watchlist($_SESSION["id"], $auction["id"])) { ?>
              <span> This item is already in your watchlist. </span>
              <?php } else { ?>
              <div class="bid-button">
                  <button type="submit" class='btn btn-info' name="watchlist">Add to Watch List</button>
              </div>
              <?php } ?>
            </div>
          </form>
        </div>

        <?php } ?>
      </div><!--End of auction details-->
    </div><!--End of row-->

      <!--Related Items
      <div class="row">
        <h4>You may also be interested in</h4>
        <br>
        <div class="panel panel-default">
          <div class="panel-body" class="item-thumbnails">
          </div>
        </div>
      </div>


-->
    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
