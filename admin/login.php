<?php
include("./confs/auth.php");

session_start();

$name = $_POST['name'];
$password = $_POST['password'];

if ($name == "admin" && $password == "admin789") {
    $_SESSION['auth'] = true;
    header("Location: http://localhost:8000/admin/book-list.php");
} else {
    header("Location: http://localhost:8000/admin/index.php");
}
