<?php
	require_once "admin/includes/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title></title>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css"/>

  <link rel="stylesheet" href="nivo-slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" media="screen" />
  <script src="js/jquery-1.9.0.min.js"></script>
  <script type="text/javascript" src="js/jquery.quovolver.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    
    $('blockquote').quovolver();
    
  });
  </script>
  <script src="js/bootstrap.min.js"></script>
  </head>
</head>

<body>
<div class="container">
    <div class="logo_content row">
      <div class="logo_cont col-md-4 col-sm-12  col-xs-12">
        <a href="#"><img src="images/logo.png"  /></a>
     </div>
      
       <div class="navi col-md-8 col-sm-12 col-xs-12">
         <div class="top_menu">
               <a  href="blog.php">Blog</a> &nbsp;&nbsp;<a href="contact.php">Contact Us</a>
         </div>
				
      
	  <nav class="navbar-default">

			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  
			</div>
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		   <ul class="nav navbar-nav">
			<li> <a href="index.html" id="act">Home</a></li>
				<li><a href="about.html">About Us</a></li>
				<li> <a href="course_details.html">Course Details</a></li>
				<li><a href="testimonials.php">Testimonials</a></li>
				<li><a href="research.php">Research & Analysis </a></li>
			</ul>
		   </div>

       </nav>
	   
	   
	   </div>    
    </div>
 </div>
 <div class="border-line">
 </div>
 <div class="container">
    <div class="header row">
     <div class="slider-wrapper theme-default col-md-12">
            <div>
                <img src="images/headerbg.jpg" alt="" />
                       </div>
   </div>
   </div>
   </div>
    <div class="border-line">
 </div>
 <div class="content-container container-fluid">
 <div class="container">   
  <div class="content row">
	<div class="col-md-12 content-full">
		<h1>Blog</h1>
		
		<?php
			$sql = "select * from posts ORDER BY date DESC";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
		?>
		
				<div class="row post-container">
					<div class="col-md-12 post-title">
						<h2><?php echo $row['title']; ?></h2>			
					</div>
					<div class="col-md-12 post-date">
						<p>Posted <?php echo $row['date']; ?> By <span class="post-author"><?php echo $row['author']; ?></span></p>		
					</div>
					<!--div class="row post-content"-->
						<!--div class="col-md-3 post-image">
							<img src="images/blog/chuck.jpg">
						</div-->
						<div class="col-md-12 post-excerpt">
							<p>
								<?php echo $row['content']; ?>
							</p>
						</div>
					<!--/div-->
				</div>
		
		<?php 
			}
		?>
	</div>
  </div>
  
  
  
  </div>
<div class="clear"></div>
 <div class="border-line">
 </div>
<div class="footer">
<p> Copyright 2015&copy;Train2Invest.com</p>
</div>
  
</body>
</html>