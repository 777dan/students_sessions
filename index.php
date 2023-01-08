<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Students</title>
</head>

<body>
    <div class="container pt-4 text-center">
        <h1 class="text-danger">Students</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3 mt-3">
                <input type="login" class="form-control" name="login" placeholder="Enter login">
            </div>
            <div class="mb-3 mt-3">
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            <input type="submit" class="btn btn-danger" name="submit" value="Sign in">
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        include_once "authorize.php";
    }
    ?>
</body>

</html>