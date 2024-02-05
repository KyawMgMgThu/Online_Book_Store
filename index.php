<?php
session_start();
include("./admin/confs/auth.php");
require_once "./controller/ShoppingCartController.php";
$controller = new ShoppingCartController();
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cartCount += $qty;
    }
}
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
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <lord-icon src="https://cdn.lordicon.com/swuwvhnk.json" trigger="hover" colors="primary:#121331,secondary:#ee8f66,tertiary:#ebe6ef" style="width:50px;height:50px">
        </lord-icon>
        <a class="navbar-brand" href="index.php">
            Book Store
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">All Categories</a>
                </li>
                <?php
                foreach ($categories as $cat) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?cat=<?php echo $cat->id; ?>">
                            <?php echo $cat->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="navbar-text">
            <a class="text-white btn btn-success" href="view-cart.php">
                <?php echo $cartCount ?> book(s) in your cart
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">BOOK STORE</h1>

    </div>

    <div class="container mt-5">
        <ul class="list-unstyled">
            <?php foreach ($carts as $cart) : ?>
                <li class="media mb-4">
                    <img src="./covers/cover/<?php echo $cart->cover; ?>" alt="<?php echo $cart->title; ?>" class="mr-3" height="150">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><b><a href="book-detail.php?id=<?php echo $cart->id; ?>"><?php echo $cart->title; ?></a></b></h5>
                        <p><?php echo $cart->price; ?></p>
                        <a href="add-cart.php?id=<?php echo $cart->id ?>" class="btn btn-primary">Add to Cart</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="footer">
        &copy; <?php echo date("Y") ?>. All rights reserved.
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-Pn538U+HbZ9zP5qEm6NbJdAJWjsi4JPUxUpZl0VoaVxgVjPbE6pzpGIaVa9dtfN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</body>

</html>