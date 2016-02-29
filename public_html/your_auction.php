<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Auction</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
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
              <img src="img/placeholder.png" class="auction-item-img" data-imagezoom="true">
            </div>

            <div class="item">
              <img src="img/placeholder.png"class="auction-item-img" data-imagezoom="true">
            </div>

            <div class="item">
              <img src="img/placeholder.png" class="auction-item-img" data-imagezoom="true">
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
            <h3 class="panel-title">Item Name</h3><!--PHP NEEDED: item name-->
          </div>

          <div class="panel-body">
            <div class="seller-info">
              <span class="selling-info">Your Profile: <a href="#">Seller link</a></span><!--PHP NEEDED: seller profile link-->
              <span class="selling-info">Rating: <span name="seller-rating"></span>0%</span><!--PHP NEEDED: seller rating-->
              <span class="selling-info">Bids: </span><span name="numBids">0</span><!--PHP NEEDED: number of bids-->
              <br>
              <!--PHP NEEDED: end date-->
              <!--JS or PHP NEEDED: Countdown from current time until end date-->
              <span class="selling-info">End Date: </span><span name="endDate">DD/MM/YYYY 00:00</span><!--PHP NEEDED: end date-->
            </div>
            <h4>Details</h4>
            <p><!--PHP NEEDED: item details-->
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Phasellus a tortor non massa condimentum facilisis in non est.
              Ut vel urna felis. Ut iaculis sem et urna condimentum rutrum at in odio.
              Nam at magna quis erat lacinia volutpat non a neque. Mauris congue justo
              tortor, vel suscipit justo feugiat sed. Praesent justo ligula, dapibus
              ac ligula vitae, posuere tincidunt justo.
            </p>
          </div>
          <div class="bid">
          </div>
        </div>

        <!--Reserve Price-->
        <div class="item-bid">
          <div class="col-sm-4">
            Reserve Price: £<span name="reservePrice">0.00</span> <!--PHP NEEDED: reserve price-->
          </div>
        </div>

        </div>
      </div><!--End of auction details-->
    </div><!--End of row-->

      <!--Bids-->
      <div class="row">
        <h4>Bids</h4>

      </div>


    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
