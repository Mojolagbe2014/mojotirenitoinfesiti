<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Shell -->
<div id="shell">
	
	
	<!-- Header -->
	<div id="header">
		<h1><a href="#">Admin Login</a></h1>
	</div>
	<!-- End Header -->
	
	<!-- Navigation -->
	<!--div id="navigation">
		<ul>
		    <li><a href="#"><span>Dashboard</span></a></li>
		    <li><a href="#"><span>News Articles</span></a></li>
		    <li><a href="#" class="active"><span>User Management</span></a></li>
		    <li><a href="#"><span>Photo Gallery</span></a></li>
		    <li><a href="#"><span>Products</span></a></li>
		    <li><a href="#"><span>Services Control</span></a></li>
		</ul>
	</div-->
	<!-- End Navigation -->
	
	<!-- Content -->
	<div id="content">
		
<form name="login" action="process.php" method="post">
<table border="1" bgcolor="seema">
	<tr>
		<td>
		<table border="0">
		
		<?php
		if(@$_GET['msg']==1){ ?>
		<tr>
			<td colspan="2" align="center">
				<strong>Please login first...</strong>
			</td>
		</tr>
		<?php } ?>
		
		<?php
		if(@$_GET['msg']==2)
		{
		?>
		<tr>
		<td colspan="2" align="center">
		<strong>successfully login......</strong>
		</td>
		</tr>
		<?php
		}
		?>

		<?php
		if(@$_GET['msg']==3)
		{
		?>
		<tr>
		<td colspan="2" align="center">
		<strong>please check ur user id or password......</strong>
		</td>
		</tr>
		<?php
		}
		?>
			<tr>
				<td>User Name :</td>
				<td><input type="text" name="user" value=""></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="pass" value=""></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="lg" value="Logins"></td>
			</tr>
	</td></tr>
</table>
</table>
</form>
		
	</div>
	
	<!-- End Content -->
</div>
<!-- End Shell -->

<!-- Footer -->
<div id="footer">
	<p>&copy; Train2Invest.com</p>
</div>
<!-- End Footer -->
</body>
</html>