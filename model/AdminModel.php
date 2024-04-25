<?php

class AdminModel
{
    public function adminLogin($name)
    {
        $pdo = Database::getInstance()->pdo;
        $query = "SELECT * FROM `admin` WHERE `name`= :name";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);

        try {
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row && $row['name'] == $_SESSION['name']) {
                return true;
                header('Location: /?route=shop');
                exit();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }





}

