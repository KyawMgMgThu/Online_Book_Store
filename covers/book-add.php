<?php

require_once "../controller/BookController.php";

$connect = new BookController();

$connect->store($_POST, $_FILES);
