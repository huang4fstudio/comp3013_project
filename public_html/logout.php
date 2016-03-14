<?php
 session_start();
 require_once("../resources/modules/check_login.php");
 check_login(true);
 session_destroy();
 header("location: login.php");
 die();
?>
