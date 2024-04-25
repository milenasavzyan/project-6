<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="head text-center">
    <div class="element row col-md-4 thumbnail mx-auto">
        <?php if ($product): ?>
            <div class="product">
                <h2><?= $product['name']; ?></h2>
                <img class="rounded mx-auto d-block" src="<?= $product['image_path']; ?>" alt="<?= $product['name']; ?>"
                     style="width:70%">
                <p><?= $product['description']; ?></p>
                <p>Price: <?= $product['price']; ?></p>
            </div>
        <?php endif ?>

    </div>
    <form method="post">
        <input type="hidden" name="$product_id" class="name" value="<?= $product_id; ?>">
        <input type="number" name="quantity" id="quantity" value="1" min="1"><br>
        <a href="../public/index.php?route=cart&product_id=<?= $product['product_id']; ?>">
            <button type="button"
                    onclick="location.href='../public/index.php?route=cart&product_id=<?= $product['product_id']; ?>'"
                    name="submit" class="submit" id="addToCart">Add to cart
            </button>
        </a>
    </form>
</div>
</body>
<script>
    $(document).ready(function () {
        $("#addToCart").click(function () {
            var quantity = $("#quantity").html();

            $.ajax({
                type: "POST",
                url: "../view/ajax.php",
                data: {
                    product_id: <?= $product_id; ?>//, quantity: quantity },
//                success: function(response){
//                    $("#text").text(quantity);
//                }
                });
        });
    });
</script>

