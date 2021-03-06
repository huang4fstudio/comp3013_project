<?php
    session_start();
    require_once("../resources/modules/check_login.php");
    check_login(false);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Register</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>

    <?php
      require("../resources/templates/header.php");
    ?>
    <!--Wrapper for page content-->
    <div class="wrapper">
      <div class='jumbotron'>
        <div class="form-wrapper">
        <form class='form-horizontal' method="post">
          <!-- <fieldset> -->
            <h3>Welcome to EBid!</h3>
            <div class='form-group'>
              <label class='col-md-1 control-label'>Username</label>
              <div class='col-md-3'>
                <input type='text' class='form-control' name="inputName" placeholder='Username' required>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-md-1 control-label'>Email</label>
              <div class='col-md-3'>
                <input type='email' class='form-control' name="inputEmail" placeholder='Email' required>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-md-1 control-label'>New Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control' name="inputPass" placeholder='Enter new password' required>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-md-1 control-label'>Confirm Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control' placeholder='Confirm new password' required>
              </div>
            </div>
            <button type="submit" class='btn btn-primary' name="registerUser">Register</button>
          <!-- </fieldset> -->
        </form>
        </div>
      </div>
      <?php
      require_once("../resources/modules/database_connection.php");
        //Register new user by adding to user database
        if(isset($_POST['registerUser'])){
          $newName = $_POST['inputName'];
        	$newEmail = $_POST['inputEmail'];
            $salt = "php:<sVcKS";
        	$newPass =  $_POST['inputPass'];
            $newPass = md5($salt . $newPass);
            $location = -1;
        	$newUserQuery = "INSERT INTO User (id, name, password, location, email, seller_rating) VALUES (DEFAULT, '$newName', '$newPass', '$location', '$newEmail', NULL)";
        	$data = db_query($newUserQuery) or die(mysql_error());
        	if($data){
             ?>
        	   <script>alert('Successfully registered, please proceed to the login page!');</script>
             <?php
        	}
          else{
            ?>
            <script>alert('Error while registering');</script>
            <?php
          }
        }
      ?>
      <!--End of wrapper for page content, beginning tag in header.php-->
      </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
