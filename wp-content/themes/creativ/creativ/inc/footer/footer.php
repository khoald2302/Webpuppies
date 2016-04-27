<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
global $smof_data;
?>
</div><!-- #main -->
<footer>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <img alt="Webpuppies Footer Logo" src="http://localhost/webpuppies/wpsg.dev/wp-content/uploads/2016/04/site-logo-footer.png">
                    <hr>
                </div>
                <div class="col-sm-6" id="footer-left">

                    <ul id="foot_services" class="list-unstyled">
                        <li id="foot_header">Our Services</li>
                        <li>
                            <span class="fa fa-desktop fa-1g fa-pad"></span>
                            <a href="/web-design">Web Design</a></li>
                        <li>
                            <span class="fa fa-shopping-cart fa-1g fa-pad"></span><a href="/ecommerce">Ecommerce</a></li>
                        <li>
                            <!--<span class="fa fa-usd fa-1g fa-pad"></span><a href="#">Digital Marketing</a></li>
                            <li>
                            <span class="fa fa-wrench fa-1g fa-pad"></span><a href="#">Maintenance</a></li>
                            <li>
                            <span class="fa fa-stethoscope fa-1g fa-pad"></span><a href="#">Consultation</a></li>
                            -->
                        </li></ul>

                    <ul id="foot_links" class="list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="/why-us">Why Us?</a></li>
                        <li><a href="/who-we-are">Who We Are</a></li>
                        <li><a href="/pic">PIC Grant</a></li>
                        <li><a href="/careers">Careers</a></li>
                        <li class="footer-btn"><a href="/contact-us">Contact Us</a></li>
                    </ul>

                </div>
                <div class="col-sm-6" id="footer-right">
                    <h5 class="footer-header">Locate Us</h5>
                    <p>Trivex<br>8 Burn Road, #13-02<br>Singapore 369977</p>
                    <p><a href="tel:+6567411708">+65 6741 1708</a><br><a href="mailto:contact@webpuppies.com.sg">contact@webpuppies.com.sg</a></p>
                    <p>&nbsp;</p>
                    <h5 class="footer-header">Stay Connected</h5>
                    <a href="https://facebook.com/webpuppies.singapore" rel="nofollow" target="_blank"><span class="fa fa-facebook"><div class="hidden">Facebook</div></span></a><a href="https://twitter.com/webpuppies" rel="nofollow" target="_blank"><span class="fa fa-twitter social-icon"><div class="hidden">Twitter</div></span></a>
                </div>
                <div class="col-sm-12" id="copyright">
                    <p>© 2016 Webpuppies. All Rights Reserved. <span id="terms-privacy"><a href="/terms">Terms of Service</a> &amp; <a href="/privacy">Privacy Policy</a></span></p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #site-footer -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>