<?php
require_once "config.php";
mysql_connect(DB_HOST,DB_USER,DB_PASS)or die("MySQL not connected ".mysql_error());
mysql_select_db("train2invest")or die("Database not selected ".mysql_error());
?>