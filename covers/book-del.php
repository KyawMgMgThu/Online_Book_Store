<?php
require_once "../controller/BookController.php";

$connect = new BookController();
$connect->destory($_GET["id"]);
