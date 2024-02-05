<?php

include("./confs/auth.php");
require_once "../controller/OrderController.php";
require_once "../controller/ShoppingCartController.php";

$controller = new ShoppingCartController();
$orders = new OrderController();
$order = $orders->all();
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
    <div class="container">
        <h2 class="mt-3">Manage Orders</h2>

        <table class="table mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order as $order) : ?>
                    <tr>
                        <td><?php echo $order->name; ?></td>
                        <td><?php echo $order->email; ?></td>
                        <td><?php echo $order->phone; ?></td>
                        <td><?php echo $order->address; ?></td>
                        <td><?php echo $order->status ? 'Delivered' : 'Pending'; ?></td>
                        <td>
                            <?php if ($order->status) : ?>
                                <a href="order-status.php?id=<?php echo $order->id ?>&status=0">Undo</a>
                            <?php else : ?>
                                <a href="order-status.php?id=<?php echo $order->id ?>&status=1">Mark as Delivered</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <strong>Ordered Items:</strong>
                            <?php foreach ($_SESSION['cart'] ?? [] as $id => $qty) : ?>
                                <?php $cart = $controller->book_detail($id); ?>

                                <b>
                                    <a href="../book-detail.php?id=<?php echo $cart->book_id; ?>"><?php echo $cart->title; ?></a>
                                    <?php echo $cart->qty; ?>
                                </b>
                            <?php endforeach; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>