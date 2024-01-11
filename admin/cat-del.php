<?php

require_once "../controller/CategoriesController.php";

$connect = new CategoriesController();

$connect->destory($_GET['id']);
