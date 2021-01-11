<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $upsells ) : ?>

    <section class="up-sells upsells products">

        <h2><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ); ?></h2>

        <?php woocommerce_product_loop_start(); ?>
        <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

            <?php foreach ( $upsells as $upsell ) : ?>
                <div class="oc-item">
                    <?php
                    $post_object = get_post( $upsell->get_id() );

                    setup_postdata( $GLOBALS['post'] =& $post_object );

                    wc_get_template_part( 'content', 'product' ); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php woocommerce_product_loop_end(); ?>

    </section>
    <div class="clear"></div><div class="line"></div>
<?php endif;

wp_reset_postdata();