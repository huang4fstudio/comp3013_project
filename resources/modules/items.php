<?php
    require_once("database_connection.php");

    function get_all_items() {
        return db_fetch_all("SELECT * FROM Item");
    }

    function get_all_items_category($category) {
        return db_fetch_all("SELECT i.* FROM Item AS i INNER JOIN Item_category AS b ON i.id = b.item_id AND b.category_id='$category'");
    }

    function new_item($name, $description, $owner_id, $image) {
        $result = db_query("INSERT INTO Item (id, name, description, owner_id, image) VALUES (DEFAULT, '$name', '$description', '$owner_id', '$image')");
        if ($result) {
            return db_last_id();
        } 
        return $result;
    }

    function get_item_id($id) {
        return db_fetch_array("SELECT * FROM Item WHERE id='$id'");
    }
?>
