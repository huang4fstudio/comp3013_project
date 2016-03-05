
      <?php

      function find_user_username_password($email){
         $to = $email;
         $subject = "Auctions";
         
         $message = "<b>We have some new bids for you!!!</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:no-response@auction.com \r\n";
        
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



      
   