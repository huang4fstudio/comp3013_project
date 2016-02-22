<?php
  session_start();
  include_once('database_connection.php');

  db_connect();
  if(!isset($_SESSION['name'])){
       header("location:login.php");
       die;
  }
  else {
  }
?>
