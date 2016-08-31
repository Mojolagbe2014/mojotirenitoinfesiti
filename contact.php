<?php
	session_start();
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
  <link href="css/video-js.css" rel="stylesheet" type="text/css">
  <script src="js/jquery-1.9.0.min.js"></script>
  <script type="text/javascript" src="js/jquery.quovolver.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    
    $('blockquote').quovolver();
    
  });
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/video.js"></script>
  <script>
    videojs.options.flash.swf = "js/video-js.swf";
  </script>
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
				<li ><a href="research.php">Research & Analysis </a> </li>
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
                <img src="images/cont_banner.jpg" alt="" />
                       </div>
   </div>
   </div>
   </div>
    <div class="border-line">
 </div>
 <div class="content-container container-fluid">
 <div class="container">   
	<div class="row">
		<div class="md-col-12">
			<video style="margin: 0 auto;" id="example_video_1" class="video-js vjs-default-skin" controls preload="auto" width="640" height="300"
				  poster="images/posternew.png"
				  data-setup="{}">
				<source src="video/train2invest.mp4" type='video/mp4' />
				
		  </video>
		</div>
	</div>
    <div class="content row">
	<div class="col-md-12 content-full">
    <h1>Contact Us</h1>
	<div class="address col-md-4 col-sm-12 col-xs-12">
		<p><strong>Address: </strong>1-1660 Kenaston Blvd.<br/> Unit 70037, <br/>Winnipeg MB R3P 0X6 Canada</p>
		<p><strong>Tel: </strong>204-414-9106 (Voice Mail)</p>
		<p><strong>Fax: </strong>204-414-4196</p>
		<p><strong>Email: </strong>admin@train2invest.com</p>
	</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2574.1070166052727!2d-97.2040127!3d49.821653800000014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ea751665c3feb5%3A0x5abc9fe2927f2c59!2s1660+Kenaston+Blvd+%23700037%2C+Winnipeg%2C+MB+R3P+2M6!5e0!3m2!1sen!2sca!4v1427290646161" width="500" height="350" frameborder="0" style="border:0"></iframe>
	<div class="contact-form col-md-8 col-sm-12 col-xs-12">
		<form id="contactus" name="contactus" method="post" action="sendmail.php">
			<?php
				if(isset($_GET['msg']))
				{
					if($_GET['msg'] == '1')
					{
						echo "<p>Please fill the form</p>";
					}
					if($_GET['msg'] == '2')
					{
						echo "<p>Invalid captcha</p>";
					}
					if($_GET['msg'] == '3')
					{
						echo "<p>Your Request has been sent.</p>";
					}
					if($_GET['msg'] == '4')
					{
						echo "<p>Cannot Send the request</p>";
					}
					
				}
				else{}
			?>
			<p><label>Full Name:* </label><input required type="text" name="fname" value="<?php echo $_SESSION['refill']['fname']; ?>" id="fname" /></p>
			<p><label>Address:* </label><input  required type="text" name="address" value="<?php echo $_SESSION['refill']['address']; ?>" id="address" /></p>
			<p><label>Province/State:* </label><select  required name="state">
				<option value="Ontario">Ontario</option>
				<option value="Quebec">Quebec</option>
				<option value="Nova Scotia">Nova Scotia</option>
				<option value="New Brunswick">New Brunswick</option>
				<option value="Manitoba">Manitoba</option>
				<option value="British Columbia">British Columbia</option>
				<option value="Prince Edward Island">Prince Edward Island</option>
				<option value="Saskatchewan">Saskatchewan</option>
				<option value="Alberta">Alberta</option>
				<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
			</select></p>
			<p><label>Postal Code:* </label><input required type="text" name="post" value="<?php echo $_SESSION['refill']['post']; ?>" id="post" /></p>
			<p><label>Country:* </label><input  required type="text" name="country" value="<?php echo $_SESSION['refill']['country']; ?>" id="country" /></p>
			<p><label>Telephone:* </label><input required type="text" name="telephone" value="<?php echo $_SESSION['refill']['telephone']; ?>" class="bfh-phone" id="inputTell" data-format="(ddd) ddd-dddd" /></p>
			<p><label>Email:* </label><input  required type="email" name="email" value="<?php echo $_SESSION['refill']['email']; ?>" id="email" /></p>
			<p><label>Message:* </label><textarea  required name="message" rows="6"><?php echo $_SESSION['refill']['message']; ?></textarea></p>
			<p>
			<label></label>
			<img src="captcha.php" id="captcha" /><br/>
			<!-- CHANGE TEXT LINK -->
			<a href="#" onclick="document.getElementById('captcha').src='captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();" id="change-image">Not readable? Change text.</a><br/><br/>
			</p>
			<p><label>Captcha Code:* </label><input  required type="text" name="captcha" value="" id="captcha-form" autocomplete="off" /></p>
			<p><label><input type="submit" name="sendmail" value="submit"></label></p>
		</form>
	</div>
	
  </div>
  </div>
  
<!--script src="js/jQuery.Validate.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
    jQuery(document).ready(function () {
        var validator = jQuery("#contactus").validate({
            rules: {
                fname:
                {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                telephone:
                {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 11
                },
                address:
                {
                    required: true
                },
                state:
                {
                    required: true
                },
                post:
                {
                    required: true
                },
				country:
                {
                    required: true
                },
				message:
                {
                    required: true
                },
				captcha:
                {
                    required: true
                }

            },
            messages: {
                fname:
                {
                    required: "Please Enter fullname"
                },
                emali: {
                    required: "Please Enter Email ID",
                    email: "Enter Valid Email ID"
                },
                telephone:
                {
                    required: "Please Enter MobileNo",
                    digits: "Enter Only Digits",
                    minlength: "Please Enter Min 10 Digits",
                    maxlength: "Please Enter Max. 11 Digits"
                },
                address:
                {
                    required: "Please enter address"
                },
                state:
                {
                    required: "Please select state"
                },
                post:
                {
                    required: "Please Enter postcode"
                },
				 country:
                {
                    required: "Please Enter country"
                },
				 message:
                {
                    required: "Please Enter message"
                },
				 captcha:
                {
                    required: "Please Enter captcha"
                }
            }
        });

    });



   

</script-->

  
  </div>
<div class="clear"></div>
 <div class="border-line">
 </div>
<div class="footer">
<p> Copyright 2015&copy;Train2Invest.com</p>
</div>
  
</body>
</html>