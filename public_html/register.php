
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Register</title>

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
        <form class='form-horizontal'>
          <fieldset>
            <h3>Thanks for joining!</h3>
            <div class='form-group'>
              <label class='col-md-1 control-label'>Username</label>
              <div class='col-md-3'>
                <input type='text' class='form-control' name="inputName" placeholder='Username' required>
              </div>

              <label class='col-md-1 control-label'>Email</label>
              <div class='col-md-3'>
                <input type='email' class='form-control' name="inputEmail" placeholder='Email' required>
              </div>

              <label class='col-md-1 control-label'>New Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control' name="inputPass" placeholder='Enter new password' required>
              </div>

              <label class='col-md-1 control-label'>Confirm Password</label>
              <div class='col-md-3'>
                <input type='password' class='form-control' placeholder='Confirm new password' required>
              </div>
            </div>
            <button type="submit" class='btn btn-primary' name="registerUser">Register</button>
          </fieldset>
        </form>
      </div>
      <?php>
        session_start();
        //Register new user by adding to user database
        if(isset($_POST['registerUser'])){
        	$newID = $_POST[hexdec(uniqid())]; //Generage unique intger id
          $newName = $_POST['inputName'];
        	$newEmail = $_POST['inputEmail'];
        	$newPass =  $_POST['inputPass'];
        	$newUserQuery = "INSERT INTO User ('id','name', 'email', 'password') VALUES ('$newID', '$newName', '$newEmail', '$newPass')";
        	$data = mysql_query ($newUserQuery)or die(mysql_error());
        	if($data){
        	   alert("USER REGISTERED!");
        	}
          else{
             alert("ERROR WHILE REGISTERING");
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
