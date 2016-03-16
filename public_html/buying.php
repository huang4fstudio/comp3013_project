<?php
    session_start();
    require_once("../resources/modules/check_login.php");
    require_once("../resources/modules/auctions_thumbnail.php");
    require_once("../resources/modules/auctions.php");
    check_login(true);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Bids</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>

    <?php
      require("../resources/templates/header.php");
    ?>
    <!--Wrapper for page content-->
    <div class="wrapper">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Bids/Buying</li>
      </ul>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Current Bids</h3>
        </div>
        <div class="panel-body" class="sell-item">
        <?php
            $auctions_bidded = get_auctions_buyer($_SESSION["id"]);
            if ($auctions_bidded) {
                echo item_html($auctions_bidded);
            } else { ?>
          You currently aren't bidding on anything. Explore EBid using the search bar!
          <?php } ?>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Bought/Won</h3>
        </div>
        <div class="panel-body" class="sell-item">
        <?php
          $auctions_won = get_auctions_buyer_won($_SESSION["id"]);
          if ($auctions_won) {
            echo item_html_won($auctions_won);
        } else { ?>
          You have no won items.
          <?php } ?>
        </div>
      </div>
    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
