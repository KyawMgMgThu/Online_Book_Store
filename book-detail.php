<?php
session_start();
include("./admin/confs/auth.php");
require_once "./controller/ShoppingCartController.php";
$controller = new ShoppingCartController();
$id = $_GET['id'];
$book = $controller->book_detail($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            padding-top: 30px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            margin-top: 20px;
        }

        img {
            max-width: 50%;
            height: 25rem;
        }
    </style>
</head>

<body>

    <div class="container mb-5">
        <a href="index.php" class="btn btn-secondary">&laquo; Go Back</a>
        <div class="card mt-2">
            <img src="/covers/cover/<?php echo $book->cover; ?>" class="card-img-top ml-2" alt="">
            <div class="card-body">
                <h2 class="card-title"><?php echo $book->title; ?></h2>
                <p class="card-text"><i>by <?php echo $book->author; ?></i></p>
                <p class="card-text"><b>$<?php echo $book->price; ?></b></p>
                <p class="card-text"><?php echo $book->summary; ?></p>
                <a href="add-cart.php?id=<?php echo $book->id; ?>" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; <?php echo date("Y") ?>. All rights reserved.
    </div>

</body>

</html>