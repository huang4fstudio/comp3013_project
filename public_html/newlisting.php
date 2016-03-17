<?php
    session_start();
    require_once("../resources/modules/check_login.php");
    check_login(true);

    require_once("../resources/modules/auctions.php");
    require_once("../resources/modules/items.php");
    if(isset($_POST['newlisting'])) {
        $name = $_POST['listingName'];
        $desc = $_POST['listingDescription'];
        $reserve_price = $_POST['reservePrice'];
        $starting_price = $_POST['startingPrice'];
        $category_id = $_POST['category'];
        $end_date = strtotime($_POST['endDate']);

        $image = NULL;
        $imageProperties = NULL;
        if(count($_FILES) > 0) {
         if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
               $image = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
               $imageProperties = getimagesize($_FILES['userImage']['tmp_name'])['mime'];
            }
        }
        $item_id = new_item($name, $desc, $image, $imageProperties);
        new_item_category($category_id, $item_id);
        new_auction($item_id, $starting_price, $reserve_price, $end_date, $_SESSION["id"]);
        header("Location: index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBid: New Listing</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
        <form class='form-horizontal' method="post" enctype="multipart/form-data">
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
                  <?php
                    require_once("../resources/modules/categories.php");
                    $results = get_all_categories();
                    foreach ($results as $category) {
                    ?>
                  <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                  <?php } ?>
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

               <!--Description-->
              <div class='form-group'>
                <label class='col-md-1 control-label'>Image</label>
                <div class='col-md-5'>
                <input type="file" name="userImage" id="userImage">
                </div>
              </div>


              <!--Starting Price-->
              <div class='form-group'>
                <label class='col-md-1 control-label'>Starting Price</label>
                <div class='col-sm-3'>
                  <div class="input-group">
                    <span class="input-group-addon">£</span>
                    <input type='text' class='form-control' name="startingPrice"  required>
                  </div>
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
