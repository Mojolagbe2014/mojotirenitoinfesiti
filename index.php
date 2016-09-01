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

    <section id="portfolio">
        <div class="container row" style="margin: 0px auto;">
            <div class="section-header">
                <?php echo Setting::getValue($dbObj, 'THE_PROGRAM') ? Setting::getValue($dbObj, 'THE_PROGRAM') : ''; ?>
            </div>
            <div class="text-center">
                <ul class="portfolio-filter">
                    <?php 
                    $num = 1; $addStyle = '';
                    foreach ($settingObj->fetchRaw("*", " name LIKE 'THE_PROGRAM_MENU%' ", " name ASC ") as $setting) {
                        $settingData = array('name' => 'name', 'value' => 'value');
                        foreach ($settingData as $key => $value){
                            switch ($key) {  default     :  $settingObj->$key = $setting[$value]; break; }
                        }
                        $addStyle = $num == 1 ? 'active ' : ''; 
                        $secondPart = @explode(" ", trim(stripcslashes(strtolower(strip_tags($settingObj->value)))))[1] ? explode(" ", trim(stripcslashes(strtolower(strip_tags($settingObj->value)))))[1] : trim(stripcslashes(strtolower(strip_tags($settingObj->value))));
                    ?>
                    
                    <li><a href="#"  class="<?php echo $addStyle; ?>toggle-<?php echo $secondPart;?>"><?php echo trim(stripcslashes(strip_tags($settingObj->value))); ?></a></li>
                    <?php $num++; } ?>
                </ul><!--/#portfolio-filter-->
            </div>

            <div class="course-details">
                <?php 
                $nums = 1; $addStyles = '';
                foreach ($settingObj->fetchRaw("*", " name LIKE 'THE_PROGRAM_MENU%' ", " name ASC ") as $setting) {
                        $settingData = array('name' => 'name', 'value' => 'value');
                        foreach ($settingData as $key => $value){
                            switch ($key) {  default     :  $settingObj->$key = $setting[$value]; break; }
                        }
                        $secondPart = @explode(" ", trim(stripcslashes(strtolower(strip_tags($settingObj->value)))))[1] ? explode(" ", trim(stripcslashes(strtolower(strip_tags($settingObj->value)))))[1] : trim(stripcslashes(strtolower(strip_tags($settingObj->value))));
                        $newValue = $nums==1 ? StringManipulator::slugify(strip_tags($settingObj->value)) : $secondPart."-of-course";
                ?>
                <div class="container <?php echo $newValue; ?>">
                        <div class="row">
                            <?php echo Setting::getValue($dbObj, str_replace("MENU", "CONTENT", $settingObj->name)) ? Setting::getValue($dbObj, str_replace("MENU", "CONTENT", $settingObj->name)) : ''; ?>
                        </div>
                  <!-- /.row -->
                </div><?php $nums++; } ?>
            </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->

    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">About Us</h2>
                <p class="text-center wow fadeInDown" style="color:#111 !important;">In one sentence - we <span class="h2-red">TEACH</span>...<span class="h2-red">TRAIN</span>...<span class="h2-red">COACH</span> individuals & families to learn to invest directly in the Toronto Stock Exchange i.e. directly buy and sell shares <br> (known as Self-Directed Investors)</p>
            </div>

            <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-body min_height">
                          <div class="col-lg-6">
                            <strong class="strong-logo ">TRAIN<strong class="h2-red">2</strong>INVEST INC.</strong><span> is a privately-owned Canadian-based investment education corporation.</span>
                            <br>
                            <br>
                              <span>The Founder & Principal behind the company is Jonathan Chandran whose academic qualifications include finance & accountancy from Universities of London,UK and New York,USA and who has extensive experience in international banking (London, UK; New York, USA; Sydney, Australia; Singapore etc..) as well as having joint responsibility for mananging Can.$1 billion with a securities firm in Canada</span>
                              <br><br>
                              <span>Since 2004, <strong class="strong-logo">TRAIN<strong class="h2-red">2</strong>INVEST</strong> has trained thousands of families across  Canada. The next generation has developed a skill set that can never be learned at university.</span>
                              <br><br>
                              <span>We hope you will become part of this family.</span>
                          </div>
                          <div class="col-lg-6">
                          <span>The <strong class="strong-logo">TRAIN<strong class="h2-red">2</strong>INVEST</strong> program is a comprehensive learning process designed to radically change the concept of wealth managment. No longer should you give your hard-earned money to a person who is less well-off than you - just because he wears a suit & talks like a politician1</span>
                          <br><br>
                          <span>CAPITAL PRESERVATION and WEALTH ACCUMULATION is the cornerstone of the <strong class="strong-logo">TRAIN<strong class="h2-red">2</strong>INVEST</strong> program.</span>
                          <br><br>
                          <span>The course has been designed that DOES NOT require PhD in finance... a complex subject is broken down to bite-sized pieces. Realizing that no two people study/understand concepts the same way, it is structured in such a way that an individual studies at their own pace!</span>
                          <br><br>
                          <span>That's why we <span class="h2-red">TEACH</span>...<span class="h2-red">TRAIN</span>...<span class="h2-red">COACH:</span> You are NOT alone!</span>
                          <br>
                          <span>Invest for yourself BUT not by yourself!</span>
                          <br>
                          <a class="toggle-read" href="#">Read More</a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row toggle-read-more">
                    <div class="col-lg-6">

                        <h4>What is the Cost?</h4>
                        <br>
                        <span>Let's deal with a concept called VALUE!</span>
                        <br><br>
                          <span>Which one of these cars is worth $60,000? (They are both cars that take you from A to B... except when you meet a MACH truck!).</span>
                          <br>
                          <div class="row about-cars">
                            <div class="col-lg-6 car2">
                              <img src="images/car1.jpg" alt="" />
                            </div>
                            <div class="col-lg-6 car1">
                              <img src="images/car2.jpg" alt="" />
                            </div>
                          </div>
                          <br>
                          <span>Now, here's what you need  to do:</span> <br>
                          <span><strong> FIRST:</strong> calculate the COST that you are currently paying per year then multiply it 10 times.</span>
                          <br>
                          <strong>SECOND:</strong><span> What if you earned 5% p.a. on the COST that you just gave away? How much would that amount to?</span>
                          <br>
                          <strong>THIRD: </strong>
                          <span>What did you recieve for the fee that you paid? (Do you know the MER & management fee you paid?)</span>
                      </div>
                        <div class="col-lg-6">
                        <h4>THE PROGRAM: 6 Months</h4>
                        <br>
                        <span class="h2-red">Phase 1:</span><strong> TEACHING</strong><span> Sessions - 10 weekly classes on Fundamental; Technical & Emotional Analysis.</span>
                        <br><br>
                        <span class="h2-red">Phase 2:</span><strong> TRAINING</strong><span> Sessions - Practicing with a DUMMY account to proved skills acquired under Phase 1. RTMA (Weekly Real-Time Market Analysis) Sessions ensuring that you are fully informed of Global & Domestic events.</span>
                        <br><br>
                        <span class="h2-red">Phase 3:</span><strong> COACHING</strong><span> Sessions - Creation of a Portfolio with RRSP/TFSA etc; Advanced Technical Analysis Modules improving decision-making process with hands-on support.</span>
                        <br><br>
                        <span class="h2-red">NOTE: </span><span>All sessions are recorded & available for viewing at your convenience.</span>
                        <h4>TOOLS & RESOURCES INCLUDED</h4>
                          <ul>
                            <li><a href="#">Comprehensive course manual(pdf).</a></li>
                            <li><a href="#">Charting/Technical analysis software.</a></li>
                            <li><a href="#">News Letters (Monthly) & Ad-hoc breaking news emails.</a></li>
                          </ul>
                        </div>
                    </div>
        </div>
    </section><!--/#about-->

    <section id="testimonial">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="embed-responsive embed-responsive-16by9">

                      <iframe width="854" height="480" src="https://www.youtube.com/embed/gNslMvvDznw?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
            </div>
                <div class="col-sm-12 col-lg-6 col-md-6">

                    <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item">

                                <h4>G.L. Steinbach, MB</h4>
                                <small>January 1, 2008</small>
                                <strong>Personal Experience</strong>
                                <p>Goal was to have the course paid for by Christmas of this year [2007]. This has happened. Goal is to have made 30% compounded in the first year. At this moment it is at 21.3%. Extrapolation is dangerous, but this equates to over 40% on an annual basis. Goal was to have at least 90% profitable trades. This is at 96% at the moment [98 of 102 trades].Thank you, Jonathan. Thank you Train2Invest!</p>
                            </div>
                            <div class="item  active">

                                <h4>JW, Thunder Bay, ONT.</h4>
                                <small>February 6, 2015</small>
                                <p>I generated $ 5,315.75 in gains on the two stocksthis month [January 2015] or about 6.5%! I do rely on your support and your information. It gives me confidence and keeps me grounded. I'm sitting with cash and some shares which are paying good dividends and I do not mind sitting on them. All in all, I am set to beat last year's return of 53%. Thank you very much.</p>
                            </div>
                            <div class="item">

                                <h4>E.R. Selkirk, MB</h4>
                                <small>February 6, 2015</small>
                                <p>Quite an outstanding experience. I had no knowledge of stock trading and was very fearful. They were very, very patient with me and hand held me until my first few trades. I continue to subscribe to their extended support membership after the initial Couse as find great help in their RTMA sessions. For example, I bought SW at $ 43 and sold for $ 47 within 10 days! Take the course, you won't regret it.</p>
                            </div>
                            <div class="item">

                                <h4>L.S., Portage la Prairie, MB</h4>
                                <small>2014</small>
                                <p>We as a family have been clients since 2006 and I have learnt so much it is quite unbelievable that my husband & I have been so successful. For example, I was taught to trade ENB and this month I made more than $50,000 when it took a spike to $65 per share. Our children have really benefitted from this program and I am sure that when they have saved enough they will do well. I highly recommend them.</p>
                            </div>


                        </div>

                        <!-- Controls -->
                        <div class="btns">
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <br>
                        <div><a class="btn btn-primary btn-lg" href="testimonials.pdf">Read More</a></div>
                    </div>
                </div>
            
            </div>
        </div>
    </section><!--/#testimonial-->

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


    <section>
    
    <div class="row">


        
        </div><!---->
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
  
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     <iframe id="map-frame" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2574.1070166052727!2d-97.2040127!3d49.821653800000014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ea751665c3feb5%3A0x5abc9fe2927f2c59!2s1660+Kenaston+Blvd+%23700037%2C+Winnipeg%2C+MB+R3P+2M6!5e0!3m2!1sen!2sca!4v1427290646161" width="500" height="350" frameborder="0" style="border:0"></iframe>
                    </div>
                    

                    <div class="col-sm-12 col-lg-8 col-md-8">
<div class="contact-cont">

    <form class="well form-horizontal" action="sendmail.php" method="post"  id="contactus">

<fieldset>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Full Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="fname" id="fname" required="yes" placeholder="Full Name" class="form-control"  type="text">
    </div>
  </div>
</div>



<!-- Text input-->
       <div class="form-group">
  <label class="col-md-3 control-label">E-Mail</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" required="yes" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-3 control-label">Phone #</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telephone" required="yes" placeholder="Phone" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-3 control-label">Address</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" required="yes" placeholder="Address" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-3 control-label">Country</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="country" required="yes" placeholder="Country" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-3 control-label">State</label>
    <div class="col-md-8 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="state" required="yes" class="form-control selectpicker" >
      <option value=" " >Please select your state</option>
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

    </select>
  </div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Postal Code</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="post" required="yes" placeholder="Postal Code" class="form-control"  type="text">
    </div>
</div>
</div>


  
<div class="form-group">
  <label  class="col-md-3 control-label">Message</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea required="yes" class="form-control" name="message" placeholder="Project Description"></textarea>
  </div>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-3 control-label">Captcha</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
      <img src="http://www.train2invest.com/captcha.php" id="captcha"><br>
      <!-- CHANGE TEXT LINK -->
      <a href="#" onclick="document.getElementById('captcha').src='captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();" id="change-image">Not readable? Change text.</a><br><br>
  </div>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-3 control-label">Captcha Code</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input  required="yes" name="captcha" value="" id="captcha-form" autocomplete="off" class="form-control"  type="text">
   
  </div>
  </div>
</div>
  
<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">
</div> -->
  <?php
        if(isset($_GET['msg']))
        {
          ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
          if($_GET['msg'] == '1')
          {
            echo "Failed! Please fill the form</div>";
          }
          if($_GET['msg'] == '2')
          {
            ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
            echo "Invalid captcha</div>";
          }
          if($_GET['msg'] == '3')
          {
            ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
            echo "Your Request has been sent.</div>";
          }
          if($_GET['msg'] == '4')
          {
            ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
            echo "Cannot Send the request</div>";
          }
          
        }
        else{}
      ?>


<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button type="submit" name="sendmail" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>


                    <div class="contact-info-address col-sm-12 col-lg-4 col-md-4">
                      
                        <h4>Contact Info</h4>
                        <div class="hline"></div>
                          <p>
                            <strong>Tel:</strong> 204-414-9106
                          </p>
                          <p><strong>Fax:</strong> 204-414-9164</p>
                          <p>
                            <strong>Email:</strong> admin@train2invest.com<br>
                          </p>
                          <p><strong>Address:</strong></p>
                          <p>1-1660 Kenaston Blvd. Unit 70037
                          Winnipeg MB R3P 2H3 Canada</p>
                      
                    </div>


                      </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 Train2Invest. Designed by <a target="_blank" href="#">Logixcess</a>
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/equalHeights.js"></script>

    <script >
    $(document).ready(function(){
      console.log("yes");

          $("a.toggle-requirements").on("click",function(e){
              if($("div.basic-requirements").css("display") != "none"){
                return;
              }
              else if($("div.phases-of-course").css("display") != "none"){
                $("div.phases-of-course").fadeOut(500).css("display","none");
                $("div.basic-requirements").fadeIn(500).css("display","block");
              }
              else if($("div.outline-of-course").css("display") != "none"){
                $("div.outline-of-course").fadeOut(500).css("display","none");
                $("div.basic-requirements").fadeIn(500).css("display","block");
              }
              console.log("yes1");
              e.preventDefault();
          });
          $("a.toggle-phases").on("click",function(e){
            if($("div.phases-of-course").css("display") != "none"){
              return;
            }
            else if($("div.basic-requirements").css("display") != "none"){
              $("div.basic-requirements").fadeOut(500).css("display","none");
              $("div.phases-of-course").fadeIn(500).css("display","block");
            }
            else if($("div.outline-of-course").css("display") != "none"){
              $("div.outline-of-course").fadeOut(500).css("display","none");
              $("div.phases-of-course").fadeIn(500).css("display","block");
            }
            console.log("ye2");
            e.preventDefault();
          });
          $("a.toggle-outline").on("click",function(e){
            console.log("ye3");
            if($("div.outline-of-course").css("display") != "none"){
              return;
            }
            else if($("div.phases-of-course").css("display") != "none"){
              $("div.phases-of-course").fadeOut(500).css("display","none");
              $("div.outline-of-course").fadeIn(500).css("display","block");
            }
            else if($("div.basic-requirements").css("display") != "none"){
              $("div.basic-requirements").fadeOut(500).css("display","none");
              $("div.outline-of-course").fadeIn(500).css("display","block");
            }
            console.log("yes3");
            e.preventDefault();
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
