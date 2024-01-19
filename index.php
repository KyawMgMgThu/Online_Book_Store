<?php
session_start();
include("../Online_Book_Store/admin/confs/auth.php");
require_once "./controller/ShoppingCartController.php";
$controller = new ShoppingCartController();
$carts = $controller->Cart();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <h1>Book Store</h1>
    <div class="">
        <a href="view-cart.php">
            <?php echo $carts ?> book in your cart
        </a>
    </div>
    <div>
        <ul>
            <li>
                <b><a href="index.php">All Categories</a></b>
            </li>
            <?php
            foreach ($carts as $cart) : ?>
                <li>
                    <a href="index.php?cat=<?php echo $cart->id; ?>">
                        <?php echo $cart->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>