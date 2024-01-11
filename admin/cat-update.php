<?php
require_once "../controller/CategoriesController.php";

$connect = new CategoriesController();
$connect->update($_GET['id'], $_POST);
