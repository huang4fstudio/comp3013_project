<?php   
    session_start();
    require_once("../resources/modules/check_login.php");
    check_login(true);

    if (!isset($_GET['user_id'])) {
        header("location:index.php");
        die();
    }
    require_once("../resources/modules/users.php");
    $user = find_user_id($_GET['user_id']);
    if (!$user) {
        header("location: index.php");
        die();
    }
    $seller_rating = "This user has not sold anything yet.";
    if ($user["seller_rating"]) {
        $seller_rating = $user["seller_rating"];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Profile</title>

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
    <h4>User: <?= $user["name"] ?></h4>
    <span> Rating: <?= $seller_rating ?> </span>
    <!--End of wrapper for page content, beginning tag in header.php-->
    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
