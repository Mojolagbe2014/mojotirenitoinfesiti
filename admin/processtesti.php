<?php
require_once "includes/connect.php";
require_once "includes/functions.php";
		$tyear = $_POST['tyear'];
		$tdate = $_POST['tdate'];
		$tcontent1 = $_POST['tcontent'];
		$tname = $_POST['tname'];
		$tcontent=str_replace("(","[",$tcontent1);
		$tcontent=str_replace(")","]",$tcontent);
		$tcontent=str_replace("'","&#39;",$tcontent);
		$sql = "insert into tbltestimonials values (0,'".$tyear."', '".$tdate."', '".$tname."', '".$tcontent."')";
		
			
		if(mysql_query($sql))
		{
		
			Redirect("addtestimonials.php?m=1");
		}
		else
		{
			Redirect("addtestimonials.php?m=2");
			
		}
?>