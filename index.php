<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "home");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$newsObj = new News($dbObj);
$sliderObj = new Slider($dbObj);
$testimonialObj = new Testimonial($dbObj);
$brochureObj = new CourseBrochure($dbObj);
$videoObj = new Video($dbObj);
$settingObj = new Setting($dbObj);

include('includes/other-settings.php');
require('includes/page-properties.php');
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

    <?php include('includes/the-program.php'); ?>

    <?php include('includes/about-us.php'); ?>

    <?php include('includes/testimonials.php'); ?>

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Get in Touch</h2>
                <p class="text-center wow fadeInDown">You Can Email Us <br>Here ! </p>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                       <iframe width="560" height="315" src="https://www.youtube.com/embed/bD9KI29lXwc?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>

        </div>
    </section><!--/#get-in-touch-->

    <?php include('includes/contact-us.php'); ?>

    <?php include('includes/footer.php'); ?>

    <script src="js/jquery.js"></script>
    <script src="js/equalHeights.js"></script>

    <script >
    $(document).ready(function(){
        $("div.toggle-content").css('display', 'none').first().show();
        $("a.toggle").on("click",function(e){
            $("div.toggle-content").hide();
            menuContentId = $(this).attr('data-content');
            $('#'+menuContentId).slideToggle('slow');
        });

        $("a.toggle-read").on("click",function(e) {
            e.preventDefault();
            if($("div.toggle-read-more").css("display") == "none")
                $("div.toggle-read-more").slideDown(500).show();
            else
                $("div.toggle-read-more").fadeOut(500).hide();
          });
    });


    </script>
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
</body>
</html>
