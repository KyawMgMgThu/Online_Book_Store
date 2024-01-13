<?php
require_once "../controller/BookController.php";
$controller = new BookController();
$categories = $controller->index();
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
    <h1 class="mt-3 text-center">Book List</h1>
    <a href="book-new.php" class="new btn btn-dark ml-5 mb-1">New Book</a>
    <ul class="list-group">
        <div class="from-group ml-5 mr-5 bg-light p-5">
            <?php foreach ($categories as $category) : ?>
                <li class="list-group-item mb-1">
                    <img src="./cover/<?php echo $category->cover; ?>" class="m-2" alt="" align="right" height="140">
                    <b class="text-uppercase"><?php echo $category->title; ?></b>
                    <i>by <b><?php echo $category->author; ?></b></i>
                    <small class="ml-2">(in <?php echo $category->name; ?>)</small>
                    <div class="mt-2">Price: $<?php echo $category->price; ?></div>
                    <div class="text-secondary mt-3 mb-3"><?php echo $category->summary; ?></div>

                    <a class="btn btn-danger" href="book-del.php?id=<?php echo $category->id; ?>">delete</a>
                    <a class="btn btn-dark" href="book-edit.php?id=<?php echo $category->id; ?>">edit</a>
                </li>
            <?php endforeach; ?>
        </div>
    </ul>



</body>

</html>