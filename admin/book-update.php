<?php
include("./confs/auth.php");
require_once "../controller/BookController.php";

$controller = new BookController();
$controller->update($_GET["id"], $_POST, $_FILES);
