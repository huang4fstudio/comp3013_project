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
        $final_query = "SELECT a.* FROM Auction AS a INNER JOIN " . highest_bids_query($uid) . " AS hb ON a.id=hb.auction_id WHERE hb.user_id='$uid' AND end_date <= now() AND hb.price >= a.reserve_price AND a.seller_id='$uid'"; 
        return db_fetch_all($final_query);
    }

    function get_auctions_sold_today() {
        $final_query = "SELECT a.* FROM Auction AS a INNER JOIN " . highest_bids_query($uid) . " AS hb ON a.id=hb.auction_id WHERE hb.user_id='$uid' AND end_date > DATE_SUB(now(), INTERVAL 30 MINUTE) AND end_date < now() AND hb.price >= a.reserve_price"; 
        return db_fetch_all($final_query);
    }

    function get_auctions_not_sold_today() {
        $final_query = "SELECT a.* FROM Auction AS a INNER JOIN " . highest_bids_query($uid) . " AS hb ON a.id=hb.auction_id WHERE hb.user_id='$uid' AND end_date > DATE_SUB(now(), INTERVAL 30 MINUTE) AND end_date < now() AND hb.price < a.reserve_price"; 
        return db_fetch_all($final_query);
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

    function highest_bids_query($uid) {
        $highest_bid_ids = "(SELECT MAX(id) AS mid, b1.auction_id AS maid FROM Bid b1 GROUP BY b1.auction_id)";
        $highest_bids = "(SELECT user_id, auction_id, price FROM Bid AS fullBid INNER JOIN " . $highest_bid_ids . "AS highestBids ON highestBids.mid=fullBid.id)";
<<<<<<< HEAD
        $final_query = "SELECT a.* FROM Auction AS a INNER JOIN " . $highest_bids . " AS hb ON a.id=hb.auction_id WHERE hb.user_id='$uid' AND end_date <= now() AND hb.price >= a.reserve_price";
=======
        return $highest_bids;
>>>>>>> 2f7f5bb8beb0c27eba4c9d2fe7fc735bdf82f2d6
    }

    function get_auctions_buyer($uid) {
        return db_fetch_all("SELECT a.* FROM Auction AS a INNER JOIN Bid AS b ON a.id = b.auction_id WHERE b.user_id='$uid' AND a.end_date > now()");
    }

    function get_auctions_buyer_won($uid) {
       $final_query = "SELECT a.* FROM Auction AS a INNER JOIN " . highest_bids_query($uid) . " AS hb ON a.id=hb.auction_id WHERE hb.user_id='$uid' AND end_date <= now() AND hb.price >= a.reserve_price"; 
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
        return db_fetch_all("SELECT * FROM Auction WHERE end_date > DATE_SUB(now(), INTERVAL 30 MINUTE) end_date < now()");
    }

    function check_auction_feedback($id, $user_id) {
        $final_query = "SELECT a.* FROM Auction AS a INNER JOIN " . highest_bids_query($uid) . " AS hb ON a.id=hb.auction_id WHERE hb.user_id='$uid' AND end_date <= now() AND hb.price >= a.reserve_price AND a.id='$id'"; 
        return db_query($final_query);
    }

    function update_auction_views($id) {
        return db_query("UPDATE Auction SET views = views + 1 WHERE id='$id'");
    }
?>
