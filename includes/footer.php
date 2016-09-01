<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php $currYear   = new DateTime(); echo $currYear->format('Y'); ?> All Rights Reserved. 
                    <em>Re-developed by: <a href="http://timca.6te.net" target="_blank" rel="nofollow">TIMCA Computers Inc</a></em>
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
    <?php echo Setting::getValue($dbObj, 'ADDTHIS_SHARE_BUTTON') ? Setting::getValue($dbObj, 'ADDTHIS_SHARE_BUTTON') : ''; ?>
