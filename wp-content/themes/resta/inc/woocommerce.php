<?php
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
/**
 * WC Support
 */
add_action( 'after_setup_theme', 'resta_wc_gallery_zoom' );
function resta_wc_gallery_zoom() {
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-zoom' );
}

// Remove - Breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
// Remove - Shop Page Title
add_filter( 'woocommerce_show_page_title', 'resta_hide_shop_page_title' );
function resta_hide_shop_page_title( $title ) {
    if ( is_shop() ) $title = false;
    return $title;
}

/**************************
 * Added container & Row
 * Shop & Product Page
 **************************/
// Product page hook
add_action( 'woocommerce_after_single_product_summary', 'resta_product_wrapper_end', 1 );
add_action( 'woocommerce_before_single_product_summary', 'resta_product_wrapper_start', 1 );
// Shop Page hook
add_action( 'woocommerce_before_main_content', 'resta_product_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'resta_product_wrapper_end', 10 );
// Start
function resta_product_wrapper_start() {
    echo '<div class="container"><div class="row"><div class="col-12">';
}
// End
function resta_product_wrapper_end() {
    echo '</div></div></div>';
}

/**
 * Disabling Sidebar Using a WordPress Hook (Recommended Method)
 */
add_action('init', 'disable_woo_commerce_sidebar');
function disable_woo_commerce_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}

/**************************
 * Product Loop
 **************************/

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 5 );

// Start & End Div ( Loop )
add_action( 'woocommerce_before_shop_loop_item', 'resta_loop_wrapper_start_div', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'resta_loop_wrapper_end_div', 40 );
// Start Div
function resta_loop_wrapper_start_div(){
    echo "<div class='resta-product-loop'>";
}
// End Div
function resta_loop_wrapper_end_div(){
    echo "</div>";
}

// Remove loop price
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
// Remove loop Title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
// Remove Loop Cart
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Start & End Div ( Title)
add_action( 'woocommerce_after_shop_loop_item', 'resta_loop_title_start_div', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'resta_loop_title_end_div', 15 );
// Loop Title
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_title', 10 );
// Loop Product description
add_action( 'woocommerce_after_shop_loop_item', 'resta_show_excerpt_shop_page', 10 );
function resta_show_excerpt_shop_page() {
    echo '<p>'.wp_trim_words( get_the_content(), 10, '...' ).'</p>';
}

// Start Div
function resta_loop_title_start_div(){
    echo "<div class='resta-loop-title-description'>";
}
// End Div
function resta_loop_title_end_div(){
    echo "</div>";
}

// Start & End Div ( Price & cart )
add_action( 'woocommerce_after_shop_loop_item', 'resta_loop_price_cart_start_div', 20 );
add_action( 'woocommerce_after_shop_loop_item', 'resta_loop_price_cart_end_div', 30 );

// Loop Price
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 25 );
// Loop Cart
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 25 );
// Start Div
function resta_loop_price_cart_start_div(){
    echo "<div class='resta-loop-price-cart'>";
}
// End Div
function resta_loop_price_cart_end_div(){
    echo "</div>";
}

/**************************
 * Shop & Archive Page
 **************************/
