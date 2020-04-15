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

/**
 * Shop & Product Page
 * Added container & Row
 */
// Product page hook
add_action( 'woocommerce_after_single_product_summary', 'resta_product_wrapper_end', 1 );
add_action( 'woocommerce_before_single_product_summary', 'resta_product_wrapper_start', 1 );
// Shop Page hook
add_action( 'woocommerce_before_main_content', 'resta_product_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'resta_product_wrapper_end', 10 );
// Start
function resta_product_wrapper_start() {
    echo '<div class="container"><div class="row">';
}
// End
function resta_product_wrapper_end() {
    echo '</div></div>';
}

/**
 * Disabling Sidebar Using a WordPress Hook (Recommended Method)
 */
add_action('init', 'disable_woo_commerce_sidebar');
function disable_woo_commerce_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}