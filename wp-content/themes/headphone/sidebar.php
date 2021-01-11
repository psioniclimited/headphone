<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Headphone
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>
    <!--<i class="fa fa-filter custom-shop-mobile-sidebar-reveal-icon" style="font-size: 48px;"></i>-->
<?php if( !is_cart() && !is_checkout() ) { ?>
    <aside id="secondary" class="widget-area">
        <?php
        dynamic_sidebar('sidebar-1');
        ?>

        <section id="woocommerce_custom_sort_by"
                 class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
            <h2 class="widget-title">SORT BY</h2>
            <ul class="woocommerce-widget-layered-nav-list">
                <?php
                $catalog_orderby = apply_filters('woocommerce_catalog_orderby', array(

                    'menu_order' => __('Sort by name', 'woocommerce'),

//                'popularity' => __( 'Sort by popularity', 'woocommerce' ),
//
//                'rating'     => __( 'Sort by average rating', 'woocommerce' ),

                    'date' => __('Sort by newness', 'woocommerce'),

                    'price' => __('Sort by price: low to high', 'woocommerce'),

                    'price-desc' => __('Sort by price: high to low', 'woocommerce')
                ));

                if (get_option('woocommerce_enable_review_rating') == 'no')
                    unset($catalog_orderby['rating']);

                foreach ($catalog_orderby as $id => $name)
                    echo '<li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a href="' . get_permalink(wc_get_page_id('shop')) . '?orderby=' . $id . '" >' . esc_attr($name) . '</a></li>';
                ?>

            </ul>
        </section>
    </aside><!-- #secondary -->
    <?php } ?>