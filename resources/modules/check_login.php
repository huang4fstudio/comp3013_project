<?php
<<<<<<< HEAD
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
=======
  function check_login($require_login) {
    session_start();
    if($require_login) {
        if(!isset($_SESSION['username'])){
            header("location:login.php");
            die;
        }
    } else {
        if(isset($_SESSION['username'])){
            header("location:index.php");
            die;
        }
    }
>>>>>>> dc07be2d6789bd6a0f900c1e366c170a25632942
  }
  
?>
