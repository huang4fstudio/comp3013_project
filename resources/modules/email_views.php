<?php
 
     require_once("email.php");
     
      require_once("auctions.php");
      require_once("users.php");
     
     $results = get_all_auctions()
      while($auction = mysql_fetch_assoc($result))
      {
        send_update_on_views($auction);
      } 
      

      ?>



      
   