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
    <!-- <ul class="nav nav-pills mb-3 p-3 bg-dark btn-danger">
        <li class="nav-item"><a class="nav-link active text-light" href="book-list.php ">Manage Books</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="cat-list.php">Manage Categories</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="orders.php">Manage Orders</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="logout.php">Logout</a></li>
    </ul> -->
    <form class="m-5 bg-light p-3" action="login.php" method="post">
        <h1 class="mt-2 text-center">Login to Book Store Administration</h1>

        <div class="form-group">
            <label for="#">Name</label>
            <input type="text" name="name" class="form-control" required placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" required id="exampleInputPassword1" placeholder="Password">
        </div>
        <br><br>
        <input type="submit" class="btn btn-primary" value="Admin Login"></input>
    </form>
</body>

</html>