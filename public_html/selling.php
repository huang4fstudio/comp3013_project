<?php
    session_start();
    require_once("../resources/modules/check_login.php");
    check_login(true);
    require_once("../resources/modules/auctions.php");
    require_once("../resources/modules/auctions_thumbnail.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Selling</title>

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
        <li class="active">Selling</li>
      </ul>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Currently Selling</h3>
        </div>
        <div class="panel-body" class="sell-item">
        <?php $auctions_selling = get_auctions_selling($_SESSION["id"]);
            if ($auctions_selling) { 
                echo item_html($auctions_selling);
            } else { ?>
          You currently aren't selling anything. Click " 'Sell' to get started!"
          <?php } ?>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Sold</h3>
        </div>
        <div class="panel-body" class="sell-item">
         <?php $auctions_sold = get_auctions_sold($_SESSION["id"]);
            if ($auctions_sold) { 
                echo item_html($auctions_sold);
            } else { ?>
          You have no sold items.
          <?php } ?>
        </div>
      </div>

    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>

  </body>
</html>
