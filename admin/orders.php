<?php
include("./confs/auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <ul class="nav nav-pills mb-3 p-3 bg-dark btn-danger">
        <li class="nav-item"><a class="nav-link  text-light" href="book-list.php ">Manage Books</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="cat-list.php">Manage Categories</a></li>
        <li class="nav-item"><a class="nav-link active text-light" href="orders.php">Manage Orders</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="logout.php">Logout</a></li>
    </ul>
</body>

</html>