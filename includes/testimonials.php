<section id="testimonial">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="embed-responsive embed-responsive-16by9">
                  <video controls>
                      <?php foreach ($videoObj->fetchRaw("*", " name = 'home_video_one' ", " name ASC LIMIT 1 ") as $video) { ?>
                        <source src="media/video/<?php echo $video['video']; ?>" type="video/mp4">
                      <?php } ?>
                      Your browser does not support the video tag.
                  </video>
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