<?php

/**
 * resta Typography & Color Settings
 */

function resta_typography_color( $color ) {

    $color = '';

    /**
     * Primary Color
     */

    $primary_color = get_theme_mod( 'primary_color', '#f96a0e' );

    $color .= ".social-list li > a:hover,.widget-menu li > a:hover, .menu li > a:hover,.top-bar ul li:hover,.text-orange,.top-bar ul li i,.woocommerce ul.products li.product .button,.widget-area .search-form .search-submit,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,.woocommerce div.product form.cart .button,.woocommerce #review_form #respond .form-submit input,.woocommerce input.button , .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce #payment #place_order ,.wpcf7-submit{ color: " . esc_attr($primary_color) . "; } ";

    $color .= ".woocommerce span.onsale,.special-offer:before,.subscribe-form button,#scroll,.breadcrumb,.cart-icon>a>span,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce ul.products li.product .onsale,button,input[type=submit],.navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover,.navbar-default .navbar-toggle .icon-bar,.woocommerce nav.woocommerce-pagination ul li span.current,.footer-main,.camera_wrap .slider-button .btn,.search-cart .badge,.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover,.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover,.woocommerce ul.products li.product .button,.widget-area .search-form .search-submit,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,.woocommerce div.product form.cart .button,.woocommerce #review_form #respond .form-submit input,.woocommerce input.button , .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce #payment #place_order ,.wpcf7-submit,.btn{ background-color:" . esc_attr($primary_color) . "; } ";

    $color .= ".chef-item:hover,.social-list li > a:hover,#filters li .button:hover, #filters li .button.is-checked,.resta-main-menu > .menu-item > a:hover, .resta-main-menu > .menu-item > a:focus,button,input[type=submit],.navbar-default .navbar-toggle,.woocommerce nav.woocommerce-pagination ul li span.current,.wpcf7 .wpcf7-submit,.widget-area .search-form .search-field,.service-url,.camera_wrap .slider-button .btn,.search-cart .badge,.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover,.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover,.woocommerce ul.products li.product .button,.widget-area .search-form .search-submit,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,.woocommerce div.product form.cart .button,.woocommerce #review_form #respond .form-submit input,.woocommerce input.button , .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce #payment #place_order ,.btn{ border-color: " . esc_attr($primary_color) . "; } ";

    $color .= "button,input[type=submit],.camera_wrap .slider-button .btn,.search-cart .badge,.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover,.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover,.woocommerce ul.products li.product .button,.widget-area .search-form .search-submit,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,.woocommerce div.product form.cart .button,.woocommerce #review_form #respond .form-submit input,.woocommerce input.button , .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce #payment #place_order ,.wpcf7-submit,.btn{ color: #fff; } ";

    /**
     * Header Tob Bar
     */

    if ( get_theme_mod('enable_top_bar' ) == true ) :

        $top_bar_bg = get_theme_mod( 'top_bar_bg', 'transparent' );
        $top_bar_text_color = get_theme_mod( 'top_bar_text_color', '#fff' );
        $top_bar_icon_color = get_theme_mod( 'top_bar_icon_color', '#f96a0e' );
        $color .= ".top-bar { background-color:" . esc_attr( $top_bar_bg ) . ";} ";
        $color .= ".top-bar, .top-bar ul li { color:" . esc_attr( $top_bar_text_color ) . ";} ";
        $color .= ".top-bar ul li i {  color:" . esc_attr( $top_bar_icon_color ) . ";} ";

    endif;

    /**
     * Header Section
     */

    $header_bg_color = get_theme_mod( 'header_bg_color', '#000000' );
    $header_text_color = get_theme_mod( 'header_text_color', '#ffffff' );
    $header_border_color = get_theme_mod( 'header_border_color', '#ffffff' );
    $header_border_style = get_theme_mod( 'header_border_style', 'none' );
    $header_border_size = get_theme_mod( 'header_border_size', '1' );

    $color .= ".site-header { 
        background-color:" . esc_attr($header_bg_color) . "; 
        color:" . esc_attr($header_text_color) . "; 
    }";

    if ( ! empty( get_theme_mod( 'header_top_padding' ) ) ){
        $color .= ".site-header { padding-top:" . esc_attr( get_theme_mod( 'header_top_padding' ) ) . "px;  } ";
    }

    if ( ! empty( get_theme_mod( 'header_bottom_padding' ) ) ){
        $color .= ".site-header { padding-bottom:" . esc_attr( get_theme_mod( 'header_bottom_padding' ) ) . "px;  } ";
    }

    if ( get_theme_mod( 'header_border_size' ) ){

        $color .= ".site-header { 
            border-top:" . esc_attr( $header_border_size ) . "px " . esc_attr( $header_border_style ) .' '. esc_attr( $header_border_color ) .";  
            border-bottom:" . esc_attr( $header_border_size ) . "px " . esc_attr( $header_border_style ) .' '. esc_attr( $header_border_color ) .";  
        } ";
    }

    /**
     * Menu
     */

    $menu_font_weight = get_theme_mod( 'menu_font_weight', 400 );
    $menu_color = get_theme_mod( 'menu_color', '#fff' );
    $menu_font_size = get_theme_mod( 'menu_font_size', 14 );
    $menu_top_bottom_padding = get_theme_mod( 'menu_top_bottom_padding', 30 );
    $menu_left_right_padding = get_theme_mod( 'menu_left_right_padding', 15 );

    $color .= ".resta-main-menu .menu-item a{
        font-size: " . esc_attr($menu_font_size) . "px;
        color:" . esc_attr( $menu_color ) . ";
        font-weight:" . esc_attr( $menu_font_weight ) . ";
        padding-top:" . esc_attr( $menu_top_bottom_padding ) . "px;
        padding-bottom:" . esc_attr( $menu_top_bottom_padding ) . "px;
    } ";

    $color .= ".resta-main-menu .menu-item{
        padding-left:" . esc_attr( $menu_left_right_padding ) . "px;
        padding-right:" . esc_attr( $menu_left_right_padding ) . "px;
    } ";

    /**
     * Hero Banner
     */

    if ( get_theme_mod('enable_hero_area' ) == true ) :

    $header_banner_bg = get_theme_mod( 'header_banner_bg', '#f96a0e' );
    $hero_area_heading_pre_color = get_theme_mod( 'hero_area_heading_pre_color', '#f96a0e' );
    $hero_area_heading_color = get_theme_mod( 'hero_area_heading_color', '#fff' );
    $header_banner_text_color = get_theme_mod( 'header_banner_text_color', '#fff' );
    $header_banner_btn_bg_color = get_theme_mod( 'header_banner_btn_bg_color', '#f96a0e' );
    $header_banner_btn_txt_color = get_theme_mod( 'header_banner_btn_txt_color', '#fff' );

    $color .= ".hero-banner { background-color:" . esc_attr( $header_banner_bg ) . "; } ";
    $color .= ".hero-banner h5{ color:" . esc_attr( $hero_area_heading_pre_color ) . "; } ";
    $color .= ".hero-banner h1{ color:" . esc_attr( $hero_area_heading_color ) . "; } ";
    $color .= ".hero-banner { color:" . esc_attr( $header_banner_text_color ) . "; } ";

    $color .= ".hero-banner .btn { 
        color:" . esc_attr( $header_banner_btn_txt_color ) . "; 
        background-color:" . esc_attr( $header_banner_btn_bg_color ) . "; 
        border-color:" . esc_attr( $header_banner_btn_bg_color ) . "; 
    } ";

    endif;

    /**
    * Footer Section
    */

    $footer_border_color = get_theme_mod( 'footer_border_color', '#ffffff' );
    $footer_border_style = get_theme_mod( 'footer_border_style', 'none' );
    $footer_border_size = get_theme_mod( 'footer_border_size', '1' );

    $color .= ".footer-area { 
        background:" . esc_attr( get_theme_mod( 'footer_bg_color' ) ) . "; 
        border-top:" . esc_attr( $footer_border_size ) .'px ' . esc_attr( $footer_border_style ) .' '. esc_attr( $footer_border_color ) . "; 
     } ";

    $color .= ".footer-top { 
        padding-top:" . esc_attr( get_theme_mod( 'footer_top_padding', '190' ) ) . "px;
        padding-bottom:" . esc_attr( get_theme_mod( 'footer_bottom_padding', '130' ) ) . "px;
     } ";

    $color .= ".footer-area h4{  color: ". esc_attr( get_theme_mod( 'footer_heading_color', '#fff' ) ) .";} ";

    $color .= ".footer-area .widget-menu li > a,.footer-area .menu li > a,.footer-area a,.footer-area p,.footer-area,.footer-top{  color: ". esc_attr( get_theme_mod( 'footer_text_color', '#b6b6b6' ) ) .";} ";

    /**
     * Font Family
     */

    $body_font_family = get_theme_mod('body_font_family');
    if ( $body_font_family !='' ) {
        $color .= "body{ font-family:" . $body_font_family . ";}";
    }else{
        $color .= "body{ font-family: 'Source Sans Pro', sans-serif;}";
    }

    $heading_font_family = get_theme_mod('heading_font_family');
    if ( $heading_font_family !='' ) {
        $color .= "h1,h2,h3,h4,h5,h6,.h1, .h2, .h3, h1, h2, h3{ font-family:" . $heading_font_family . ";}";
    }else{
        $color .= "h1,h2,h3,h4,h5,h6,.h1, .h2, .h3, h1, h2, h3{ font-family: 'Nunito', sans-serif;}";
    }

    /**
     * Body
     */

    $body_text_color = get_theme_mod( 'bg_text_color', '#626262' );
    $body_font_size = get_theme_mod( 'body_font_size', '14' );
    $body_font_weight = get_theme_mod( 'body_font_weight', '300' );

    $color .= "body { 
        color:" . esc_attr($body_text_color) . "; 
        font-weight:" . esc_attr($body_font_weight) ."; 
        font-size: " . esc_attr($body_font_size) . "px;
    } ";

    /**
     * Heading/Title
     */

    $color .= "h1, h2, h3, h4, h5, h6,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6{ 
        color:" . esc_attr( get_theme_mod( 'heading_title_color', '#222222' ) ) . "; 
        font-weight:" . esc_attr( get_theme_mod( 'heading_font_weight', '700' ) ) .";
    } ";

    /**
     * Heading/Title
     * Font Size
     */

    if ( get_theme_mod( 'heading_font_h1', 36 ) ){
        $color .= "h1,.h1{ font-size:" . absint( get_theme_mod( 'heading_font_h1', 36 ) ) . "px} ";
    }
    if ( get_theme_mod( 'heading_font_h2', 30 ) ){
        $color .= "h2,.h2{ font-size:" . absint( get_theme_mod( 'heading_font_h2', 30 ) ) . "px} ";
    }
    if ( get_theme_mod( 'heading_font_h3', 24 ) ){
        $color .= "h3,.h3{ font-size:" . absint( get_theme_mod( 'heading_font_h3', 24 ) ) . "px} ";
    }
    if ( get_theme_mod( 'heading_font_h4', 18) ){
        $color .= "h4,.h4{ font-size:" . absint( get_theme_mod( 'heading_font_h4', 18 ) ) . "px} ";
    }
    if ( get_theme_mod( 'heading_font_h5', 16) ){
        $color .= "h5,.h5{ font-size:" . absint( get_theme_mod( 'heading_font_h5', 16 ) ) . "px} ";
    }
    if ( get_theme_mod( 'heading_font_h6', 14) ){
        $color .= "h6,.h6{ font-size:" . absint( get_theme_mod( 'heading_font_h6', 14 ) ) . "px} ";
    }

    /**
     * Link Color
     */

    $color .= "a { 
        color:" . esc_attr( get_theme_mod( 'link_color', '#f96a0e' ) ) . "
    } ";

    $color .= "a:hover,a:focus,.site-info a:hover,.woocommerce ul.products li.product .price,.woo-widget a,.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover { 
        color:" . esc_attr( get_theme_mod( 'link_hover_color', '#000' ) ) . "
    } ";

    /**
     * Button
     */
    $color .= ".woocommerce-page #payment #place_order,#add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,.woocommerce div.product form.cart .button,.resta-qty button,#scroll,.add-to-cart-btn, .woocommerce ul.products li.product .resta-loop-price-cart a.button,.btn, .rtl-btn, .wp-block-button__link, input[type='submit'], .wpcf7-form-control.wpcf7-submit, .button, button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] { 
        background-color:" . esc_attr( get_theme_mod( 'button_bg_color', '#f96a0e' ) ) . ";
        color:" . esc_attr( get_theme_mod( 'button_text_color', '#fff' ) ) . ";
        border-color:" . esc_attr( get_theme_mod( 'button_border_color', '#f96a0e' ) ) . ";
    } ";

    /**
     * Button Hover
     */
    $color .= ".woocommerce-page #payment #place_order:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce div.product form.cart .button:hover,.resta-qty button:hover,#scroll:hover,.add-to-cart-btn:hover, .woocommerce ul.products li.product .resta-loop-price-cart a.button:hover,.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .button:hover, button:hover, .btn:hover, .rtl-btn:hover, .wp-block-button__link:hover, input[type='submit']:hover, .wpcf7-form-control.wpcf7-submit:hover, .btn:focus, .rtl-btn:focus, .wp-block-button__link:focus, input[type='submit']:focus, .wpcf7-form-control.wpcf7-submit:focus { 
        background-color:" . esc_attr( get_theme_mod( 'button_hover_bg_color', '#222222' ) ) . ";
        color:" . esc_attr( get_theme_mod( 'button_hover_text_color', '#fff' ) ) . ";
        border-color:" . esc_attr( get_theme_mod( 'button_hover_border_color', '#222222' ) ) . ";
    } ";


    /**
     * Border Color
     */
    $color .= ".select2-hidden-accessible,.woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text,.woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea,.form-control, textarea, input[type=text], input[type=email], input[type=url], input[type=tel], input[type=password], input[type=number], select { 
        border-color:" . esc_attr( get_theme_mod( 'border_color', '#eceff8' ) ) . "
    } ";

    /**
     * Page Title
     */

    $page_title_background_color = get_theme_mod( 'page_title_background_color', '#f96a0e' );
    $page_title_text_color = get_theme_mod( 'page_title_text_color', '#ffffff' );
    $page_title_background_image = get_theme_mod( 'page_title_background_image' );
    $page_title_font_size = get_theme_mod( 'page_title_font_size', '48' );
    $page_title_padding = get_theme_mod( 'page_title_padding', '85' );

    if ( $page_title_background_image != '' ){
        $page_title_background_image = "background-image: url( $page_title_background_image )";
    }

    $color .= ".breadcrumb{ background-color:" . esc_attr( $page_title_background_color ) . "; padding:" . esc_attr( $page_title_padding ) ."px 15px; $page_title_background_image } .breadcrumb h1{ font-size:" . esc_attr( $page_title_font_size ) ."px; color:" . esc_attr( $page_title_text_color ) ."; } ";

    /**
     * Typography & Color Inline
     */
    wp_add_inline_style( 'resta-style', $color );
}
add_action( 'wp_enqueue_scripts', 'resta_typography_color' );