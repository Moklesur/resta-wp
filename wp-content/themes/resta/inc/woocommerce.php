<?php
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
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
 * Product Page
 **************************/
/**
 *  Quantity Increase Decrease
 */

// Qty Plus
add_action( 'woocommerce_before_add_to_cart_quantity', 'resta_display_quantity_plus' );
function resta_display_quantity_plus() {
    ?>
    <div class="resta-qty-wrapper d-flex align-items-center mt-30 mb-30">
        <p class="mb-0 mr-4"><?php echo esc_html( 'Quantity' ); ?></p>
        <div class="resta-qty d-flex align-items-center">
            <button type="button" class="plus" ><i class="icofont-plus"></i></button>
            <?php
            }
            // Qty Minus
            add_action( 'woocommerce_after_add_to_cart_quantity', 'resta_display_quantity_minus' );
            function resta_display_quantity_minus() {
            ?>
            <button type="button" class="minus"><i class="icofont-minus"></i></button>
        </div>
    </div>
    <?php
}

// Trigger jQuery script
add_action( 'wp_footer', 'resta_add_cart_quantity_plus_minus' );
function resta_add_cart_quantity_plus_minus() {
    // Only run this on the single product page
    if ( ! is_product() ) return;
    ?>
    <script type="text/javascript">

        jQuery(document).ready(function($){

            $('.resta-qty-wrapper').on( 'click', 'button.plus, button.minus', function() {

                // Get current quantity values
                var qty = $( this ).closest( '.resta-qty-wrapper' ).find( '.qty' );
                var val   = parseFloat(qty.val());
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));

                // Change the value if plus or minus
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                        console.log('max');
                    } else {
                        console.log('else max');
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                        console.log('min');
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                        console.log('else min');
                    }
                }

            });

        });

    </script>
    <?php
}

/**************************
 * Shop & Archive Page
 **************************/