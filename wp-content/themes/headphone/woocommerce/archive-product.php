<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
    <section id="page-title">

        <div class="container clearfix">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>
            <ol class="breadcrumb">
                <?php
                /**
                 * Hook: woocommerce_before_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 * @hooked WC_Structured_Data::generate_website_data() - 30
                 */
                do_action( 'woocommerce_before_main_content' );

                ?>
            </ol>
        </div>

    </section>

    <section id="content">

        <div class="container custom-container-headphone clearfix">
            <i class="i-plain icon-cogs custom-shop-mobile-sidebar-reveal-icon"></i>
        </div>

        <div class="content-wrap custom-shop-content-wrap">
            <!--            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>-->
            <div class="container custom-container-headphone clearfix">
                <div class="row">

                    <div class="col-lg-3 col-md-12 clearfix custom-shop-sidebar-col">
                        <?php
                        /**
                         * Hook: woocommerce_sidebar.
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );

                        ?>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="postcontent custom-postcontent-headphone nobottommargin col_last">

                            <div id="shop" class="shop product-3 grid-container clearfix">
                                <header class="woocommerce-products-header">
                                    <?php
                                    /**
                                     * Hook: woocommerce_archive_description.
                                     *
                                     * @hooked woocommerce_taxonomy_archive_description - 10
                                     * @hooked woocommerce_product_archive_description - 10
                                     */
                                    do_action( 'woocommerce_archive_description' );
                                    ?>
                                </header>
                                <?php
                                if ( woocommerce_product_loop() ) {

                                    /**
                                     * Hook: woocommerce_before_shop_loop.
                                     *
                                     * @hooked woocommerce_output_all_notices - 10
                                     * @hooked woocommerce_result_count - 20
                                     * @hooked woocommerce_catalog_ordering - 30
                                     */

                                    // do_action( 'woocommerce_before_shop_loop' );

                                    woocommerce_product_loop_start();

                                    if ( wc_get_loop_prop( 'total' ) ) {
                                        while ( have_posts() ) {
                                            the_post();

                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             *
                                             * @hooked WC_Structured_Data::generate_product_data() - 10
                                             */
                                            do_action( 'woocommerce_shop_loop' );

                                            wc_get_template_part( 'content', 'product' );
                                        }
                                    }

                                    woocommerce_product_loop_end();

                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop' );
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action( 'woocommerce_no_products_found' );
                                }

                                /**
                                 * Hook: woocommerce_after_main_content.
                                 *
                                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                                 */
                                do_action( 'woocommerce_after_main_content' );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="custom-made-modal">
        <div class="container custom-made-modal-container">
            <button type="button" class="close custom-made-modal-container-close-icon" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="row">
                <div class="col-md-12 custom-psuedo-inner-modal-content">
                </div>
            </div>
        </div>
    </div>
<?php
get_footer( 'shop' );
