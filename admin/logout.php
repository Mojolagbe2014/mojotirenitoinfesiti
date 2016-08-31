<?php
require_once "includes/functions.php";
session_start();
session_destroy();
unset($_SESSION['user']);
Redirect("login.php?msg=4");
?>