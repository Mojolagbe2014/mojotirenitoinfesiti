<?php
require_once "includes/connect.php";
require_once "includes/functions.php";
if(isset($_POST ['lg']))
{
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$sql = "select * from users where username='".$user."' AND password='".$pass."'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)==1)
	{
		session_start();
		$_SESSION['user'] = $user;
		Redirect("index.php?msg=2");
	}else{
		Redirect("login.php?msg=3");
	}
}

if(isset($_POST['addpost']))
	{
		$post_title = $_POST['title'];
		$post_content = $_POST['content'];
		$post_date = date("Y-m-d H:i:s");
		$post_author = 'admin';
		
		$sql = "insert into posts SET title='".$post_title."', content ='".$post_content."', date ='".$post_date."', author = '".$post_author."'";
		
			
		if(mysql_query($sql))
		{
			Redirect("add_post.php?m=1");
		}
		else
		{
			Redirect("add_post.php?m=2");
		}
		
	}
	
if(isset($_POST['editpost']))
	{
		$id = $_POST['id'];
		$post_title = $_POST['title'];
		$post_content = $_POST['content'];
		$post_date = date("Y-m-d H:i:s");
		$post_author = 'admin';
		
		$sql = "update posts SET title='".$post_title."', content ='".$post_content."', date ='".$post_date."', author = '".$post_author."' where id=".$id;
		
			
		if(mysql_query($sql))
		{
			Redirect("index.php?m=1");
		}
		else
		{
			Redirect("index.php?m=2");
		}
		
	}
	

if((@$_GET['id']!='') && (@$_GET['action']=="del"))
{
	$id = @$_GET['id'];
	$sql = "delete from posts where id=".$id;
	mysql_query($sql);
	Redirect("index.php?m=3");
	
}

?>