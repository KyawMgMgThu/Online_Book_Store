<?php
include("./confs/auth.php");

session_start();
unset($_SESSION['auth']);
header("Location: http://localhost:8000/admin/index.php");
