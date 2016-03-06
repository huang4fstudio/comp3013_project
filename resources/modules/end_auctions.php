<?php
    require_once("auctions.php");
    function end_auctions() {
        $results = get_expired_auctions();
        foreach ($results as $row) {
            end_auction($row);
        }
    }

    function end_auction($auction) {
        $highest_bid = get_highest_bid($auction['id']);
        if ($highest_bid) {
            $item = get_item_id($auction['item_id']);
            $item['owner_id'] = $highest_bid['user_id'];
        }
    }
?>
