<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<div class="form-signin w-100 m-auto">
    <form method='post'>
        <div class="py-5 text-center form-floating">
            <h1 class="h3 mb-3 fw-normal">Log In</h1>
            <div class="col-sm-3 container">
                <hr>
                <input type="text" class="form-control" name="name" placeholder="User name"><br>
                <input type="password" class="form-control" name="password" placeholder="Password"><br>
                <hr>
                <button type="submit" class="btn btn-primary w-100 py-2" class="submit" name="submit">Login</button>
            </div>
    </form>
</div>

</body>
