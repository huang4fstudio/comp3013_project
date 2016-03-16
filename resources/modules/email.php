
      <?php
      require_once("users.php");
      require_once("items.php");
      require_once("auctions.php");
      require_once("bids.php");

      function send_update_on_auctions($auction){

         $item_id = $auction["item_id"];
         $item = get_item_id($item_id);

         $seller = find_email($auction["seller_id"]);

         $to = $seller["email"];
         $subject = "Some updates on your auctions";
         echo $to;
         
         $message = "<b>Someone's recently bid on your items..</b><br>";
         $message .= "<h1>".$item["name"]."</h1><br>";

         $highest = get_highest_bid($auction["id"]);
         
         $message .= "<b>Your new bid</b><br>";
         $message .= "<b>Item:".$item["name"]."</b><br>";
         $message .= "<b>User :".$highest["user_id"]."</b><br>";
         $message .= "<b>Price :".$highest["price"]."</b><br>";
         $message .= "<b>Time : ".$highest["time"]."</b><br>";

         
         echo $message;
         
         $header = "From:no-reply-auctions@gmail.com \r\n";
        
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
      
         $seller = find_email($auction["seller_id"]);
        
         $to = $seller["email"];
         //$to = "kirthi.muralikrishnan.14@ucl.ac.uk";
         $subject = "We have some updates on your items";
         
         $message = "<b>Someone's recently viewed your items..</b>";
         $message .= "<h1> The item recently viewed is: ".$item["name"]."</h1><br>";

         $message .="<h2>Congratulations!! You have ".$auction["views"]."</h2>";
         $message .="<h2>views</h2></br>"
         $header = "From:no-reply-auctions@gmail.com\r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         echo $message;
         $retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         } else {
            echo "Message could not be sent...";
         }
         }

         function send_update_on_watch_list($auction, $id){

         $item_id = $auction["item_id"];
         $results = get_watching_users_item($item_id);
         foreach ($results as $row) {
            if(row["user_id"]!=$id){
            $watcher = find_email($row["user_id"]);

            $to = $watcher["email"];
            $subject = "Some updates on your watchlist";
         
         $message = "<b>Someone's recently viewed your items..</b><br>";
         $message .= "<h1>".$item["name"]."</h1><br>";

         $highest = get_highest_bid($auction["id"]);
         
         $message .= "<b>A new bid was made</b><br>";
         $message .= "<b>User :".$highest["user_id"]."</b><br>";
         $message .= "<b>Price :".$highest["price"]."</b><br>";
         $message .= "<b>Time : ".$highest["time"]."</b><br>";

         
         
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

         
      }


   function send_update_on_sold($auction){

        $item_id = $auction["item_id"];
         $item = get_item_id($item_id);

         $seller = find_email($auction["seller_id"]);

         $to = $seller["email"];
         $subject = "Your item has been sold";
         
         $message = "<b>Someone's recently bought your items..</b><br>";
         $message .= "<h1>".$item["name"]."</h1><br>";

         $highest = get_highest_bid($auction["id"]);
         
         $message .= "<b>Buyer</b><br>";
         $message .= "<b>Item:".$item["name"]."</b><br>";
         $message .= "<b>User :".$highest["user_id"]."</b><br>";
         $message .= "<b>Price :".$highest["price"]."</b><br>";
         $message .= "<b>Time : ".$highest["time"]."</b><br>";

         
         echo $message;
         
         $header = "From:no-reply-auctions@gmail.com \r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
         }
function send_update_on_not_sold($auction){

        $item_id = $auction["item_id"];
         $item = get_item_id($item_id);

         $seller = find_email($auction["seller_id"]);

         $to = $seller["email"];
         $subject = "Your item has been sold";
         
         $message = "<b>Updates on your item</b><br>";
         $message .= "Item: <h1>".$item["name"]."</h1><br>";

         
         $message .= "<b>Item:".$item["name"]."</b><br>";
         
         $message .= "<h1> Unfortunately noone has bought your item and it has been removed from the auction..<br>"
         
         echo $message;
         
         $header = "From:no-reply-auctions@gmail.com \r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
         }
       function send_update_on_bought($auction){

        $item_id = $auction["item_id"];
         $item = get_item_id($item_id);

         

         
         $subject = "Receipt for your new item";
         
         $message = "<b>You have recently bought an item</b><br>";
         $message .= "<h1>".$item["name"]."</h1><br>";

         $highest = get_highest_bid($auction["id"]);
         $seller = find_email($highest["user_id"]);
         $to = $seller["email"];
         $message .= "<b>Seller</b><br>";
         $message .= "<b>Item:".$item["name"]."</b><br>";
         $message .= "<b>User :".$auction["seller_id"]."</b><br>";
         $message .= "<b>Price :".$highest["price"]."</b><br>";
         $message .= "<b>Time : ".$highest["time"]."</b><br>";

         
         echo $message;
         
         $header = "From:no-reply-auctions@gmail.com \r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
         }  
      ?>



      
   
