<?php
require_once "includes/connect.php";
require_once "includes/functions.php";
		$rcontent = $_POST['tcontent'];
		$del = mysql_query("delete from tblres");
		$sql = "insert into tblres values (0,'".$rcontent."')";
		if(mysql_query($sql))
		{
			Redirect("addresearch.php?m=1");
		}
		else
		{
			Redirect("addresearch.php?m=2");
		}
?>