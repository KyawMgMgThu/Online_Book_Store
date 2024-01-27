<?php
session_start();
$id = $_GET["id"];
$_SESSION['cart'][$id]++;

header("location: http://localhost:8000/index.php");
