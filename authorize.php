<?php
echo "<link rel=\"stylesheet\" href=\"style.css\">";
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once "db_users.php";
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];
$countbool = false;
foreach ($users as $key) {
    if ($key['login'] == $_POST['login'] && password_verify($_POST['password'], $key['password'])) {
        $_SESSION['authorized'] = 1;
        if ($key['login'] == "admin") {
            $countbool = true;
            header("Location: admin.php");
            ob_end_flush();
        } else {
            $countbool = true;
            header("Location: user.php");
            ob_end_flush();
        }
    }
}

if ($countbool == false) {
    $_SESSION['error'] = 1;
    unset($_SESSION['authorized']);
    echo "<h6 id='error'>Error! Unknown user. Try again :)</h6>";
}
