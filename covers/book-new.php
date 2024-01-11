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
    <title>Book Store</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <h1 class="mt-3 text-center">New Book</h1>
    <form action="book-add.php" method="post" enctype="multipart/form-data">
        <div class="form-group m-5 p-5 bg-light">
            <label for="title" class="mt-2">Book Title</label>
            <input class="form-control" type="text" name="title" id="title">

            <label for="author" class="mt-2">Author</label>
            <input class="form-control" type="text" name="author" id="author">

            <label for="summary" class="mt-2">Summary</label>
            <textarea class="form-control" name="summary" id="summary"></textarea>

            <label for="price" class="mt-2">Price</label>
            <input class="form-control mb-3" type="text" name="price" id="price">

            <label for="categories" class="mt-2">Category</label>
            <select name="category_id" id="categories">
                <option value="0">--Choose--</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                <?php endforeach; ?>
            </select>
            <label for="cover" class="mt-2">Cover</label>
            <input type="file" name="cover" id="cover">
            <br><br>
            <input type="submit" class="form-control mb-3" value="Add Book">
            <a href="book-list.php" class="back btn btn-dark">Back</a>
        </div>


    </form>
</body>