<?php
    session_start();
    require_once("../resources/modules/check_login.php");
    check_login(true);
    require_once("../resources/modules/watchlists.php");
    require_once("../resources/modules/auctions_thumbnail.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Watchlist</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
        <li class="active">Watchlist</li>
      </ul>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Watchlist</h3>
        </div>
        <div class="panel-body" class="sell-item">
        <?php $auctions_watching = get_watched_items_user($_SESSION["id"]);
            if ($auctions_watching) {
                echo item_html($auctions_watching);
            } else { ?>
          You currently aren't watching any items.
          <?php } ?>
        </div>
      </div>


    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
