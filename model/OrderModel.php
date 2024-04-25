<?php


class OrderModel
{
    public function __construct()
    {
        $pdo = Database::getInstance()->getConnection();
    }
    public function getAll()
    {
        $pdo = Database::getInstance()->getConnection();
        try {
            $stmt = $pdo->prepare('SELECT * FROM orders');
            $stmt->execute();
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $orders;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertOrder($name, $adress, $email, $order_date, $total)
    {
        $pdo = Database::getInstance()->getConnection();
        try{
            $stmt = $pdo->prepare('INSERT INTO orders (`name`, adress, email, order_date, total) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$name, $adress, $email, $order_date, $total]);
            $order_id = $pdo->lastInsertId();
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $stmt = $pdo->prepare('INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)');
            $stmt->execute([$order_id, $product_id, $quantity]);
        }
            header('Location: index.php?route=order');
            exit();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}