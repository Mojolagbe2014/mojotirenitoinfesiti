<?php
require_once "functions.php";
session_start();
if($_SESSION['user']=='')
{
	Redirect("login.php?msg=1");
}
?>