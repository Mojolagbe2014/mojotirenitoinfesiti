<?php
require_once "includes/connect.php";
require_once "includes/functions.php";
  $id=$_GET['id'];
		$tyear = $_POST['tyear'];
		$tdate = $_POST['tdate'];
		$tcontent = $_POST['tcontent'];
		$tname = $_POST['tname'];
		
		$sql = "update tbltestimonials SET tyear='".$tyear."', tdate ='".$tdate."', tname='".$tname."', tcontent= '".$tcontent."' where tid=".$id;
		
			
		if(mysql_query($sql))
		{
			echo "<script>alert('Updated successfully !!');</script>";
			Redirect("viewtestimonials.php?m=1");
		}
		else
		{
		    echo "<script>alert('Error Occurred !! Try again ...');)</script>";
			Redirect("viewtestimonials.php?m=2");
		}
?>