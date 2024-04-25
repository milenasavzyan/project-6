<?php


class ProductsModel
{
    public function __construct()
    {
        $pdo = Database::getInstance()->getConnection();
    }
    public function getAllProducts()
    {
        $pdo = Database::getInstance()->getConnection();
        try {
            $stmt = $pdo->prepare('SELECT * FROM products');
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function insert($name, $description, $price, $image_path)
    {
        $pdo = Database::getInstance()->getConnection();
        try{
            $stmt = $pdo->prepare('INSERT INTO products (`name`, `description`, price, image_path) VALUES (?, ?, ?, ?)');
            $stmt->execute([$name, $description, $price, $image_path]);
            header('Location: index.php?route=shop');
            exit();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getProducts($product_id)
    {

        $pdo = Database::getInstance()->pdo;
        try {

            $stmt = $pdo->prepare('SELECT * FROM products WHERE product_id= ?');
            $stmt->execute([$product_id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function update($product_id, $name, $description, $price, $image_path)
    {
        $pdo = Database::getInstance()->getConnection();
        try {
            $stmt = $pdo->prepare('UPDATE products SET `name`=?, description=?, price=?, image_path=? WHERE product_id=?');
            $stmt->execute([$name, $description, $price, $image_path, $product_id]);
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function delete($product_id)
    {
        $pdo = Database::getInstance()->getConnection();
        try {
            $stmt = $pdo->prepare('DELETE FROM products WHERE product_id = ?');
            $stmt->execute([$product_id]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}


