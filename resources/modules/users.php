<?php
    require_once("./database_connection.php");
    function find_user_username_password($username, $password) {
       return db_fetch_array("SELECT * FROM users WHERE name='$username' AND password='$password'");
    }

    function find_user_username_id($username, $id) {
        return db_fetch_array("SELECT * FROM users WHERE username='$username' AND id='$id'");
    }

    function find_user_username_id_email($username, $id, $email) {
        return db_fetch_array("SELECT * FROM users WHERE username='$username' AND id='$id' AND email='$email'");
       
    }

    function find_user_id($id) {
        return db_fetch_array("SELECT * FROM Users WHERE id='$id'");
    }
?>
