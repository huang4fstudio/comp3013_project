<?php
    require_once("database_connection.php");
    
    function submit_feedback($buyer_id, $auction_id, $rating, $comment) {
        return db_query("INSERT INTO Feedback (id, buyer_id, auction_id, rating, comment) VALUES (DEFAULT, '$buyer_id', '$auction_id', '$rating', '$comment')");
    }

    function get_feedback($auction_id) {
        return db_fetch_array("SELECT * FROM Feedback WHERE auction_id='$auction_id'");
    }

    function get_new_avg($uid) {
        $results = db_query("SELECT AVG(f.rating) AS avg FROM Feedback AS f INNER JOIN Auction AS a ON a.id=f.auction_id WHERE a.seller_id='$uid'");
        $data = mysqli_fetch_assoc($results);
        return $data['avg'];
    }


?>
