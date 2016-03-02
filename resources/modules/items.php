<?php
    require_once("database_connection.php");

    function new_item($name, $description, $owner_id, $image) {
        $result = db_query("INSERT INTO Item (id, name, description, owner_id, image) VALUES (DEFAULT, '$name', '$description', '$owner_id', '$image')");
        if ($result) {
            return db_last_id();
        } 
        return $result;
    }

    function get_item($id) {
        return db_fetch_all("SELECT * FROM Item WHERE id='$id'");
    }
?>
