<?php
    require_once("database_connection.php");
    function make_bid($auction_id, $price, $user_id) {
        $result = db_query("INSERT INTO Bid (id, price, time, user_id, auction_id) VALUES (DEFAULT, '$price', DEFAULT, '$user_id', '$auction_id')");
    }

    function get_highest_bid($auction_id) {
        return db_fetch_array("SELECT * FROM Bid WHERE auction_id='$auction_id' ORDER BY id DESC LIMIT 1"); 
    }

    function get_all_bids_user($uid) {
        return db_fetch_all("SELECT * FROM Bid WHERE user_id='$uid'");
    }

    function get_num_bids_auction($auction_id) {
        $results = db_query("SELECT COUNT(*) AS count FROM Bid WHERE auction_id ='$auction_id'");
        $row = mysqli_fetch_assoc($results);
        return $row['count'];
    }

     function get_bids_auction($auction_id) {
        
         return db_fetch_all("SELECT * FROM Bid WHERE auction_id ='$auction_id'");
    }


?>
