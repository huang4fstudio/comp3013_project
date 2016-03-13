<?php
    require_once("database_connection.php");

    function get_all_categories() {
        return db_fetch_all("SELECT * FROM Category");
    }
?>
