<?php
session_start();
include("./admin/confs/auth.php");
require_once "./controller/ShoppingCartController.php";
$controller = new ShoppingCartController();
$carts = $controller->Cart();
$categories = $controller->getCategories();
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

    <div class="btn btn-dark ml-5 mt-3">
        <a href="view-cart.php" class="text-white">
            <?php echo count($carts) ?> book in your cart
        </a>
    </div>
    <form action="" class="form-group bg-light ml-5 mr-5">
        <h1 class="mt-2 text-center">BOOK STORE</h1>
        <div class="text-secondary ">
            <ul>
                <li>
                    <b><a href="index.php">All Categories</a></b>
                </li>
                <?php
                foreach ($categories as $cart) : ?>
                    <li>
                        <a href="index.php?cat=<?php echo $cart->id; ?>">
                            <?php echo $cart->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </form>
    <div class="mt-5">
        <ul class="">
            <?php
            foreach ($carts as $cart) : ?>
                <li>
                    <img src="./covers/cover/<?php echo $cart->cover; ?>" alt="" height="150">
                    <b>
                        <a href="book-detail.php?id=<?php echo $cart->id; ?>">
                            <?php echo $cart->title; ?>
                        </a>
                    </b>
                    <i><?php echo $cart->price; ?></i>
                    <a href="add-cart.php?id=<?php echo $cart->id ?>">Add to Cart</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>

</html>