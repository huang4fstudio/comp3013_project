<?php
    require_once("bids.php");
    require_once("items.php");
    require_once("feedbacks.php");
    function item_html($results) {
        ob_start();
        foreach ($results as $row) {
        $lowest_price = $row['start_price'] + 1;
        $highest_bid = get_highest_bid($row["id"]);
        if ($highest_bid) {
            $lowest_price = $highest_bid["price"] + 1;
        }
        $item = get_item_id($row['item_id']);
    ?>
<div class="item-thumbnail">
   <?php if ($item['image']) { ?>
  <img src="img/image_view.php?item_id=<?= $row['item_id'] ?>" class="thumbnail">
    <?php } else { ?>
  <img src="img/placeholder.png" class="thumbnail">
    <?php } ?>
  <span>
    <a href="auction.php?auction_id=<?= $row['id'] ?>"> <?= $item['name'] ?> </a>
    <br>
    Bid Price:&nbsp;<strong class="itemPrice" name="itemPrice">£<?= $lowest_price ?></strong>
  </span>
</div>
<?php }
    $ret_val = ob_get_contents();
    ob_end_clean();
    return $ret_val;
    }

     function item_html_won($results) {
        ob_start();
        foreach ($results as $row) {
        $item = get_item_id($row['item_id']);
    ?>
<div class="item-thumbnail">
   <?php if ($item['image']) { ?>
  <img src="img/image_view.php?item_id=<?= $row['item_id'] ?>" class="thumbnail">
    <?php } else { ?>
  <img src="img/placeholder.png" class="thumbnail">
    <?php } ?>
  <span>
    <a href="auction.php?auction_id=<?= $row['id'] ?>"> <?= $item['name'] ?> </a>
    <br>
    <?php if (!get_feedback($row["id"])) { ?>
    <a href="feedback.php?auction_id=<?= $row['id'] ?>">Write Feedback</a>
    <?php } ?>
  </span>
</div>
<?php }
    $ret_val = ob_get_contents();
    ob_end_clean();
    return $ret_val;
    }
?>
