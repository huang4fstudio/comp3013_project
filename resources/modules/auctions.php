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

    function get_auctions_selling($uid) {
        return db_fetch_all("SELECT * FROM Auction WHERE seller_id='$uid' AND end_date > now()");
    }

    function get_auctions_sold($uid) {
        return db_fetch_all("SELECT * FROM Auction WHERE seller_id='$uid' AND end_date <= now()");
    }

    function get_auctions_category($category) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item AS i ON a.item_id = i.id INNER JOIN Item_Category AS c ON c.item_id = b.id WHERE a.end_date > now() AND c.category_id = '$category'");
    }

    function get_auctions_searchTermOnly($term){
      $q_string = '%' . $term . '%';
      return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id WHERE a.end_date > now() AND i.name LIKE '$q_string'");
    }

    function get_auctions_searchTerm_category($category, $term){
        $q_string = '%' . $term . '%';
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id INNER JOIN Item_category as c ON i.id = c.item_id WHERE a.end_date > now() AND c.category_id='$category' AND i.name LIKE '$q_string' ");
    }

    // function sort_price_lohi($term){
    //   $q_string = '%' . $term . '%';
    //   return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id WHERE a.end_date > now() AND i.name LIKE '$q_string' ORDER BY a.reserve_price ASC");
    // }
    //
    // function sort_price_hilo($term){
    //   $q_string = '%' . $term . '%';
    //   return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id WHERE a.end_date > now() AND i.name LIKE '$q_string' ORDER BY a.reserve_price DESC");
    // }
    //
    // function sort_price_lohi_category($category, $term){
    //   $q_string = '%' . $term . '%';
    //   return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id INNER JOIN Item_category as c ON i.id = c.item_id WHERE a.end_date > now() AND c. category_id='$category' AND i.name LIKE '$q_string' ORDER BY a.reserve_price ASC");
    // }
    //
    // function sort_price_hilo_category($category, $term){
    //   $q_string = '%' . $term . '%';
    //   return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Item As i ON a.item_id = i.id INNER JOIN Item_category as c ON i.id = c.item_id WHERE a.end_date > now() AND c. category_id='$category' AND i.name LIKE '$q_string' ORDER BY a.reserve_price DESC");
    // }

    function get_auctions_buyer($uid) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Bid AS b ON a.id = b.auction_id WHERE b.user_id='$uid' AND a.end_date > now()");
    }

    function get_auctions_buyer_won($uid) {
        $highest_bid_ids = "(SELECT MAX(id) AS mid, b1.auction_id AS maid FROM Bid b1 GROUP BY b1.auction_id)";
        $highest_bids = "(SELECT user_id, auction_id FROM Bid AS fullBid INNER JOIN " . $highest_bid_ids . "AS highestBids ON highestBids.mid=fullBid.id)";
        $final_query = "SELECT * FROM Auction AS a INNER JOIN " . $highest_bids . " AS hb ON a.id=hb.auction_id WHERE hb.user_id='$uid' AND end_date <= now()";
        return db_fetch_all($final_query);
    }

    function new_auction($item_id, $reserve_price, $end_date, $seller_id) {
        return db_query("INSERT INTO Auction (id, reserve_price, end_date, item_id, seller_id, views) VALUES (DEFAULT, '$reserve_price', FROM_UNIXTIME('$end_date'), '$item_id', '$seller_id', 0)");
    }

    function get_recommended_auctions($uid) {
        $auction_ids = "(SELECT DISTINCT auction_id AS uaid FROM Bid WHERE user_id='$uid')";
        $user_ids = "(SELECT user_id, auction_id AS oaid FROM Bid others INNER JOIN" . $auction_ids ."AS au ON au.uaid=others.auction_id)";
        $final_auctions = "SELECT a.* FROM Auction AS a INNER JOIN " . $user_ids . " AS u ON u.oaid=a.id WHERE a.end_date > now() GROUP BY a.id";
        return db_fetch_all($final_auctions);
    }

    function get_expired_auctions() {
        return db_fetch_all("SELECT * FROM Auction WHERE end_date > DATE_SUB(now(), INTERVAL 30 MINUTE)");
    }

    function check_auction_feedback($id, $user_id) {
        $expired_auction = !get_auctions_id_current("$id");
        $highest_bid = get_highest_bid($id);
        return $expired_auction && $highest_bid["id"] === $id;
    }

    function update_auction_views($id) { 
        return db_query("UPDATE Auction SET views = views + 1 WHERE id='$id'");
    }
?>
