<?php
session_start();
include("./admin/confs/config.php");
require_once "./controller/OrderController.php";
$order = new OrderController();
$order->order($_POST);
$order->order_item($_GET["id"], $_POST);
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Submitted</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            padding-top: 56px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }

        .msg {
            margin-top: 20px;
            padding: 20px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Order Submitted</h1>
        <div class="msg alert alert-success">
            Your order has been submitted. We'll deliver the items soon.
            <a href="index.php" class="alert-link">Book Store Home</a>
        </div>
    </div>

    <div class="footer mt-5">
        &copy; <?php echo date("Y") ?>. All rights reserved.
    </div>

</body>

</html>