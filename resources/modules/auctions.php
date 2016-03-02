<?php
    require_once("database_connection.php");
    function get_all_auctions() {
       return db_fetch_all("SELECT * FROM Auction");
    }

    function get_all_auctions_category($category) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item AS i ON a.item_id = b.id INNER JOIN Item_Category AS c ON c.item_id = b.id WHERE c.category_id = '$category'");
    }

    function get_all_auctions_user($username) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Bid AS b ON a.id = b.auction_id AND b.user_id='$id'");
    }

    function new_auction($item_id, $reserve_price, $end_date,  $seller_id) {
        return db_query("INSERT INTO Auction (id, reserve_price, end_date, item_id, seller_id, highest_bid_id) VALUES (DEFAULT, '$reserve_price', '$end_date', '$item_id', '$seller_id', NULL)");
    }
?>
