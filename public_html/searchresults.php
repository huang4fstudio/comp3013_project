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
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
      require("../resources/templates/header.php");
    ?>
    <!--Wrapper for page content-->
    <div class="wrapper">

      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Search</li>
      </ul>

      <?php
        require("../resources/modules/auctions.php");

        $searchQuery = $_REQUEST['searchQuery'];
        $category = $_REQUEST['categoryQuery'];

        // echo $searchQuery;
        // echo $category;
        echo("<h4>Search results for '$searchQuery'</h4>");

        if($category == 'All'){
          $results = get_auctions_searchTermOnly($searchQuery);
        }
        else{
          $results = get_auctions_searchTerm_category($category, $searchQuery);
        }

        require("../resources/modules/auctions_thumbnail.php");

        if ($results != NULL){
          echo item_html($results);
        }
        else{
          echo("<h3>Uh oh! It looks like we couldn't find any items that matched.</h3>");
        }
       ?>

    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>

  </body>
</html>
