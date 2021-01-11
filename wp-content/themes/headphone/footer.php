<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Headphone
 */

?>
<?php


?>
<?php wp_footer(); ?>

<footer id="footer" class="noborder nobg">

    <div class="container clearfix">

        <!-- Footer Widgets
            ============================================= -->
        <div class="footer-widgets-wrap clearfix">

            <div class="row">
                <div class="col-6 col-sm">
                    <img class="mb-2" src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/demos/headphones/images/footer-logo.png" alt="" width="30">
                    <small class="d-block mb-4 text-muted">&copy; 2017-2018</small>
                    <div class="w-100 d-flex">
                        <a href="#" class="social-icon si-colored si-rounded si-mini si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-colored si-rounded si-mini si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-colored si-rounded si-mini si-youtube">
                            <i class="icon-youtube"></i>
                            <i class="icon-youtube"></i>
                        </a>
                        <a href="#" class="social-icon si-colored si-rounded si-mini si-instagram">
                            <i class="icon-instagram"></i>
                            <i class="icon-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm">
                    <h4>Features</h4>
                    <ul class="list-unstyled nobottommargin text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Random feature</a></li>
                        <li><a class="text-muted" href="#">Team feature</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                        <li><a class="text-muted" href="#">Another one</a></li>
                        <li><a class="text-muted" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm col-sm mt-4 mt-sm-0 mt-md-0 mt-lg-0 mt-xl-0">
                    <h4>Resources</h4>
                    <ul class="list-unstyled nobottommargin text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                        <li><a class="text-muted" href="#">Resource name</a></li>
                        <li><a class="text-muted" href="#">Another resource</a></li>
                        <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm mt-4 mt-sm-0 mt-md-0 mt-lg-0 mt-xl-0">
                    <h4>About</h4>
                    <ul class="list-unstyled nobottommargin text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

</footer>

</div>

<div id="gotoTop" class="icon-line-arrow-up"></div>

<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/jquery.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/plugins.js"></script>

<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/functions.js"></script>

<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/custom.js"></script>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";

    }
</script>
</body>
</html>