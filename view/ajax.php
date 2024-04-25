<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();


    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        if ($_SESSION['cart'][$product_id]) {
            $_SESSION['cart'][$product_id] += 1;
        } else {

            $_SESSION['cart'][$product_id] = $quantity;
        }


        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Product ID or quantity not provided"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
