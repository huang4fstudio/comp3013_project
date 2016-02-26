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
      <div class="jumbotron">
        <h1>Carousel Slider</h1>

      </div>
      <p>Featured Auctions</p>

      <!--End of wrapper for page content, beginning tag in header.php-->
      </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
