<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Headphone
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                    <div class="col-md-9">
                        <?php woocommerce_content(); ?>
                    </div>
                </div>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
