<?php
    session_start();
    require_once("../resources/modules/check_login.php");
    check_login(false);
    if (!isset($_GET['auction_id'])) {
        header("Location: index.php");
        die();
    }
    require_once("../resources/modules/auctions.php");
    $auction = get_auctions_id($_GET['auction_id']);
     
    if (get_feedback($auction['id']) || !check_auction_feedback($auction_id, $_SESSION['id']) {
        header("Location: index.php");
    }
    if (isset($_POST['submitFeedback'])) {
        require_once("../resources/modules/feedbacks.php");
        require_once("../resources/modules/uses.php");

        $rating = intval($_POST['rating']);
        $comment = intval($_POST['comment']);
        submit_feedback($_SESSION['id'], $auction['id'], $rating, $comment);
        update_user_rating($auction['seller_id'], get_new_avg($auction['seller_id']));
        header("Location: index.php");
    }
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
    <script src="js/ebid.js"></script>

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
                <select class="form-control" name="rating" required>
                  <option selected disabled>Choose rating</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class='col-md-3 control-label'>Tell us more</label>
              <br>
              <div class='col-md-7'>
                <textarea class="form-control" rows="3" name="comment" maxlength="500"  onkeyup="countChar(this)"></textarea>
                <span id="charNum">500</span><span> characters</span>
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
