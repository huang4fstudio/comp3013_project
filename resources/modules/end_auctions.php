<?php
    require_once("auctions.php");
    function end_auctions() {
        $results = get_expired_auctions();
        foreach ($results as $row) {
            end_auction($row);
        }
    }
?>
