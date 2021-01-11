<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}

?>

<section id="page-title" class="cart-breadcrumb-section">

    <div class="container clearfix">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_template_single_title(); ?></h1>
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

    <div class="content-wrap">

        <div class="container clearfix">

            <?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

            <div class="clear"></div>

            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

                <?php if ( $checkout->get_checkout_fields() ) : ?>

                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                    <div class="row clearfix" id="customer_details">
                        <div class="col-lg-6">
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        </div>

                        <div class="col-lg-6">
                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        </div>

                    </div>

                    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                <?php endif; ?>


                <div class="row clearfix">

                    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                    <h3 id="order_review_heading"><?php esc_html_e( 'Your Orders', 'woocommerce' ); ?></h3>

                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>

                    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

                </div>

            </form>

            <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

        </div>
    </div>
</section>