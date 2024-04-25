<?php


class ProductsController
{
    public function product()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';

            $image_path = '';
            if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../image/';
                $uploadFile = $uploadDir . basename($_FILES['image_path']['name']);
                if (move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadFile)) {
                    $image_path = $uploadFile;
                } else {
                    echo 'Failed to upload file.';
                    return;
                }
            }

            if (!empty($name) && !empty($description) && !empty($price) && !empty($image_path)) {
                $productModel = new ProductsModel();
                $productModel->insert($name, $description, $price, $image_path);
                header("Location: index.php?route=shop");
                die();
            } else {
                echo 'Fill in all fields';
            }
        }

        include "../view/products.php";

    }
    public function handleInsert()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $order_id = $_POST['order_id'];


            if (!empty($product_id) && !empty($quantity) && !empty($order_id)) {
                $productModel = new ProductsModel();
                $productModel->insertOrderItem($product_id, $quantity, $order_id);
                header("Location: index.php?route=shop");
                die();
            } else {
                echo 'Fill in all fields';
            }
        }

        include "../view/order.php";

    }

    public function handleUpdate()
    {
        $productModel = new ProductsModel();
        $products = $productModel->getAllProducts();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'] ?? '';

            if (!empty($product_id) && !empty($name) && !empty($description) && !empty($price) && !empty($image_path)) {
                $productModel = new ProductsModel();
                $productModel->update($product_id, $name, $description, $price, $image_path);
                header("Location: index.php?route=shop");
                die();
            } else {
                echo 'Fill in all fields';
            }
        }
        include "../view/update.php";
    }
    public function handleView()
    {
            $product_id = $_GET['product_id'] ?? '';

            if (!empty($product_id)) {
                $productModel = new ProductsModel();
                $product = $productModel->getProducts($product_id);
            } else {
                echo 'Error';
            }

        include "../view/view.php";
    }
    public function addProduct()
    {
            $product_id = $_GET['product_id'] ?? '';

            if (!empty($product_id)) {
                $productModel = new ProductsModel();
                $product = $productModel->getProducts($product_id);
            } else {
                echo 'Error';
            }

        include "../view/add.php";
    }
    public function addCart()
    {
        $product_id = $_GET['product_id'] ?? '';

        if (!empty($product_id)) {
            $productModel = new ProductsModel();
            $product = $productModel->getProducts($product_id);

            if ($product) {
                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id] += 1;
                } else {
                    $_SESSION['cart'][$product_id] = 1;
                }

                header('Location: ../public');
                exit;
            } else {
                echo 'Error: Product not found';
            }
        }
        include "../view/cart.php";
    }

    public function handleDelete()
    {
        $product_id = $_GET['product_id'] ?? '';

        $productModel = new ProductsModel();
        $product = $productModel->delete($product_id);
        header("Location: index.php?route=shop");
        die();
    }

}

