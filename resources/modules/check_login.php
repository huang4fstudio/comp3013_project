<?php
  function check_login($require_login) {
    if($require_login) {
        if(!isset($_SESSION['id'])){
            header("location:login.php");
            die;
        }
    } else {
        if(isset($_SESSION['id'])){
            header("location:index.php");
            die;
        }
    }
  }
  
?>
