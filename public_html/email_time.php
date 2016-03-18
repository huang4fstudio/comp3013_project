<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 require_once("../resources/modules/email.php"); 
 require_once("../resources/modules/auctions.php");
 require_once("../resources/modules/users.php");

 $results = get_all_auctions();
 foreach ($results as $auction) 
 {
  send_update_on_views($auction);
       
 
 
 }
   
   $results1 = get_auctions_sold_today();
   foreach ($results1 as $auction1) {
   	send_update_on_bought($auction1);
   	send_update_on_sold($auction1);
   }

   $results2 = get_auctions_not_sold_today();
   foreach ($results2 as $auction2) {
   	send_update_on_not_sold($auction2);
   }


?>



      
   
