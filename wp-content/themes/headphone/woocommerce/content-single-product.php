<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<!--Get Current Product ID and based on that extrat all product images and image urls-->
<?php
$single_prod_id = $product->get_id();
$test_prod              = new WC_product($single_prod_id);
$attachment_ids         = $test_prod->get_gallery_image_ids();
array_unshift($attachment_ids, get_post_thumbnail_id($single_prod_id));
?>

<!--Get Price, Ratings, reviews description, additional information, custom-fields of Current Product-->
<?php
$prod_price             = $product->get_price();
$regular_price          = $product->get_regular_price();
$sale_price             = $product->get_sale_price();

$rating_count           = $product->get_rating_count();
$average_rating         = $product->get_average_rating();

$prod_desc              = $product->get_description();

$additional_information         =   get_field('additional_information');

$review_count = $product->get_review_count();
$args = array ('post_type' => 'product', 'post_id' => $single_prod_id);
$comments = get_comments( $args );

global $post;

$url = get_permalink($post->ID);
$url = esc_url($url);
?>



<section id="page-title">

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

            <div class="single-product">

                <div class="product">

                    <div class="col_two_fifth">

                        <!-- Product Single - Gallery
                        ============================================= -->
                        <div class="product-image">
                            <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                <div class="flexslider">
                                    <div class="slider-wrap" data-lightbox="gallery">
                                        <?php
                                        foreach( $attachment_ids as $attachment_id )
                                        {
                                            // Display the image URL
                                            $Original_image_url = wp_get_attachment_url( $attachment_id );

                                            echo '<div class="slide" data-thumb="' . $Original_image_url . '"><a href="' . $Original_image_url . '" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="' . $Original_image_url . '" alt="Pink Printed Dress"></a></div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($sale_price !== ''){
                                echo woocommerce_show_product_sale_flash();
                            }
                            ?>
                        </div><!-- Product Single - Gallery End -->

                    </div>

                    <div class="col_two_fifth product-desc ">

                        <!-- Product Single - Price
                        ============================================= -->
                        <?php
                        if ( $regular_price != '' &&  $sale_price !== '') {
                            echo '<div class="product-price"><del><span class="woocommerce-Price-currencySymbol">৳</span>' . $regular_price . '</del> <ins><span class="woocommerce-Price-currencySymbol">৳</span>' . $sale_price . '</ins></div>';
                        } else {
                            echo '<div class="product-price"><span class="woocommerce-Price-currencySymbol">৳</span>' . $prod_price . '</div>';
                        }
                        ?>
                        <!-- Product Single - Price End -->

                        <!-- Product Single - Rating
                        ============================================= -->
                        <div class="product-rating">
                            <?php
                            echo wc_get_rating_html( $average_rating, $rating_count );
                            ?>
                        </div><!-- Product Single - Rating End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Quantity & Cart Button
                        ============================================= -->
                        <?php woocommerce_template_single_add_to_cart(); ?>

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Short Description
                        ============================================= -->
                        <div>
                            <?php woocommerce_template_single_excerpt(); ?>
                        </div>

                        <!-- Product Single - Meta
                        ============================================= -->
                        <div class="card product-meta">
                            <div class="card-body">
                                <?php woocommerce_template_single_meta(); ?>
                            </div>
                        </div><!-- Product Single - Meta End -->

                        <!-- Product Single - Share
                        ============================================= -->
                        <div class="si-share noborder clearfix">
                            <span>Share:</span>
                            <div>
                                <?php
                                $facebook = '';
                                $facebook .= '<a target="_blank" href="http://www.facebook.com/share.php?u="' . $url . '" class="social-icon si-borderless si-facebook">';
                                    $facebook .= '<i class="icon-facebook"></i>';
                                    $facebook .= '<i class="icon-facebook"></i>';
                                $facebook .= '</a>';
                                echo $facebook;
                                ?>
                                <a href="#" class="social-icon si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-pinterest">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-rss">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-email3">
                                    <i class="icon-email3"></i>
                                    <i class="icon-email3"></i>
                                </a>
                            </div>
                        </div><!-- Product Single - Share End -->

                    </div>

                    <div class="col_one_fifth col_last">

                        <?php  wc_get_template_part( 'content', 'single-product-left-sidebar' ); ?>

                    </div>

                    <div class="col_full nobottommargin">

                        <div class="tabs clearfix nobottommargin" id="tab-1">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="d-none d-md-inline-block"> Description</span></a></li>
                                <li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="d-none d-md-inline-block"> Additional Information</span></a></li>
                                <li><a href="#tabs-3"><i class="icon-star3"></i><span class="d-none d-md-inline-block"> Reviews (<?php echo $review_count; ?>)</span></a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1">
                                    <p style="text-align: justify;"><?php echo $prod_desc; ?></p>
                                </div>
                                <div class="tab-content clearfix" id="tabs-2">

                                    <?php echo $additional_information; ?>

                                </div>
                                <div class="tab-content clearfix" id="tabs-3">

                                    <div id="reviews" class="clearfix">

                                        <?php


                                        $reviews = '<ol class="commentlist clearfix">';

                                        foreach($comments as $comment) :

                                            $reviews .= '<li class="comment even thread-even depth-1" id="li-comment-1">';
                                            $reviews .= '<div id="comment-1" class="comment-wrap clearfix">';

                                            $reviews .= '<div class="comment-meta">';
                                            $reviews .= '<div class="comment-author vcard">';
                                            $reviews .= '<span class="comment-avatar clearfix">';
                                            $reviews .= '<img alt="" src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60" height="60" width="60" />';
                                            $reviews .= '</span>';
                                            $reviews .= '</div>';
                                            $reviews .= '</div>';

                                            $reviews .= '<div class="comment-content clearfix">';
                                            $reviews .= '<div class="comment-author">' . $comment->comment_author . '<span><a href="#" title="Permalink to this comment">' . date( 'M d, Y', strtotime( $comment->comment_date ) ) . '</a></span></div>';
                                            $reviews .= '<p class="single-page-comment-content-ptag">' . $comment->comment_content . '</p>';
                                            $reviews .= '<div class="review-comment-ratings">';

                                            $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

                                            if ( $rating && wc_review_ratings_enabled() ) {
                                                $reviews .= wc_get_rating_html( $rating ); // WPCS: XSS ok.
                                            }


                                            $reviews .= '</div>';
                                            $reviews .= '</div>';

                                            $reviews .= '<div class="clear"></div>';

                                            $reviews .= '</div>';
                                            $reviews .= '</li>';

                                        endforeach;

                                        $reviews .= '</ol>';
                                        echo $reviews;


                                        ?>
                                        <!-- Modal Reviews
                                        ============================================= -->
                                        <a href="#" data-toggle="modal" data-target="#reviewFormModal" class="button button-3d nomargin fright">Add a Review</a>

                                        <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <?php comments_template( 'woocommerce/single-product-reviews' ); ?>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!-- Modal Reviews End -->

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="clear"></div><div class="line"></div>

            <div class="col_full nobottommargin">

                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action( 'woocommerce_after_single_product_summary' );
                ?>

            </div>

        </div>

    </div>

</section>
