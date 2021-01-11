<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Headphone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="#">

    <link href="http://fonts.googleapis.com/css?family=Muli:400,600,700,800" rel="stylesheet" type="text/css" />
    <!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/parent-style.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/swiper.css" type="text/css" />

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/demos/headphones/headphones.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/demos/headphones/css/fonts.css" type="text/css" />

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/responsive.css" type="text/css" />

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/demos/headphones/css/colors.css" type="text/css" />

    <?php wp_head(); ?>

    <?php
    $standard_logo         =    get_field('standard_logo');
    $retina_logo           =    get_field('retina_logo');
    ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'headphone' ); ?></a>

    <div id="wrapper" class="clearfix">

        <header id="header" class="transparent-header no-sticky dark clearfix">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <div id="logo">
                        <!--                         <a href="index.html" class="standard-logo">
                            <?php if(!empty($standard_logo)) : ?>
                                <img alt="Canvas Logo" src="<?php echo $standard_logo['url']; ?>">
                            <?php endif;?>
                        </a>
                        <a href="index.html" class="retina-logo">
                            <?php if(!empty($retina_logo)) : ?>
                                <img alt="Canvas Logo" src="<?php echo $retina_logo['url']; ?>">
                            <?php endif;?>
                        </a> -->
                        <a href="<?php echo get_home_url(); ?>" class="standard-logo"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/demos/headphones/images/logo.png" alt="Canvas Logo"></a>

                        <a href="<?php echo get_home_url(); ?>" class="retina-logo"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/demos/headphones/images/logo@2x.png" alt="Canvas Logo"></a>
                    </div>

                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'     => 'nav',
                        'container_id'  => 'primary-menu',
                        'container_class' => '',
                        'menu_class'      => '',
                        'depth'         => 2,
                        'link_before'     => '<div>',
                        'link_after'     => '</div>'
                    ));
                    ?>
                    <div id="top-cart"><?php add_mini_cart_to_header(); ?></div>
                </div>
                <div id="header-cart-menu"></div>
            </div>

        </header><!-- #header end -->
