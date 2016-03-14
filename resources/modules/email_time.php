<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 require_once("../resources/email.php"); 
 require_once("../resources/auctions.php");
 require_once("../resources/users.php");

 $results = get_all_auctions();
 foreach ($results as $auction) 
 {
  

  send_update_on_views($auction);
  $time = $auction["end_date"];
  if(time == date('Y-m-d H:i:s'))
  {
     	send_update_on_sold($auction);
        send_update_on_bought($auction);
  }
 
 }
   

?>



      
   