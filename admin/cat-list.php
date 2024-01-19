<?php
include("./confs/auth.php");
require_once "../controller/CategoriesController.php";
$controller = new CategoriesController();
$categories = $controller->index();
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
<ul class="nav nav-pills mb-3 p-3 bg-dark btn-danger">
    <li class="nav-item"><a class="nav-link text-light" href="book-list.php ">Manage Books</a></li>
    <li class="nav-item"><a class="nav-link active  text-light" href="cat-list.php">Manage Categories</a></li>
    <li class="nav-item"><a class="nav-link text-light" href="orders.php">Manage Orders</a></li>
    <li class="nav-item"><a class="nav-link text-light" href="logout.php">Logout</a></li>
</ul>
<a href="cat-new.php" class="btn btn-primary ml-5 mb-1">New Category</a>
<div class="from-group ml-5 mr-5 bg-light">
    <h1 class="text-center pt-3">CATEGORY LIST</h1>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li title="<?php echo $category->remark; ?>" class="m-3">

                <h3><?php echo $category->name; ?></h3>
                <p class="text-secondary"><?php echo $category->remark; ?></p>
                <a href="cat-del.php?id=<?php echo $category->id; ?>" class="btn btn-danger">delete</a>
                <a href="cat-edit.php?id=<?php echo $category->id; ?>" class="btn btn-dark">edit</a>
            </li>
        <?php endforeach; ?>
    </ul>

</div>

<body>

</body>

</html>