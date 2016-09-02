<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "home");
require('classes/WebPage.php'); //Set up page as a web page
require 'swiftmailer/lib/swift_required.php';
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$newsObj = new News($dbObj);
$sliderObj = new Slider($dbObj);
$testimonialObj = new Testimonial($dbObj);
$brochureObj = new CourseBrochure($dbObj);
$videoObj = new Video($dbObj);
$settingObj = new Setting($dbObj);
$Obj = new Setting($dbObj);
$errorArr = array(); //Array of errors
$msg = ''; $msgStatus = '';

include('includes/other-settings.php');
require('includes/page-properties.php');
if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) :  ''; 
    if($email == "") {array_push ($errorArr, "valid email ");}
    $name = filter_input(INPUT_POST, 'fname') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'fname')) :  ''; 
    if($name == "") {array_push ($errorArr, " name ");}
    $address = filter_input(INPUT_POST, 'address') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'address')) :  ''; 
    if($address == "") {array_push ($errorArr, " address ");}
    $state = filter_input(INPUT_POST, 'state') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'state')) :  ''; 
    if($state == "") {array_push ($errorArr, " state/province ");}
    $postCode = filter_input(INPUT_POST, 'post') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'post')) :  ''; 
    if($postCode == "") {array_push ($errorArr, " postal code ");}
    $country = filter_input(INPUT_POST, 'country') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'country')) :  ''; 
    if($country == "") {array_push ($errorArr, " country ");}
    $telephone = filter_input(INPUT_POST, 'telephone') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'telephone')) :  ''; 
    if($telephone == "") {array_push ($errorArr, " telephone ");}
    $body = filter_input(INPUT_POST, 'message') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'message')) :  ''; 
    if($body == "") {array_push ($errorArr, " message ");}
    $subject = filter_input(INPUT_POST, 'subject') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'subject')) :  ''; 

    $captcha = trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha'] ? "" : 1;
    if($captcha == "") {array_push ($errorArr, " captcha ");}
    
    
    if(count($errorArr) < 1)   {
        $emailAddress = COMPANY_EMAIL;//iadet910@iadet.net
        if(empty($subject)) $subject = "Message From: $name";	
        $transport = Swift_MailTransport::newInstance();
        $message = Swift_Message::newInstance();
        
            $content = "<table>";
            $content .= "<tr>";
            $content .= "<th>Full Name</th><th>Address</th> <th>State</th><th>Post Code</th><th>Country</th><th>Telephone</th><th>Email</th><th>Message</th>";
            $content .= "</tr>";
            $content .= "<tr>";
            $content .= "<td>" . $name . "</td><td>" . $address . "</td> <td>" . $state . "</td><td>" . $postCode . "</td><td>" . $country . "</td><td>" . $telephone . "</td><td>" . $email. "</td><td>" . $body . "</td>";
            $content .= "</tr>";
            $content .= "</table>";
            $content .= "</body>";
            $content .= "</html>";
        
        $message->setTo(array($emailAddress => WEBSITE_AUTHOR));
        $message->setSubject($subject);
        $message->setBody($content);
        $message->setFrom($email, $name);
        $message->setContentType("text/html");
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);
        $msgStatus = 'success';
        $msg = $thisPage->messageBox('Your message has been sent.', 'success');
    }else{ $msgStatus = 'error'; $msg = $thisPage->showError($errorArr); }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="<?php echo SITE_URL; ?>sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/twitter.css" rel="stylesheet" type="text/css"/>
    <style>div#second-video {padding-bottom: 46.25%;} #features .media.service-box:first-child {margin-top: 0px;}</style>
</head><!--/head-->

<body id="home" class="homepage">
    <?php include('includes/header.php'); ?>
    
    <?php include('includes/homepage-slider.php'); ?>

    <section id="cta" class="wow fadeIn">
      <!-- Page Content -->
        <div class="container">
            <!-- Welcome Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#4866CF;"> Welcome </h1>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body min_height"> <?php echo Setting::getValue($dbObj, 'WELCOME_MESSAGE') ? Setting::getValue($dbObj, 'WELCOME_MESSAGE') : ''; ?> </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section><!--/#cta-->

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><strong class="strong-logo bigger-size">TRAIN<strong class="h2-red bigger-size">2</strong>INVEST</strong> IS Building A Family</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Join Our Family<br />INVEST FOR YOURSELF, BUT NOT BY YOURSELF - We are here to COACH, MENTOR & GUIDE YOU!</p>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms"><a class="btn btn-primary btn-lg" href="#get-in-touch">Contact Us</a></p>
                <img class="img-responsive wow fadeIn" src="images/cta2/cta2-img.png" alt="" data-wow-duration="300ms" data-wow-delay="300ms">
            </div>
        </div>  
    </section>
    
    <?php include('includes/breaking-news.php'); ?>

    <?php include('includes/the-program.php'); ?>

    <?php include('includes/about-us.php'); ?>

    <?php include('includes/testimonials.php'); ?>

    <section id="get-in-touch" style="padding: 20px 0 10px;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Get in Touch</h2>
                <p class="text-center wow fadeInDown">You Can Email Us Here ! </p>
            </div>
            <div class="embed-responsive embed-responsive-16by9" id="second-video">
                <video controls>
                      <?php foreach ($videoObj->fetchRaw("*", " name = 'home_video_two' ", " name ASC LIMIT 1 ") as $video) { ?>
                        <source src="media/video/<?php echo $video['video']; ?>" type="video/mp4">
                      <?php } ?>
                      Your browser does not support the video tag.
                  </video>
            </div>

        </div>
    </section><!--/#get-in-touch-->

    <?php include('includes/contact-us.php'); ?>

    <?php include('includes/footer.php'); ?>

    <script src="js/jquery.js"></script>
    <script src="js/equalHeights.js"></script>
    <script src="js/common-handler.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <?php if(!empty($msg)) {  $swalTitle = 'Message Sent!'; if($msgStatus!='success'){ $swalTitle = 'Message Not Sent!';}     ?>
    <script src="<?php echo SITE_URL; ?>sweet-alert/sweetalert.min.js" type="text/javascript"></script>
    <script>
        swal({
            title: '<?php echo $swalTitle; ?>',
            text: '<?php echo $msg; ?>',
            confirmButtonText: "Okay",
            customClass: 'facebook',
            html: true,
            type: '<?php echo $msgStatus; ?>'
        });
    </script>
    <?php  $msg =''; $msgStatus ='';  } ?>
</body>
</html>
