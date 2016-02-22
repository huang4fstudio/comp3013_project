<?php
    require_once("./database_connection.php");
    function find_user_username_password($username, $password) {
       $result = db_query("SELECT * FROM users WHERE name='$username' AND password='$password'");
       return mysql_fetch_array($result);
    }

    function find_user_username_id($username, $id) {
        $pass_check = db_query("SELECT * FROM users WHERE username='$username' AND id='$id'");
        return mysql_fetch_array($pass_check);
    }

    function find_user_username_id_email($username, $id, $email) {
        $select_pass = db_query("SELECT * FROM users WHERE username='$username' AND id='$id' AND email='$email'");
        return mysql_fetch_array($select_pass);
       
    }

    function find_user_id($id) {
        $select_user = db_query("SELECT * FROM Users WHERE id='$id'");
        return mysql_fetch_array($select_user); 
    }
?>
