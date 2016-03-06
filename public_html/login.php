<?php
 session_start();
 require_once("../resources/modules/check_login.php");
 check_login(false);

 require_once("../resources/modules/users.php");
    $error = "";
    //This function will find and checks if user data is correct
    
    if(isset($_POST['login'])){
        //Collect info from login form
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPass'];

        //Find if entered data is correct
        $row = find_user_email($email);
        
        if(!$row){
            $error = "username";
        } else {
        $id = $row['id'];
        $row2 = find_user_id($id);
        $real_password = $row2['password'];
        if($password != $real_password){
            $error = "password";
        } else {

        $username = $row2['name'];
      //Finish user's login
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $username;
        header('Location: index.php');
        die();
            }
            }
        }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>

    <?php
      require_once("../resources/templates/header.php");
    ?>
    <!--Wrapper for page content-->
    <div class="wrapper">
      <div class='jumbotron'>
        <form class='form-horizontal' method='post'>
          <fieldset>
            <h3>Welcome back!</h3>
            <div class='form-group'>
              <!--Email-->
              <label for='inputEmail' class='col-md-1 control-label'>Email</label>
              <div class='col-md-3'>
                <input type='text' class='form-control' name='inputEmail' placeholder='Email'>
              </div>
              <!--Password-->
              <label for='inputPassword' class='col-md-1 control-label'>Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control' name='inputPass' placeholder='Password'>
              </div>
            </div>
            <button type='submit' class='btn btn-primary' name='login'>Submit</a>
          </fieldset>
        </form>
      </div>

      <?php
        if(!$error === "username"){
          echo "Username is incorrect";
          //Styling from has-error
          echo '<style type="text/css">
              #inputEmail {
                  border: 2px solid #e74c3c;
              }
              </style>';
        } else if($error === "password"){
          echo "Password is incorrect";
          //Styling from has-error
          echo '<style type="text/css">
              #inputPassword {
                  border: 2px solid #e74c3c;
              }
              </style>';
        }

    ?>

      <!--End of wrapper for page content, beginning tag in header.php-->
      </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
