<?php
    require_once("database_connection.php");
    
    function get_auctions_id($id) {
        return db_fetch_array("SELECT * FROM Auction WHERE id='$id'");
    }

    function get_auctions_name($name) {
        $q_string = $name . '%';
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id WHERE i.name LIKE '$q_string'");
    }

    function get_all_auctions() {
        return db_fetch_all("SELECT * FROM Auction");
    }

    function get_all_auctions_seller($uid) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id WHERE i.owner_id='$uid'");
    }

    function get_auctions_category($category) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item AS i ON a.item_id = i.id INNER JOIN Item_Category AS c ON c.item_id = b.id WHERE c.category_id = '$category'");
    }

    function get_auctions_buyer($uid) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Bid AS b ON a.id = b.auction_id AND b.user_id='$uid'");
    }

    function new_auction($item_id, $reserve_price, $end_date,  $seller_id) {
        return db_query("INSERT INTO Auction (id, reserve_price, end_date, item_id, seller_id, highest_bid_id) VALUES (DEFAULT, '$reserve_price', '$end_date', '$item_id', '$seller_id', NULL)");
    }

    function get_recommended_auctions($uid) {
        $auction_ids = "(SELECT auction_id FROM Bid WHERE user_id='$uid')";
        $user_ids = "(SELECT user_id FROM Bid WHERE auction_id=" . $auction_ids .")";
        $final_auctions = "SELECT a.* FROM Auction AS a INNER JOIN Bid As b ON a.id = b.auction_id WHERE b.user_id=". $users_ids;
        return db_fetch_all($final_auctions);
    }
?>
