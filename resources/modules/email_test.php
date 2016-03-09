<?php
 error_reporting(E_ALL);
    ini_set('display_errors', 1);
     require_once("email.php");
     
     require_once("auctions.php");
     require_once("users.php");

     

     $results = get_all_auctions();
     foreach ($results as $auction) {
     		echo "okies";
     	send_update_on_views($auction);
        send_update_on_auctions($auction);
 
     }
   

      ?>



      
   