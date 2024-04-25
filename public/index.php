<?php
require_once '../config/Database.php';
require_once '../model/AdminModel.php';
require_once '../controller/AdminController.php';
require_once '../model/ProductsModel.php';
require_once '../controller/ProductsController.php';
require_once '../model/OrderModel.php';
require_once '../controller/OrderController.php';
session_start();
$route = $_GET['route'] ?? 'shop';

switch ($route) {
    case 'admin':
        $model = new AdminController();
        $model->login();
        include "../view/admin.php";
        break;
    case 'logout':
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        break;
    case 'products':
        $create = new ProductsController();
        $create->product();
        break;
    case 'view':
        $controller = new ProductsController();
        $controller->handleView();
        break;
    case 'add':
        $controller = new ProductsController();
        $controller->addProduct();
        break;
    case 'update':
        $update = new ProductsController();
        $update->handleUpdate();
        break;
    case 'delete':
        $delete = new ProductsController();
        $delete->handleDelete();
        break;
    case 'cart':
        $productModel = new ProductsController();
        $products = $productModel->addCart();
        break;
    case 'user':
        include "../view/user.php";
        break;
    case 'order':
        $controller = new OrderController();
        $controller->order();
        break;
    default:

        $productModel = new ProductsModel();
        $products = $productModel->getAllProducts();
        include "../view/shop.php";
        break;
}

