<?php
    $item = get_item_id($_REQUEST["item_id"]);
    if (!$item) {
        header("location: index.php");
    }
    header('Content-type: ' . $item['image_type']);
    echo $item['image'];
?>

