<?php
session_start();
unset($_SESSION['cart']);
header("location: localhost:8000/index.php");
