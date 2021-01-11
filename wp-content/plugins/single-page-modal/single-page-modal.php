
<?php
/**
 * Plugin Name: Single Page Modal
 * Plugin URI: khaledhasan
 * Description: This is a plugin that allows us to test Ajax functionality in WordPress
 * Version: 1.0.0
 * Author: Khaled Hasan
 * Author URI: khaledhasan
 * License: GPL2
 */



add_action( 'wp_enqueue_scripts', 'ajax_test_enqueue_scripts' );
function ajax_test_enqueue_scripts() {
    wp_enqueue_script( 'test', plugins_url( '/test.js', __FILE__ ), array('jquery'), '1.0', true );
    wp_enqueue_style( 'test', plugins_url( '/test.css', __FILE__ ) );

    wp_localize_script( 'test', 'singlepagemodal', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}

add_action( 'wp_ajax_nopriv_retrieve_specific_id', 'retrieve_specific_id' );
add_action( 'wp_ajax_retrieve_specific_id', 'retrieve_specific_id' );
//add_action( 'retrieve_specific_id', 'woocommerce_template_loop_add_to_cart', 10 );

function retrieve_specific_id() {

    $prod_id                = $_POST['prod_id'];
    $product                = wc_get_product( $prod_id );
    $prod_price             = $product->get_price();
    $regular_price          = $product->get_regular_price();
    $sale_price             = $product->get_sale_price();
    $prod_name              = $product->get_name();
    $prod_sku               = $product->get_sku();
    $prod_terms             = get_the_terms($prod_id, 'product_type');
    $prod_type              = (!empty($prod_terms)) ? sanitize_title(current($prod_terms)->name) : 'simple';
    $prod_desc              = $product->get_description();
    $prod_short_desc        = apply_filters( 'the_excerpt', $product->post->post_excerpt );
    $rating_count           = $product->get_rating_count();
    $average_rating         = $product->get_average_rating();

    $prod_add_cart_url       = get_home_url() . '/cart/?add-to-cart=' . $prod_id ;


    $cat_list = wp_get_post_terms($prod_id, 'product_cat', array('fields' => 'ids'));
    $prod_category_array = array();

    if(! empty( $cat_list ) && ! is_wp_error( $cat_list )){
        foreach( $cat_list as $cat )
        {
            $prod_category_array[] = get_product_category_by_id( $cat );

        }
        $prod_category_name = implode(', ', $prod_category_array);
    }

    $prod_tags = get_the_terms( $prod_id, 'product_tag' );
    $prod_tag_array = array();

    if ( ! empty( $prod_tags ) && ! is_wp_error( $prod_tags ) ){

        foreach ( $prod_tags as $prod_tag ) {
            $prod_tag_array[] = $prod_tag->slug;
        }

        $prod_tag_name = implode(', ', $prod_tag_array);
    }

    //Get specific product id and based on the Id get the gallery images
    $test_prod              = new WC_product($prod_id);
    $attachment_ids         = $test_prod->get_gallery_image_ids();
    array_unshift($attachment_ids, get_post_thumbnail_id($prod_id));


    $modal_content ='<div class="single-product shop-quick-view-ajax clearfix">';

    $modal_content .='<div class="ajax-modal-title">';
    $modal_content .='<h2>' . $prod_name . '</h2>';
    $modal_content .='</div>';
    $modal_content .='<div class="product modal-padding clearfix">';
    $modal_content .='<div class="col_half nobottommargin">';
    $modal_content .='<div class="product-image">';
    $modal_content .='<div class="w3-content w3-display-container">';

    foreach( $attachment_ids as $attachment_id )
    {

        // Display Image instead of URL-->
        // echo wp_get_attachment_image($attachment_id, 'full');

        // Display the image URL
        $Original_image_url = wp_get_attachment_url( $attachment_id );
        ?>

        <?php  $modal_content .='<img class="mySlides" src="' . $Original_image_url . '" style="width:100%">'; ?>

        <?php

    }

    $modal_content .='<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>';
    $modal_content .='<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>';
    $modal_content .='</div>';

    $modal_content .='<div class="sale-flash">Sale!</div>';
    $modal_content .='</div>';
    $modal_content .='</div>';

    $modal_content .='<div class="col_half nobottommargin col_last product-desc">';
    if ( $regular_price != '' &&  $sale_price !== '') {
        $modal_content .='<div class="product-price"><del><span class="woocommerce-Price-currencySymbol">৳</span>' . $regular_price . '</del> <ins><span class="woocommerce-Price-currencySymbol">৳</span>' . $sale_price . '</ins></div>';
    } else {
        $modal_content .='<div class="product-price"><span class="woocommerce-Price-currencySymbol">৳</span>' . $prod_price . '</div>';
    }

    $modal_content .='<div class="product-rating">';
    $modal_content .= '' . wc_get_rating_html( $average_rating, $rating_count );
    $modal_content .='</div>';

    $modal_content .='<div class="clear"></div>';
    $modal_content .='<div class="line"></div>';

    $modal_content .='<div class="cart nobottommargin clearfix">';
    $modal_content .='<div class="quantity clearfix">';
    $modal_content .='<input type="button" value="-" class="minus quick-view-modal-btn-minus">';
    $modal_content .='<input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />';
    $modal_content .='<input type="button" value="+" class="plus quick-view-modal-btn-plus">';
    $modal_content .='</div>';

    $modal_content .='<div class="quick-view-add-to-cart-btn-div">';
    $modal_content .= do_shortcode('[add_to_cart id='. '"' . $prod_id . '"' . ']');
    $modal_content .='</div>';

    $modal_content .='</div>';

    $modal_content .='<div class="clear"></div>';
    $modal_content .='<div class="line"></div>';

    $modal_content .='<p>' . $prod_short_desc  . '</p>';

    $modal_content .='<div class="card product-meta nobottommargin">';
    $modal_content .='<div class="card-body">';
    $modal_content .='<span itemprop="productID" class="sku_wrapper quick-view-prod-meta-val">SKU: <span class="sku quick-view-sku">' . $prod_sku . '</span></span> <br>';
    $modal_content .='<span class="posted_in quick-view-prod-meta-val">CATEGORY: <span class="sku quick-view-sku">' . $prod_category_name . '</span></span> <br>';
    $modal_content .='<span class="tagged_as quick-view-prod-meta-val">TAGS: <span class="sku quick-view-sku">' . $prod_tag_name . '</span></span>';
    $modal_content .='</div>';
    $modal_content .='</div>';
    $modal_content .='</div>';
    $modal_content .='</div>';
    $modal_content .='</div>';

    echo $modal_content;
//    echo do_shortcode('[add_to_cart id='. '"' . $prod_id . '"' . ']');

    die();
}


function get_product_category_by_id( $category_id ) {
    $term = get_term_by( 'id', $category_id, 'product_cat', 'ARRAY_A' );
    return $term['name'];
}


?>
