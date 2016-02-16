
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid</title>

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
      <div class='jumbotron-authUser'>
        <form class='form-horizontal' action='?act=login' method='post'>
          <fieldset>
            <h3>Welcome back!</h3>
            <div class='form-group'>
              <!--Email-->
              <label for='inputEmail' class='col-md-1 control-label'>Email</label>
              <div class='col-md-3'>
                <input type='text' class='form-control' id='inputEmail' placeholder='Email'>
              </div>
              <!--Password-->
              <label for='inputPassword' class='col-md-1 control-label'>Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control' id='inputPassword' placeholder='Password'>
              </div>
            </div>
            <a href='#' class='btn btn-primary' value='login'>Submit</a>
          </fieldset>
        </form>
      </div>

      <?php
      session_start();

      //This function will find and checks if user data is correct
      function login(){
        //Collect info from login form
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        //Find if entered data is correct
        $result = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");

        $row = mysql_fetch_array($result);
        $id = $row['id'];

        $select_user = mysql_query("SELECT * FROM users WHERE id='$id'");

        $row2 = mysql_fetch_array($select_user);
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

        $pass_check = mysql_query("SELECT * FROM users WHERE username='$username' AND id='$id'");
        $row3 = mysql_fetch_array($pass_check);
        $email = $row3['email'];
        $select_pass = mysql_query("SELECT * FROM users WHERE username='$username' AND id='$id' AND email='$email'");
        $row4 = mysql_fetch_array($select_pass);
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
