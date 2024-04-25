<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>

    <div class="row">
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $productModel = new ProductsModel();
                $product = $productModel->getProducts($product_id);
                ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <h2><?= $product['name']; ?></h2>
                        <img src="<?= $product['image_path']; ?>" alt="<?= $product['name']; ?>" style="width:70%">
                        <p><?= $product['description']; ?></p>
                        <p>Price: <?= $product['price']; ?></p>
                        <p>Quantity: <span id="text"><?= $quantity ?></span></p>
                        <a href="../public/index.php?route=user">
                            <button type="submit" name="submit" class="submit">Buy now</button>
                        </a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>Your cart is empty</p>";
        }
        ?>
    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "../view/ajax1.php",
            success: function(response){
                $("#text").text(response);
            }
        });
    });
</script>

