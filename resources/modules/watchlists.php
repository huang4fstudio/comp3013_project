<?php
    require_once("database_connection.php");
    
    function get_watched_items_user($uid) {
        return db_fetch_all("SELECT item_id FROM Watch_list WHERE user_id='$id'");
    }

    function get_watching_users_item($item_id) {
        return db_fetch_all("SELECT user_id FROM Watch_list WHERE item_id='$item_id'");
    }

    function add_watchlist($uid, $item_id) {
        return db_query("INSERT INTO Watch_list (user_id, item_id) VALUES ('$uid', '$item_id')");
    }

   ?>
