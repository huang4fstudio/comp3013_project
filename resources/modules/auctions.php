<?php
    require_once("database_connection.php");

    function get_auctions_id($id) {
        return db_fetch_array("SELECT * FROM Auction WHERE id='$id'");
    }

     function get_auctions_id_current($id) {
        return db_fetch_array("SELECT * FROM Auction WHERE id='$id' AND end_date > now()");
    }


    function get_all_auctions() {
        return db_fetch_all("SELECT * FROM Auction WHERE end_date > now()");
    }

    function get_all_auctions_seller($uid) {
        return db_fetch_all("SELECT * FROM Auction WHERE seller_id='$uid'");
    }

    function get_auctions_category($category) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item AS i ON a.item_id = i.id INNER JOIN Item_Category AS c ON c.item_id = b.id WHERE a.end_date > now() AND c.category_id = '$category'");
    }

    function get_auctions_searchTermOnly($term){
      $q_string = $term . '%';
      return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id WHERE a.end_date > now() AND i.name LIKE '$q_string'");
    }
    function get_auctions_searchTerm_category($category, $term){
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id WHERE a.end_date > now() AND Category LIKE '$category' AND Name LIKE '$term' ");
    }

    function get_auctions_buyer($uid) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Bid AS b ON a.id = b.auction_id WHERE b.user_id='$uid'");
    }

    function new_auction($item_id, $reserve_price, $end_date) {
        return db_query("INSERT INTO Auction (id, reserve_price, end_date, item_id, highest_bid_id) VALUES (DEFAULT, '$reserve_price', FROM_UNIXTIME('$end_date'), '$item_id', NULL)");
    }

    function get_recommended_auctions($uid) {
        $auction_ids = "(SELECT auction_id FROM Bid WHERE user_id='$uid')";
        $user_ids = "(SELECT user_id FROM Bid WHERE auction_id=" . $auction_ids .")";
        $final_auctions = "SELECT a.* FROM Auction AS a INNER JOIN Bid As b ON a.id = b.auction_id WHERE a.end_date > now() AND b.user_id=". $users_ids;
        return db_fetch_all($final_auctions);
    }

    function get_expired_auctions() {
        return db_fetch_all("SELECT * FROM Auction WHERE end_date > DATE_SUB(now(), INTERVAL 30 MINUTE)");
    }

    function check_auction_feedback($id, $user_id) {
        return db_fetch_array("SELECT a.* FROM Auction AS a INNER JOIN Bid AS b ON a.highest_bid_id = b.id WHERE now() > end_date AND a.id='$id' AND b.id='$user_id'");
    }
?>
