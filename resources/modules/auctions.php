<?php
    require_once("./database_connection.php");
    function get_all_auctions() {
       return db_fetch_all("SELECT * FROM Auction");
    }

    function get_all_auctions_user($username) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Bid AS b ON a.id = b.auction_id AND b.user_id='$id'");
    }
?>
