<?php
session_start();

if (!isset($_SESSION['cart'])) {
    header("location: http://localhost:8000/index.php");
    exit();
}
include("./admin/confs/config.php");
$total = 0;


require_once "./controller/ShoppingCartController.php";

$controller = new ShoppingCartController();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .sidebar {
            float: left;
            width: 20%;
            padding: 15px;
        }

        .main {
            float: left;
            width: 70%;
            padding: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .order-form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">View Cart</h1>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href="index.php">&laquo; Continue Shopping</a></li>
                    <li class="list-group-item"><a href="clear-cart.php">&times; Clear Cart</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $id => $qty) : ?>
                            <?php $cart = $controller->book_detail($id); ?>
                            <?php
                            $total += $cart->price * $qty;
                            ?>
                            <tr>
                                <td><?php echo $cart->title; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $cart->price; ?></td>
                                <td><?php echo $cart->price * $qty; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" align="right"><b>Total:</b></td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="order-form">
                    <h2>Order Now</h2>
                    <form action="submit-order.php" method="post">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" required></textarea>
                        </div>
                        <br><br>
                        <input type="submit" class="btn btn-primary" value="Submit Order">
                        <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEj5pFfFJz/6jbm9TM+IbbK/XWIU1M6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJWv2tQ8q7FLqDjUgXjaFOreAuYv15EAm1N8EVOqJCyF5jojgIQQ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wvMP5Rl9Hn4ArAzfgoPxxuU+YlbyKlmfJUS9MOp4RFXlt9Me5XO2qV8jzEJd80V7" crossorigin="anonymous"></script>
</body>

</html>