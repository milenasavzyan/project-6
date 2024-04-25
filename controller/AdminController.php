<?php

class AdminController
{
    public function login()
    {
        if (isset($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];

            $adminModel = new AdminModel();
            if ($adminModel->adminLogin($_SESSION['name'])) {
                $_SESSION['isAdminLoggedIn'] = true;
                header('Location: index.php?route=shop');
            } else {
                echo 'Wrong name';
                return false;
            }
        }
    }
}

