<?php
include("./confs/auth.php");
require_once "../controller/OrderController.php";
$controller = new OrderController();
$order = $controller->all();
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
    <ul>
        <?php foreach ($order as $orders) : ?>
            <?php if ($orders['status']) : ?>
                <li class="delivered">
                <?php else : ?>
                <li>
                <?php endif; ?>

                <div class="order">
                    <b><?php echo $orders['name'] ?></b>
                    <i><?php echo $orders['email'] ?></i>
                    <span><?php echo $orders['phone'] ?></span>
                    <p><?php echo $orders['address'] ?></p>

                    <?php if ($orders['status']) : ?>
                        * <a href="order-status.php?id=<?php echo $orders['id'] ?>&status=0">Undo</a>
                    <?php else : ?>
                        * <a href="order-status.php?id=<?php echo $orders['id'] ?>&status=1">Mark as Delivered</a>
                    <?php endif; ?>
                </div>
                <div class="items">

                </div>
                </li>
                </li>
            <?php endforeach; ?>
    </ul>
</body>

</html>