<!DOCTYPE html>
<?php
 require_once("../resources/modules/check_login.php");
 check_login(false);
 ?>
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
        <form class='form-horizontal' action='?act=login' method='post'>
          <fieldset>
            <h2>Welcome back!</h2>

            <div class='form-group'>
              <!--Email-->
              <label for='inputEmail' class='col-md-1 control-label'>Email</label>
              <div class='col-sm-3'>
                <input type='text' class='form-control' name='inputEmail' placeholder='Email'>
              </div>
            </div>
            <div class="form-group">
              <!--Password-->
              <label for='inputPassword' class='col-md-1 control-label'>Password</label>
              <div class='col-sm-3'>
                <input type='password' class='form-control' name='inputPass' placeholder='Password'>
              </div>
            </div>
            <a href='profile.php' class='btn btn-primary' value='login'>Submit</a>
          </fieldset>
        </form>
      </div>

      <?php
      require_once("../resources/modules/users.php");
      session_start();

      //This function will find and checks if user data is correct
      function login(){
        //Collect info from login form
        $username = $_REQUEST['inputEmail'];
        $password = $_REQUEST['inputPass'];

        //Find if entered data is correct
        $row = find_user_username_password($username, $password);
        $id = $row['id'];

        $row2 = find_user_id($id);
        $user = $row2['username'];

        if($username != $user){
          die("Username is incorrect");
          //Styling from has-error
          echo '<style type="text/css">
              #inputEmail {
                  border: 2px solid #e74c3c;
              }
              </style>';
        }

        $row3 = find_user_username_id($username, $id);
        $email = $row3['email'];
        $row4 = find_user_username_id_email($username, $id, $email);
        $real_password = $row4['password'];

        if($password != $real_password){
          die("Password is incorrect");
          //Styling from has-error
          echo '<style type="text/css">
              #inputPassword {
                  border: 2px solid #e74c3c;
              }
              </style>';
        }

      //Finish user's login
        session_register("username", $username);
        session_register("password", $password);

        }

        switch($act){
          default;
          index();
          break;
          case "login";
          login();
          break;
        }
      ?>

      <!--End of wrapper for page content, beginning tag in header.php-->
      </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
