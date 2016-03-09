
      <?php
      require_once("users.php");
      require_once("items.php");
      require_once("auctions.php");
      require_once("bids.php");

      function send_update_on_auctions($auction){

         $item_id = $auction["item_id"];
         $item = get_item_id($item_id);

         $seller = find_email($item["owner_id"]);

         $to = $seller["email"];
         $subject = "Some updates on your items";
         
         $message = "<b>Someone's recently viewed your items..</b>";
         $message .= "<h1>".$item["name"]."</h1>";

         $highest = get_highest_bid($auction["id"]);
         
         $message .= "<b>Your new bid</b>";
         $message .= "<b>User :".$highest["user_id"]."</b>";
         $message .= "<b>Price :".$highest["price"]."</b>";
         $message .= "<b>Time : ".$highest["time"]."</b>";

         
         echo $message;
         
         $header = "From:no@gmail.com \r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
         }

         function send_update_on_views($auction){

         $item_id = $auction["item_id"];
         $item = get_item_id($item_id);
      
         $seller = find_email($item["owner_id"]);
        
         $to = $seller["email"];
         //$to = "kirthi.muralikrishnan.14@ucl.ac.uk";
         $subject = "We have some updates on your items";
         
         $message = "<b>Someone's recently viewed your items..</b>";
         $message .= "<h1>".$item["name"]."</h1>";

         $message .="<h2>You have ".$auction["views"]."</h2>";
         
         $header = "From:no@gmail.com \r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         echo $message;
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
         }

         function send_update_on_watch_list($auction){

         $item_id = $auction["item_id"];
         $results = get_watching_users_item($item_id);
         foreach ($results as $row) {
            $watcher = find_email($row["user_id"]);

            $to = $watcher["email"];
            $subject = "Some updates on your items";
         
         $message = "<b>Someone's recently viewed your items..</b>";
         $message .= "<h1>".$item["name"]."</h1>";

         $highest = get_highest_bid($auction["id"]);
         
         $message .= "<b>A new bid was made</b>";
         $message .= "<b>User :".$highest["user_id"]."</b>";
         $message .= "<b>Price :".$highest["price"]."</b>";
         $message .= "<b>Time : ".$highest["time"]."</b>";

         
         
            $header = "From:no-response@auction.com \r\n";
        
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
         echo $message;
            $retval = mail ($to,$subject,$message,$header);
         
            if( $retval == true ) {
            echo "Message sent successfully...";
            }else {
            echo "Message could not be sent...";
         }
      }

         
      }
      ?>



      
   