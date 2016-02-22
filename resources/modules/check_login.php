<?php
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
  }
  
?>
