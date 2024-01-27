<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header("location: http://localhost:8000/index.php");
    exit();
}
$total = 0;

include("admin/confs/config.php");
require_once "./controller/ShoppingCartController.php";

$controller = new ShoppingCartController();
$id = $_GET["id"];
$cart = $controller->book_detail($id);

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
    <h1>View Cart</h1>
    <div class="sidebar">
        <ul class="cats">
            <li><a href="index.php">&laquo; Continue Shopping</a></li>
            <li><a href="clear-cart.php">&times; Clear Cart</a></li>
        </ul>
    </div>
    <div class="main">
        <table>
            <tr>
                <th>Book Title</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Price</th>
            </tr>

            <?php foreach ($_SESSION['cart'] as $id => $qty) : ?>
                $total += $cart->price * $qty;
                <tr>
                    <td><?php echo $cart->title; ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo  $cart->price; ?></td>
                    <td><?php echo $cart->price * $qty; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>