<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: New Listing</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.js"></script>
    <!-- Latest compiled JavaScript for Bootstrap-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.js"></script>
    <script src="js/ebid.js"></script>
  </head>
  <body>

    <?php
      require("../resources/templates/header.php");
    ?>
    <!--Wrapper for page content-->
    <div class="wrapper">

      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Sell</li>
      </ul>

      <div class="form-wrapper">
        <form class='form-horizontal' method="post">
            <h3>New Listing</h3>
            <div class='form-group'>
              <!--Title-->
              <label class='col-md-1 control-label'>Name</label>
              <div class='col-md-8'>
                <input type='text' class='form-control' name="listingName"  required>
              </div>
            </div>

            <!--Category-->
            <div class='form-group'>
              <label class='col-md-1 control-label'>Category</label>
              <div class='col-md-3'>
                <select class="form-control" id="select" name="category" required>
                  <option selected disabled>Choose category</option>
                  <option>Electronics</option>
                  <option>Sporting Goods</option>
                  <option>Fashion</option>
                  <option>Health & Beauty</option>
                  <option>Home & Garden</option>
                  <option>Collectibles & Art</option>
                  <option>Toys</option>
                </select>
              </div>
            </div>
              <!--Description-->
              <div class='form-group'>
                <label class='col-md-1 control-label'>Details</label>
                <div class='col-md-5'>
                  <textarea class="form-control" rows="5" id="textArea" name="listingDescription" required></textarea>
                </div>
              </div>
              <!--Reserve Price-->
              <div class='form-group'>
                <label class='col-md-1 control-label'>Reserve Price</label>
                <div class='col-sm-3'>
                  <div class="input-group">
                    <span class="input-group-addon">£</span>
                    <input type='text' class='form-control' name="reservePrice"  required>
                  </div>
                </div>
              </div>
              <!--End date-->
              <div class='form-group'>
                <label class='col-md-1 control-label'>End Date</label>
                <div class='col-sm-3'>
                  <div class="input-group date">
                    <div class='input-group'>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                      <input type="text" class="form-control" name="endDate" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <button type="submit" class='btn btn-primary' name="newlisting">List it!</button>
      </form>

    </div>
    <?php
      require_once("../resources/templates/footer.php");
    ?>

  </body>
</html>
