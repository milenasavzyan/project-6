<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<header>
    <div class="form-floating col-sm-4 container">
        <h3 class="h3 mb-3 fw-normal container">Products Create</h3>
        <?php if (is_array($products) && !empty($products)) : ?>
            <?php foreach ($products as $product): ?>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                    <input type="text" class="form-control col-sm-3 container" name="name" placeholder="name" value = '<?= $product['name']; ?>'><br>
                    <textarea class="form-control col-sm-3 container" name="description" placeholder="description" id="description" rows="4" cols="30"><?= $product['description']; ?></textarea><br>
                    <input type="text" class="form-control col-sm-3 container" name="price" placeholder="price" value = '<?= $product['price']; ?>'><br>
                    <input type="hidden" name="image_path" value = '<?= $product['image_path']; ?>'>
                    <input type="file" class="form-control col-sm-3 container" name="image_path"'><br>
                    <button type="submit" class="btn btn-primary w-100 py-2" class="submit" name = "submit">Update</button>

                </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</header>
</body>