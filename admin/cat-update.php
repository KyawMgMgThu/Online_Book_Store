<?php

require_once "../controller/CategoriesController.php";

$controller = new CategoriesController();
$controller->update($_GET['id'], $_POST);
