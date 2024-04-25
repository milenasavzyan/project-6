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
        <form method="post" action="../public/index.php?route=products" enctype="multipart/form-data">
            <input type="text" class="form-control col-sm-3 container" name="name" placeholder="name"><br>
            <textarea class="form-control col-sm-3 container" name="description" placeholder="description" id="description" rows="4" cols="30"></textarea><br>
            <input type="text" class="form-control col-sm-3 container" name="price" placeholder="price"><br>
            <input type="file" class="form-control col-sm-3 container" name="image_path"><br>
            <button type="submit" class="btn btn-primary w-100 py-2" class="submit" name = "submit">Create</button>

        </form>
    </div>
</header>
</body>
