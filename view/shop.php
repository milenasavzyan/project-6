<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom ">
        <a href='' class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">Online Shop</span>
        </a>
        <ul class="nav nav-pills ">
            <?php if (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] && isset($_SESSION['name'])): ?>
            <li class="nav-item">
                <a href='../public/index.php?route=logout' class="nav-link active">Log Out</a>
            </li>
            <li class="nav-item">
                <a href='../public/index.php?route=products' class="nav-link">Create</a>
            </li>
        </ul>
    </header>
    <section>
        <div class="element row text-center">
            <?php if (is_array($products) && !empty($products)) : ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <h2><?= $product['name']; ?></h2>
                            <a href="../public/index.php?route=view&product_id=<?= $product['product_id']; ?>">
                                <img class="rounded float-left" src="<?= $product['image_path']; ?>"
                                     alt="<?= $product['name']; ?>" style="width:70%">
                            </a>
                            <p><?= $product['description']; ?></p>
                            <p>Price: <?= $product['price']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products available.</p>
            <?php endif; ?>
        </div>
    </section>
    <?php else: ?>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <ul class="nav nav-pills ">
            <li class="nav-item">
                <a href='../public/index.php?route=admin' class="nav-link active">Log In</a>
            </li>
            <li class="nav-item">
                <a href='../public/index.php?route=cart' class="nav-link">Cart</a>
            </li>
            <li class="nav-item">
                <a href='../public/index.php?route=order' class="nav-link">Order</a>
            </li>
        </ul>
    </header>
    <section>
        <div class="element row text-center">

            <?php if (is_array($products) && !empty($products)) : ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <h2><?= $product['name']; ?></h2>
                            <a href="../public/index.php?route=add&product_id=<?= $product['product_id']; ?>">
                                <img src="<?= $product['image_path']; ?>" alt="<?= $product['name']; ?>"
                                     style="width:70%">
                            </a>
                            <p><?= $product['description']; ?></p>
                            <p>Price: <?= $product['price']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products available.</p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </section>


</div>

</body>