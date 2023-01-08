<?php
if (session_status() != PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['authorized'])) header("Location: authorize.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Students</title>
</head>

<body>
    <?php
    if (isset($_SESSION['login'])) {
        echo "<div class='container pt-4 text-center'><h1 class='text-danger'>Hello " . $_SESSION['login'] . "</h1></div>";
    }
    ?>
    <div class="container d-flex justify-content-center">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <div class="input-group mb-3">
                <input type="search" class="form-contol" name="desired" placeholder="Search">
                <input type="submit" class="btn btn-danger" name="search" value="&#128269;">
            </div>
            <select name="sorting" class="form-select form-select-lg text-danger">
                <option value="surname">Sort by name</option>
                <option value="name">Sort by surname</option>
            </select>
        </form>
    </div>
    <?php
    $user = "user";
    include "functions.php";
    if (isset($_GET['search'])) {
        search($dbContent, $user);
    }
    ?>
</body>

</html>