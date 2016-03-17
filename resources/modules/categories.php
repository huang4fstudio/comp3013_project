<?php
    require_once("database_connection.php");

    function get_all_categories() {
        return db_fetch_all("SELECT * FROM Category");
    }
    
    function get_category_id($id) {
        return db_fetch_array("SELECT name FROM Category WHERE id='$id'");
    }
    
?>
