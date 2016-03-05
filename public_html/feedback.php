<?php
    session_start();
    // require_once("../resources/modules/check_login.php");
    // check_login(false);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: Feedback</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
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
      <div class="form-wrapper">
        <form class='form-horizontal' method="post">
          <h4>Spare a moment to provide feedback on this seller?</h4>
          <fieldset>
            <label class='col-md-3 control-label'>How would you rate your experience with this seller?</label>
            <div class='form-group'>
              <div class='col-md-3'>
                <select class="form-control" name="category" required>
                  <option selected disabled>Choose rating</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class='col-md-3 control-label'>Tell us more</label>
              <br>
              <div class='col-md-7'>
                <textarea class="form-control" rows="3" name="comment" maxlength="500" placeholder="Maximum 500 characters"></textarea>
              </div>
            </div>
          </fieldset>
          <center>
            <button type="submit" class='btn btn-primary' name="submitFeedback">Submit Feedback!</button>
          </center>
        </form>
      </div><!--End of form wrapper-->
      <?php
      require_once("../resources/modules/database_connection.php");
        //Add feedback to database

      ?>
      <!--End of wrapper for page content, beginning tag in header.php-->
      </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>
  </body>
</html>
