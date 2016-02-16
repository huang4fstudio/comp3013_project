
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
        <form class='form-horizontal' action='?act=registerUser' method='post'>
          <fieldset>
            <h3>Thanks for joining!</h3>
            <div class='form-group'>
              <label for='inputUsername' class='col-md-1 control-label'>Username</label>
              <div class='col-md-3'>
                <input type='text' class='form-control' placeholder='Username'>
              </div>

              <label for='inputEmail' class='col-md-1 control-label'>Email</label>
              <div class='col-md-3'>
                <input type='email' class='form-control' placeholder='Email'>
              </div>

              <label for='inputPassword' class='col-md-1 control-label'>New Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control'placeholder='Enter new password'>
              </div>

              <label for='inputPassword2' class='col-md-1 control-label'>Confirm Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control'placeholder='Confirm new password'>
              </div>
            </div>
            <a href='#' class='btn btn-primary' value='login'>Submit</a>
          </fieldset>
        </form>
      </div>
      <?php>
        session_start();
        //Register new user by adding to user database
        function registerUser(){

        }
      ?>
      <!--End of wrapper for page content, beginning tag in header.php-->
      </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
