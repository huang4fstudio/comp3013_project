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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.js"></script>
    <script src="js/ebid.js"></script>

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
        $category = $_REQUEST['categoryQuery'];
        $searchQuery = $_REQUEST['searchQuery'];


        if($category == 'All'){
          $results = get_auctions_searchTermOnly($searchQuery);
          echo("<h4>Search results for '$searchQuery' in All Categories</h4>");
        }
        else{
          $results = get_auctions_searchTerm_category($category, $searchQuery);
          echo("<h4>Search results for '$searchQuery' in '$category'</h4>");
        }
        ?>

        <h4 id="sortButton">Sort</h4>
        <div class="input-group" id="sortDropdown">
              <select id="sortQuery" class="form-control">
                <option disabled selected>-</option>
                <option value="priceHiLo">Price High-Low</option>
                <option value="priceLoHi">Price Low-High</option>
              </select>
        </div>

        <div id="searchResults">
          <?php
            require("../resources/modules/auctions_thumbnail.php");

            if ($results != NULL){
              echo item_html($results);
            }
            else{
              echo("<h3>Uh oh! It looks like we couldn't find any items that matched.</h3>");
            }
           ?>
        </div>
      </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>

  </body>
</html>
