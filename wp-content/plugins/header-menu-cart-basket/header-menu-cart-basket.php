
<?php
/**
 * Plugin Name: Header Cart Basket
 * Plugin URI: khaledhasan
 * Description: This is a plugin that allows us to cart_basket Ajax functionality in WordPress
 * Version: 1.0.0
 * Author: Khaled Hasan
 * Author URI: khaledhasan
 * License: GPL2
 */



add_action( 'wp_enqueue_scripts', 'ajax_cart_basket_enqueue_scripts' );
function ajax_cart_basket_enqueue_scripts() {
    wp_enqueue_script( 'cart_basket', plugins_url( '/cart_basket.js', __FILE__ ), array('jquery'), '1.0', true );
    wp_enqueue_style( 'cart_basket', plugins_url( '/cart_basket.css', __FILE__ ) );

    wp_localize_script( 'cart_basket', 'headermenucartbasket', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}

add_action( 'wp_ajax_nopriv_header_cart_basket', 'header_cart_basket' );
add_action( 'wp_ajax_header_cart_basket', 'header_cart_basket' );

function header_cart_basket() {
    $header_cart = '<div class="header-cart-menu-header-div"><h1 class="header-cart-menu-header-h1">Shopping Cart</h1></div>';
    $header_cart .= do_shortcode('[woocommerce_cart]');
    $header_cart .= '<div class="header-cart-menu-visit-cart-btn-div">';

    global $woocommerce;
    $amount2 = $woocommerce->cart->get_cart_total();
    $header_cart .=  $amount2;

    $header_cart .= '<a class="cart-customlocation" href="' . esc_url(wc_get_cart_url()) . '">';
    $header_cart .= '<button class="button button-3d button-small nomargin fright">VISIT CART</button>';
    $header_cart .= '</a>';
    $header_cart .= '</div>';

    echo $header_cart;

    die();
}