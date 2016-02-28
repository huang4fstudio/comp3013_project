<?php
   session_start();
   require_once("../resources/modules/check_login.php");
   check_login(true);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>
    <?php
      require_once("../resources/templates/header.php");
    ?>
    <!--Wrapper for page content-->
    <div class="wrapper">
        <div id="indexCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#indexCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#indexCarousel" data-slide-to="1"></li>
          <li data-target="#indexCarousel" data-slide-to="2"></li>
          <li data-target="#indexCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <p class="carousel-caption">
                Selling is as easy as <br> 1, 2, 3! <br>
                Learn more!
            </p>
            <img src="img/seller.jpg" alt="Seller">
          </div>

          <div class="item">
            <p class="carousel-caption">
                Deals on cameras here!
            </p>
            <img src="img/technology.jpg" alt="Technology">
          </div>

          <div class="item">
            <p class="carousel-caption">
                Fashion ideas <br> for spring
            </p>
            <img src="img/accessories.jpg" alt="Fashion and Accessories">
          </div>

          <div class="item">
            <p class="carousel-caption">
                New consoles 50% off
            </p>
            <img src="img/gaming.jpg" alt="Gaming">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#indexCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#indexCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--End of carousel-->

      <h4>Featured Auctions</h4>

    </div>      <!--End of wrapper for page content, beginning tag in header.php-->


    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
