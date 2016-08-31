
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
				<li ><a href="testimonials.php">Testimonials</a></li>
				<li id="active" > <a href="research.php">Research & Analysis </a></li>
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
                <img src="images/banner contact.jpg" alt="" />
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
       <h1>Research Analysis</h1><label><a href="images/research.pdf" target="_blank">Click here for Research & Analysis</a></label>

    
<p><a href="testimonials.php"><strong>Check out our testimonials</strong></a></p>
<h3><center><u>DISCLAIMER</u></center></h3>
<?php
	  
		include('admin/includes/connect.php');		
		$fetch_data=mysql_query("select * from tblres " );
		
		if(mysql_num_rows($fetch_data)>0){
			
			while($row=mysql_fetch_array($fetch_data)) { 
				
				$txt=$row['res'];
				
				echo $txt;
				
			}
			
			
		}
?>
<!--<p>All contents copyright by TRAIN2INVEST Inc. All rights reserved. No part of this document or the related files may be reproduced or transmitted in any form, by any means (electronic, photocopying, recording, or otherwise) without the prior written permission of the publisher.</p>
<p>Limit of Liability and Disclaimer of Warranty: The publisher has used its best efforts in preparing this book, and the information provided herein is provided "as is." TRAIN2INVEST Inc. or its agents or its employees or its principals makes no representation or warranties with respect to the accuracy or completeness of the contents of this book and specifically disclaims any implied warranties of merchantability or fitness for any particular purpose and shall in no event be liable for any loss of profit or any other commercial damage, including but not limited to special, incidental, consequential, or other damages.</p>

<p>Trademarks: This book identifies product names and services known to be trademarks, registered trademarks, or service marks of their respective holders. They are used throughout this book in an editorial fashion only. In addition, terms suspected of being trademarks, registered trademarks, or service marks have been appropriately capitalized, although TRAIN2INVEST Inc. cannot attest to the accuracy of this information. Use of a term in this book should not be regarded as affecting the validity of any trademark, registered trademark, or service mark. TRAIN2INVEST Inc. is not associated with any product or vendor mentioned in this e-book.</p>
<p>TRAIN2INVEST INC does NOT provide investment advice or investment recommendations. All participants are fully aware that examples & other instructions (verbal – implicit or explicit and any other form of communication) will not and cannot be constituted as a recommendation or advice for investment purposes.</p>-->

  
  </div>
  </div>
  </div>
<div class="clear"></div>
 <div class="border-line">
 </div>
<div class="footer">
<p> Copyright 2015 &copy;Train2Invest.com</p>
</div>
  
</body>
</html>
