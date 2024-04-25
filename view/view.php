<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<div class="text-center">
    <div class="element row col-md-4 thumbnail mx-auto" >
        <?php if ($product):?>
                <div class="product">
                    <h2><?= $product['name']; ?></h2>
                    <img src="<?= $product['image_path']; ?>" alt="<?= $product['name']; ?>" style="width:70%">
                    <p><?= $product['description']; ?></p>
                    <p>Price: <?= $product['price']; ?></p>
                </div>
        <?php endif ?>

    </div>
    <a href='../public/index.php?route=update'><button type="button" name="submit" class="submit">Update</button></a>
    <a href='../public/index.php?route=delete'><button type="button" name="submit" class="submit">Delete</button></a>
</div>
</body>
