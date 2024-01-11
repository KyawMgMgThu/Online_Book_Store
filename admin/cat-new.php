<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<h1 class="mt-3 text-center">New Category</h1>
<form action="cat.add.php" method="post">
    <div class="form-group m-5 p-5 bg-light">
        <label for="name" class="mt-2">Category Name</label>
        <input type="text" name="name" id="name">

        <label for="remark" class="mt-2">Remark</label>
        <textarea name="remark" id="remark"></textarea>

        <br><br>
        <input type="submit" value="Add Category" class="btn btn-dark">
    </div>
</form>

<body>

</body>

</html>