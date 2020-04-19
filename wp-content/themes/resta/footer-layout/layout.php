<?php

$footerCol = get_theme_mod( 'footer_widget_column', 'four' );

if ( esc_attr( $footerCol ) == 'four' ) { ?>
    <div class="col-lg-3 col-sm-6 col-12 widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget' ) ) :
            dynamic_sidebar( 'footer-widget' );
        endif;
        ?>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 ml-auto widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget-2' ) ) :
            dynamic_sidebar( 'footer-widget-2' );
        endif;
        ?>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 ml-auto widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget-3' ) ) :
            dynamic_sidebar( 'footer-widget-3' );
        endif;
        ?>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 ml-auto widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget-4' ) ) :
            dynamic_sidebar( 'footer-widget-4' );
        endif;
        ?>
    </div>
    <?php
} elseif ( esc_attr( $footerCol ) == 'three' ) { ?>
    <div class="col-lg-4 col-sm-6 col-12 widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget' ) ) :
            dynamic_sidebar( 'footer-widget' );
        endif;
        ?>
    </div>
    <div class="col-lg-4 col-sm-6 col-12 ml-auto widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget-2' ) ) :
            dynamic_sidebar( 'footer-widget-2' );
        endif;
        ?>
    </div>
    <div class="col-lg-4 col-sm-6 col-12 ml-auto widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget-3' ) ) :
            dynamic_sidebar( 'footer-widget-3' );
        endif;
        ?>
    </div>
<?php } else { ?>
    <div class="col-lg-6 col-sm-6 col-12 widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget' ) ) :
            dynamic_sidebar( 'footer-widget' );
        endif;
        ?>
    </div>
    <div class="col-lg-6 col-sm-6 col-12 ml-auto widget-area">
        <?php
        if ( is_active_sidebar( 'footer-widget-2' ) ) :
            dynamic_sidebar( 'footer-widget-2' );
        endif;
        ?>
    </div>
<?php }