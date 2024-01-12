<?php
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
<h1 class="text-center">Category List</h1>
<div class="from-group m-5 bg-light p-5">
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li title="<?php echo $category->remark; ?>" class="m-3">

                <h3><?php echo $category->name; ?></h3>
                <p><?php echo $category->remark; ?></p>
                <a href="cat-del.php?id=<?php echo $category->id; ?>" class="btn btn-danger">del</a>
                <a href="cat-edit.php?id=<?php echo $category->id; ?>" class="btn btn-dark">edit</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="cat-new.php" class="btn btn-dark">New Category</a>
</div>

<body>

</body>

</html>