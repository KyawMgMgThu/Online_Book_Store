<?php
include("./confs/auth.php");
require_once "../controller/OrderController.php";
$controller = new OrderController();
$id = $_GET["id"];
$status = $_GET["status"];
$controller->finishorder($id, $status);
