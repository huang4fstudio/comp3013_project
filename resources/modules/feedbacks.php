<?php
    require_once("database_connection.php");
    function submit_feedback($buyer_id, $auction_id, $rating, $comment) {
        return db_query("INSERT INTO Bid (buyer_id, auction_id, rating, comment) VALUES ('$buyer_id', '$auction_id', '$rating', '$comment')");
    }

    function get_feedback($auction_id) {
        return db_fetch_array("SELECT * FROM Feedback WHERE auction_id='$auction_id'");
    }

?>
