<?php
    require_once("items.php");
    function item_html($results) {
        ob_start();
        foreach ($results as $row) { 
        $item = get_item_id($row['item_id']);
    ?>
<div class="item-thumbnail">
  <img src="img/placeholder.png" class="thumbnail">
  <span>
    <?= $item['description'] ?> 
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
