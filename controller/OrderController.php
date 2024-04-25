<?php


class OrderController
{
    public function order()
    {

        $orderModel = new OrderModel();
        $orders = $orderModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $adress = $_POST['adress'] ?? '';
            $email = $_POST['email'] ?? '';
            $order_date = date("Y-m-d H:i:s");
            $total = $_SESSION['cart'];


            if (!empty($name) && !empty($adress) && !empty($email) && !empty($order_date) && !empty($total)) {
                $orderModel = new OrderModel();
                $orderModel->insertOrder($name, $adress, $email, $order_date, $total);
                unset($_SESSION['cart']);
                header("Location: index.php?route=order");
                die();
            } else {
                echo 'Fill in all fields';
            }
        }

        include "../view/order.php";

    }


}