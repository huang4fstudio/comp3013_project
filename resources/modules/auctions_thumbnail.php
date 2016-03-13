<?php
    require_once("items.php");
    function item_html($results) {
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
    <a href="auction.php?auction_id=<?= $row['id'] ?>"> <?= $item['description'] ?> </a> 
      <br>
      <strong name="itemPrice">£<?= $row['reserve_price'] ?></strong>
  </span>
</div>
<?php }
    $ret_val = ob_get_contents();
    ob_end_clean();
    return $ret_val;
    }
?>
