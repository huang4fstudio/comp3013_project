<?php
    require_once("database_connection.php");
    
    function get_watched_items_user($uid) {
        return db_fetch_all("SELECT auction_id FROM Watch_list WHERE user_id='$uid'");
    }

    function get_watching_users_item($item_id, $outbid_id) {
        return db_fetch_all("SELECT user_id FROM Watch_list WHERE auction_id='$item_id' AND user_id != '$outbid_id'");
    }

    function add_watchlist($uid, $item_id) {
        return db_query("INSERT INTO Watch_list (user_id, auction_id) VALUES ('$uid', '$item_id')");
    }

    function check_watchlist($uid, $item_id) {
        return db_fetch_array("SELECT id FROM Watch_list WHERE user_id='$uid' AND auction_id='$item_id'");
    }

   ?>
