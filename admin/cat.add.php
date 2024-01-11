<?php

require_once "../controller/CategoriesController.php";

$connect = new CategoriesController();

$connect->store($_POST);
