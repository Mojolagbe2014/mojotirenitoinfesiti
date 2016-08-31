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
				<li><a href="course_details.html">Course Details</a></li>
				<li id="active"><a href="testimonials.php">Testimonials</a></li>
				<li><a href="research.php">Research & Analysis </a> </li>
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
                <img src="images/banner4.jpg" alt="" />
                       </div>
   </div>
   </div>
   </div>
    <div class="border-line">
 </div>
 <div class="content-container container-fluid">
 <div class="container">   
    <div class="content test row">
     <div class="col-md-12 content-full">
       <h1>Testimonials</h1>
	     <div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
				<video style="margin: 0 auto;" id="example_video_1" class="video-js vjs-default-skin" controls preload="auto" width="640" height="300"
					  poster="images/posternew1.png"
					  data-setup="{}">
					<source src="video/train2invest1.mp4" type='video/mp4' />
					</video>
			</div>
		</div>
      <p>We have had numerous requests from interested parties to speak with our clients directly. Many of our clients are very willing to talk about their experiences with Train2Invest. However, we respect their time and privacy. Therefore we will only provide contact information of our clients on the understanding that after talking to them, the prospect will enrol. Otherwise, time is wasted  <strong>Procrastination is the thief of time</strong></p>
      <?php
	  
		include('admin/includes/connect.php');		
		$fetch_data=mysql_query("select * from tbltestimonials  GROUP BY tyear DESC" );
		if(mysql_num_rows($fetch_data)>0){
			
			while($row=mysql_fetch_array($fetch_data)) { 
				
				$yr=$row['tyear'];
				if(empty($yr))
				{}
			else
			{
				?>
			<h3><?php echo $yr; ?></h3>
					<?php
			}
					 $fetch_sub_data=mysql_query("select * from tbltestimonials where tyear='".$yr."'");
					 						
							
							
							while($sub=mysql_fetch_array($fetch_sub_data)) {
								
									$dt=$sub['tdate'];
									$name=$sub['tname'];
									$txt=$sub['tcontent'];
									?>
																
									
									<p><?php if(empty($dt)) {} else {echo "<u>".$dt.":</u>";} ?><?php echo $txt; ?></p>
									<div class="test_name"> <?php  echo  $name;  ?></div>
						<?php }
							 
						
												
			}
		}
      
      ?>
<!--<h3>2015</h3>
<p><u>February 19 2015:</u>I am a 67 year old farmer and I had very little knowledge about stock trading. My computer skills were non-existent. The train2invest team helped a great deal. They were very patient with a 'senior'. I joined them in 2005 and have nothing but a wonderful experience. My portfolio increased by about 25% yearly since then. In fact, this past year I had a surprise with my ENB shares which jumped to $ 60+ – shares that I had bought regularly since 2005 as a long term investment (something they had suggested). That alone brought me more than [BLOCKED] return. I am still with them (February) 2015 and I recommend them very highly.</p>
<div class="test_name"> G.H., Red Deer, AB</div>

<p><u>February 13, 2015:<br /> Subject: Re: Update</u></p>
<p>Just to give you a quick update on last year. On my TFSA I made 26% last year on a starting balance of $12000. On myself direct RRSP account of $35,000 I made 29%.All is going well. Many thanks. </p>
<div class="test_name">&ndash;  TD, Winnipeg, MB</div>
<p><u>February 6, 2015 </u>I generated $ 5,315.75 in gains on the two stocksthis month [January 2015] or about 6.5%!
I do rely on your support and your information. It gives me confidence and keeps me grounded. I'm sitting with cash and some shares which are paying good dividends and I do not mind sitting on them. All in all, I am set to beat last year's return of 53%. Thank you very much. </p>
<div class="test_name">&ndash;  JW, Thunder Bay, ONT.</div>

<h3>2014</h3>
<p>We as a family have been clients since 2006 and I have learnt so much it is quite unbelievable that my husband & I have been so successful. For example, I was taught to trade ENB and this month I made more than $50,000 when it took a spike to $65 per share. Our children have really benefitted from this program and I am sure that when they have saved enough they will do well. I highly recommend them.</p>
<div class="test_name"> &ndash;  L.S., Portage la Prairie, MB</div>

<p>I am a farmer and have been a student since 2008. I joined Train2Invest after taking a beating in 2008. I learnt the skills that I taught that I couldn't learn and have been averaging about 25% per year. Despite this crazy few months, my portfolio managed a 12% increase this quarter.</p>
<div class="test_name"> D.R. Regina, Sask.</div>
<p>I am now a retired nurse and moved to BC. I joined them in 2011. I recommend them as my portfolio grew almost 53% over the last 3 years.</p> 
<div class="test_name">&ndash; C.W., Victoria, BC</div>

"Quite an outstanding experience. I had no knowledge of stock trading and was very fearful. They were very, very patient with me and hand held me until my first few trades. I continue to subscribe to their extended support membership after the initial Couse as find great help in their RTMA sessions. For example, I bought SW at $ 43 and sold for $ 47 within 10 days! Take the course, you won't regret it." 
<p class="test_name">&ndash;  E.R. Selkirk, MB</p>
<h3>Previous Years:</h3>
"Trading has become one of my new passions. It has made such a difference in my life, and above all of that I have taken control of my finances and had a lot of fun in the process. What else is there to ask for? Feel so lucky to have taken your course. Thank you." 
<div class="test_name">&ndash;  E.C. Winnipeg, MB</div>
<p>The first I had heard about the concept that Train2Invest teaches was in 2005. Paul had read an article about this and mentioned it to me. About a year later, he had read something again and said that maybe this is something we should look into, as we were planning to retire in late 2008 or early 2009. Then, in 2007 an information night was being held in Yorkton; Paul and an acquaintance decided to go to it. When Paul got home, he was all "hyped up" about what he had heard. As we talked about it, I was getting excited about it also. By the end of the evening, we had decided this was for us and a couple of days later we were signed up to take the course. In a few weeks, the classes began. The first few classes were a breeze for me as they were dealing with getting started and computer classes; I was fairly knowledgeable on the computer, but Paul wasn't. Then came the fundamentals and technical analysis. Yikes! This is where Paul's knowledge came in (thank goodness). After the first few classes of fundamentals and technical analysis, all I could say was – WHAT DID I GET MYSELF INTO! As time went on, the fundamentals and technical analysis became easier and wasn't that bad and, before we knew it, classes were done.</p>
<p>Then came the dreaded Report. We wanted to know how much we had actually learned so we decided to do our report on our own, without help. As it turned out, we did really quite well; just a few points behind the top mark. We actually learned it!</p>
<p>As the market seemed to have changed from when we began, we decided to take a refresher course and are we glad we did. Things had changed. The market was harder to predict.
In October 2008, we decided we had enough of just paper trading and had to put into practice what we had learned. We put in our first "buy" order. Would we make our 1%? Yes, we made it; then another and another and another. We wouldn't say we didn't make any mistakes, but thankfully our mistakes were made on small amounts and we realized what we had done wrong. Although we did make some mistakes, we still made money but not as much as we should have, but that is okay as it was a really good learning experience and, because the amounts were small, it didn't keep us awake at night worrying about it.</p>
<p>Train2invest's claim is that you can make at least 30% profit in one year. Since the beginning of 2009 until now (May, 2009) we have achieved 47% in our trading. WOW!!!! They were right; you can make 30% and more in one year. We still have seven more months to go this year. By following the teachings of Train2invest, we have made a profit and by continuing to follow what we have been doing so far we should be able to achieve even more profits as the year goes on. We weren't sure if we could even do this in a bear market, but obviously it can be done. As we have heard over and over again, we need to do what we have been trained to do if we want to make a profit, otherwise all the training was for naught. We would like to thank Jonathan, Bert, Tim, Martin, Jeff, and James for all their lectures and for the many, many times they harped at us about how important it is to do our research, fundamentals, technical, paper trading, doing a weekend plan, et cetera. All of this worked for us and it can for you as long as you are disciplined. We are currently (November, 2014) still with them!"</p>
<div class="test_name"> P & G , Saskatoon, Sask.</div>
<p>I started the course in the spring of 2006. I'm not a fast learner but by repeating some of the classes, I have been able to get a grasp of the concepts necessary to invest in the stock market. I'm still learning every day from my team and from the support staff at Train2 Invest. I'm already up 23% as of March 15/08 and if I keep the disciplines taught I will make 30% by June/08. I had watched my mutual fund investment performance provide a marginal return on my investments over the past few years. I had read many books on investments but I did not know what I should do in order to improve the returns on my investments. I did receive a flyer in the mail from Train2Invest on a course they offered. The course focus was on education. Our children had gone through university & we knew the benefits of education. My wife & I realized that we needed to spend some time educating ourselves on investments. We see education as a lifetime investment. As a family, we took the course together – this was our 'team'. We worked together & had a game plan which we all could focus on. We learned about risk tolerances & emotional make up of ourselves & our team members. We learned about identifying 'quality' companies using fundamental analysis (balance sheet strength) & how to trade using technical analysis (or as some call them 'charts'). We learnt to 'paper trade' i.e. a dummy account was created & we traded based on what we had learnt in the course. So any 'mistakes' we made did not cost us 'real' money. I still paper trade every day alongside my real trading to keep improving my skills. This course revealed what 'emotions' I faced when trading & how to manage them. The actual amount of money we invest will depend on our risk tolerance & in our confidence – there are many variables. As I progressed, I joined another team. This team consists of 4 other members in my area that have taken the course, we meet once a month and learn from each other. My experience in the market has taught me to keep the rules. I have some great times in the market – a 'NO ONE CAN STOP ME NOW' attitude – However, very quickly I had been humbled, usually that meant I didn't follow the rules I was taught, Got Greedy thought I was smart. I learnt not to 'change' the system taught by Train2Invest but each team member has adapted it to suit their own risk profiles. Overall, we are all moving ahead. It was important for us to recognize that being in cash was okay and that it is a good thing to be out of the market when the rules (indicators) suggest that. This takes some work on my part and I have to use the tools they gave me. Learning is on-going & thanks to the support provided by Train2Invest lecturers, coaches & support staff, it has been an enjoyable & exciting journey!!</p>
<div class="test_name"> G.L. Steinbach, MB</div>
<p>January 1, 2008 Personal Experience:<br />
*   Goal was to have the course paid for by Christmas of this year (2007). This has happened.<br />
* 	Goal is to have made 30% compounded in the first year. At this moment it is at 21.3%. Extrapolation is dangerous, but this equates to over 40% on an annual basis.<br />
*	Goal was to have at least 90% profitable trades. This is at 96% at the moment (98 of 102 trades).<br />
Thank you, Jonathan. Thank you Train2Invest!</p>
<div class="test_name"> L.B. Winkler, MB</div>
<p>
After receiving a flyer in the mail, my wife, Irene, and I attended a meeting in Saskatoon, on November 23rd 2005. We liked what we heard and signed up that evening, but didn't start taking classes until January 2006. In February I took sick with triple pneumonia, ending up in ICU in a coma, on a ventilator, losing 30 pounds in 2 days. After 5 weeks I came home from the hospital, but I had to learn to walk again, and with such a prolonged period of lack of oxygen, my memory function was not good – so when we started taking the modules again, in April, I had to take them over, and over several times in order to learn the concept that was being taught. The people at Train2Invest allowed us to take the modules over as many times as we felt we needed, without question. We certainly didn't find the course a 'cake-walk', it was hard work, and sometimes very frustrating, but we persevered, and did graduate from the course. After paper trading for several weeks we opened a trading account, and put some money at risk on our first trade, which didn't turn out real well – it took the full two weeks to make the 1% – but it did – so we tried again -this time with better success, and following the principles that Train2Invest teaches we soon felt more comfortable buying and selling on the stock market, our fear of the stock market diminished (not our respect). On the 2006 4th quarter brokers report showed we had made 29.43%. The reason I mentioned my health problems was to point out that at the time as I lay in the hospital, the thoughts going through my mind, of possibly being an invalid or not being able to work again, of being a drain on society, the course we took from Train2Invest enabled me to feel confidence in myself and that I could generate an income and be a productive member of our society. The people at Train2Invest have been very supportive, and I want to thank them for their compassion. We are sorry that we could not be with you this evening, but we hope this story of our association with the people at Train2Invest helps prove to you that your choice to become involved is a good one! We are still part of the T2I family in November 2014 Respectfully </p>
<div class="test_name">VTD, Vernon, MB</div>-->

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
