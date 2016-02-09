<?php

include_once('database_connection.php');

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
     header("location:index.php");
     die;
} else {
}

?>
