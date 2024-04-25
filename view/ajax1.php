<?php
session_start();

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $total = 0;

    foreach($_SESSION['cart'] as $product_id => $quantity) {
        $total += $quantity;
    }

    echo $total;
} else {
    echo "0";
}



