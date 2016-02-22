<?php
  session_start();
  include_once('database_connection.php');

  db_connect();
  if(!isset($_SESSION['name'])){
     echo 'alert("No user logged in")';
     header("location: login.php");
     die;
  }
  else {
    echo 'alert("User logged in")';
    header("location: profile.php");
  }
?>
