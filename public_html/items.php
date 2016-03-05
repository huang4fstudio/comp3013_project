<?php
    require_once("database_connection.php");
    function get_all_items() {
       return db_fetch_all("SELECT * FROM Item");
    }

    function get_all_items_category($category) {
    	
        return db_fetch_all("SELECT i.* FROM Item AS i INNER JOIN Item_category AS b ON i.id = b.item_id AND b.category_id='$category'");
    }
?>