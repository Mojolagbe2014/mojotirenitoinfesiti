<?php
session_start();
require_once "includes/secure.php";
require_once "includes/connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
	<script src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<body>
<!-- Shell -->
<div id="shell">
	
	<!-- Header -->
	<div id="header">
		<h1><a href="#">Admin</a></h1>
		<div class="right">
			<p>Welcome <a href="#"><strong><?php echo $_SESSION['user']; ?></strong></a></p>
			<p class="small-nav"><a href="logout.php">Log Out</a></p>
		</div>
	</div>
	<!-- End Header -->
	
	<!-- Navigation -->
	<div id="navigation">
		<ul>
		    <li><a href="index.php"><span>All Posts</span></a></li>
			<li><a href="add_post.php"><span>Add Post</span></a></li>
		    <li><a href="addtestimonials.php"><span>Add Testimonials</span></a></li>
			<li><a href="viewtestimonials.php"><span>View Testimonials</span></a></li>
			<li><a href="addresearch.php"><span>Add Research</span></a></li>
		   <!--li><a href="#" class="active"><span>User Management</span></a></li>
		    <li><a href="#"><span>Photo Gallery</span></a></li>
		    <li><a href="#"><span>Products</span></a></li>
		    <li><a href="#"><span>Services Control</span></a></li-->
		</ul>
	</div>
	<!-- End Navigation -->
	
	<!-- Content -->
	<div id="content">
		<table border="1" cellspacing="10" style="width:100%">
			<tr>
				<td style="font-weight:bold;width:10%">Id</td>
				<td style="font-weight:bold;width:10%">Year</td>
				<td style="font-weight:bold;width:10%">Date</td>
				<td style="font-weight:bold;width:50%">Testimonial</td>
				<td style="font-weight:bold;width:20%">Action</td>
			</tr>
			<?php
				if(@$_GET['m']==1)
				{
				?>
				<tr>
					<td colspan="6" align="center"><strong>Post Updated Successfully</strong></td>
				</tr>
				<?php } ?>
				<?php
				if(@$_GET['m']==3)
				{
				?>
				<tr>
					<td colspan="6" align="center"><strong>Post Deleted</strong></td>
				</tr>
				<?php } ?>
				
		<?php
			$sql = "select * from tbltestimonials ORDER BY tdate DESC";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result))
			{
			?>
			<tr>
				<td><?php echo $row['tid']; ?></td>
				<td><?php echo $row['tyear']; ?></td>
				<td><?php echo $row['tdate']; ?></td>
				<td><?php echo $row['tcontent']; ?><hr/><?php echo $row['tname']; ?></td>
				<td><a href="addtestimonials.php?id=<?php echo $row['tid']; ?>">Edit</a> | 
				<a href="deltesti.php?id=<?php echo $row['tid']; ?>&action=del">Delete</a></td>
			</tr>
		<?php } ?>
		</table>
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