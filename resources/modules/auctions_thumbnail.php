<?php
    function item_html($results) {
        ob_start();
        foreach ($results as $row) { ?>
<div class="item-thumbnail">
  <img src="img/placeholder.png" class="thumbnail">
  <span>
    <?= $row['description'] ?> 
      <br>
      <strong name="itemPrice"><?= $row['price'] ?></strong>
  </span>
</div>
<?php }
    $ret_val = ob_get_contents();
    ob_end_clean();
    return $ret_val;
?>
    
