<?php
/**
 * Headphone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Headphone
 */

if ( ! function_exists( 'headphone_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function headphone_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Headphone, use a find and replace
         * to change 'headphone' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'headphone', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'headphone' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'headphone_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'headphone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function headphone_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'headphone_content_width', 640 );
}
add_action( 'after_setup_theme', 'headphone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function headphone_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'headphone' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'headphone' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'headphone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function headphone_scripts() {
    wp_enqueue_style( 'headphone-style', get_stylesheet_uri() );

    wp_enqueue_script( 'headphone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'headphone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'headphone_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

// Add custom class to body
function custom_body_class($classes) {
    $classes[] = 'stretched';
    return $classes;
}

add_filter('body_class', 'custom_body_class');


// Add Woocommerce Theme Support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


//Change number of products per row
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3; // 3 products per row
    }
}
add_filter('loop_shop_columns', 'loop_columns', 999);

// Change Add to Cart Button Text

function woo_custom_product_add_to_cart_text() {

    return __( 'Add to Cart', 'woocommerce' );

}
add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +


//To change add to cart text on single product pages

function woo_custom_single_add_to_cart_text() {

    return __( 'Add to Cart', 'woocommerce' );

}
add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );// < 2.1

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );// 2.1 +



//Change a specific product button text in a Woocommerce product category page
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_loop_add_to_cart_button', 20, 2 );

function custom_loop_add_to_cart_button( $button_text, $product ) {
    // BELOW set the product categoty slug and the product ID
    if( $product->get_id() == '196' ) {
        $button_text = __("Buy Now", "woocommerce");
    }
    return $button_text;
}

//add custom view details buttonss
add_action( 'woocommerce_after_shop_loop_item', 'add_loop_custom_button', 1000 );

function add_loop_custom_button() {
    global $product;

    $specific_product_id    = $product->get_id();

    echo '<a class="button view-details-btn" href="#" prod_id="' . $specific_product_id . '"><i class="icon-zoom-in2"></i>' . __( "Quick View" )  . '</a>';
}


/**
 * @snippet       Display Discount Percentage @ Loop Pages - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=21997
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.4
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

// add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_show_sale_percentage_loop', 25 );

function bbloomer_show_sale_percentage_loop() {
    global $product;
    $max_percentage = 0;
    if ( ! $product->is_on_sale() ) return;
    if ( $product->is_type( 'simple' ) ) {
        $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
    } elseif ( $product->is_type( 'variable' ) ) {
//        $max_percentage = 0;
        foreach ( $product->get_children() as $child_id ) {
            $variation = wc_get_product( $child_id );
            $price = $variation->get_regular_price();
            $sale = $variation->get_sale_price();
            if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
            if ( $percentage > $max_percentage ) {
                $max_percentage = $percentage;
            }
        }
    }
    // if ( $max_percentage > 0 ) echo "<div class='sale-perc'>-" . round($max_percentage) . "%</div>";
    if ( $max_percentage > 0 ) return round($max_percentage);
}





// Add plus and minus buttons to WooCommerce quantity inputs
add_action( 'wp_footer', 'jh_add_script_to_footer');
function jh_add_script_to_footer(){
    if( ! is_admin() ) { ?>
        <script>

            jQuery(document).ready(function($){
                $(document).on('click', '.plus', function(e) { // replace '.quantity' with document (without single quote)
                    $input = $(this).prev('input.qty');
                    var val = parseInt($input.val());
                    var step = $input.attr('step');
                    step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
                    $input.val( val + step ).change();
                    $('.custom-made-modal.active .add_to_cart_button').attr('data-quantity', $input.val());
                });
                $(document).on('click', '.minus',  // replace '.quantity' with document (without single quote)
                    function(e) {
                        $input = $(this).next('input.qty');
                        var val = parseInt($input.val());
                        var step = $input.attr('step');
                        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
                        if (val > 0) {
                            $input.val( val - step ).change();
                            $('.custom-made-modal.active .add_to_cart_button').attr('data-quantity', $input.val());
                        }
                    });
            });
        </script>
        <?php
    }
}






//Add Menu Cart in header

// Add Font Awesome to site.
add_action( 'wp_enqueue_scripts', 'dcwd_include_font_awesome_css' );
function dcwd_include_font_awesome_css() {
    // Enqueue Font Awesome from a CDN.
    wp_enqueue_style( 'font-awesome-cdn', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}
// Style the cart count number.
add_action( 'wp_head', 'dcwd_cart_count_styles' );
function dcwd_cart_count_styles() {
    ?>

    <?php
}
// Append cart item (and cart count) to end of main menu.

function add_mini_cart_to_header(){
    do_action('add_mini_cart_to_header');
}

add_action( 'add_mini_cart_to_header', 'menu_add_to_cart', 10, 2 );

function menu_add_to_cart( ) {
    $cart_item_count = WC()->cart->get_cart_contents_count();
    $cart_count_span = '';
    if ( $cart_item_count ) {
        $cart_count_span = '<span class="count">'.$cart_item_count.'</span>';
    }

//    $cart_link .= '<a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a>';
    $cart_link = '<a href="#"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a>';


    echo $cart_link;
}

//

//add_filter( 'wp_nav_menu_main-menu', 'am_append_cart_icon', 10, 2 );
function am_append_cart_icon( $items, $args ) {
    $cart_item_count = WC()->cart->get_cart_contents_count();
    $cart_count_span = '';
    if ( $cart_item_count ) {
        $cart_count_span = '<span class="count">'.$cart_item_count.'</span>';
    }
//    $cart_link = '<li class="cart menu-item menu-item-type-post_type menu-item-object-page">';
////    $cart_link .= '<a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a>';
//    $cart_link .= '<a href="#"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a>';
//    $cart_link .= '</li>';

    $cart_link = '<div id="top-cart"><a href="#"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a></div>';
    // Add the cart link to the end of the menu.
    $items = $items . $cart_link;
    return $items;
}



// Prevent Refresh from Adding Another Product in WooCommerce. Solution by Zack Katz - website: https://katz.co/

add_action('woocommerce_add_to_cart_redirect', 'resolve_dupes_add_to_cart_redirect');

function resolve_dupes_add_to_cart_redirect($url = false) {

    // If another plugin beats us to the punch, let them have their way with the URL
    if(!empty($url)) { return $url; }

    // Redirect back to the original page, without the 'add-to-cart' parameter.
    // We add the `get_bloginfo` part so it saves a redirect on https:// sites.
    return get_bloginfo('wpurl').add_query_arg(array(), remove_query_arg('add-to-cart'));

}

/**
 * [get_featured_products  - prints the featured products loop]
 * @return [type] [featured product in owl slider]
 */
function get_featured_products(){
    $meta_query  = WC()->query->get_meta_query();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );

    $query_args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'meta_query'          => $meta_query,
        'tax_query'           => $tax_query,
    );

    $featured_query = new WP_Query($query_args);
    $feature_products = '<div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xxs="1" data-items-xs="2" data-items-sm="3" data-items-md="4" data-loop="true" data-autoplay="3000" data-speed="700">';
    while ( $featured_query->have_posts() ) : $featured_query->the_post();
        $feature_products .= '<div class="oc-item">';
		$feature_products .= '<div class="product iproduct clearfix">';
		$feature_products .= '<div class="product-image">';
		$feature_products .= '<a href="'. get_permalink() .'"><img src="'.woocommerce_get_product_thumbnail().'</a>';
		$feature_products .= '</div>';
		$feature_products .= '<div class="product-desc center">';
		$feature_products .= '<div class="product-title"><h3><a href="'. get_permalink() .'">'.get_the_title().'</a></h3></div>';
		$feature_products .= '</div>';
		$feature_products .= '</div>';
		$feature_products .= '</div>';
    endwhile;
    $feature_products .= '</div>';
    echo $feature_products;

    wp_reset_query();

};
add_action( 'wpsites_display_featured_products', 'get_featured_products');

/**
 * Add a custom hook to home page to
 * display featured products
 */
function wpsites_display_featured_products() {
    do_action('wpsites_display_featured_products');
}

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

/**
 * Please note that it does not work for all themes because of the way they’re coded.
 * Change number of related products output
 */
function woo_related_products_limit() {
    global $product;

    $args['posts_per_page'] = 6;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 6; // 6 related products
    $args['columns'] = 2; // arranged in 2 columns
    return $args;
}


/**
 * You can use the woocommerce_checkout_get_value filter to clear the fields, but this will clear them each time the page is loaded.
 */
//add_filter('woocommerce_checkout_get_value','__return_empty_string',10);

