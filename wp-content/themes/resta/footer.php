<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Resta
 */

// Footer Layout
$footer_columns = get_theme_mod( 'footer_columns', '4' );
?>

<footer class="footer-area" <?php if ( !empty( get_theme_mod('footer_background_image' ) ) ) : ?>style="background-image: url('<?php echo esc_url( get_theme_mod('footer_background_image' ) ); ?>')"<?php endif; ?>>

    <?php if ( !empty( get_theme_mod('footer_logo' ) ) ) : ?>
        <!-- /.footer start -->
        <figure class="footer-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( get_theme_mod('footer_logo' ) ); ?>">
            </a>
        </figure>
    <?php endif;

    if ( is_active_sidebar( 'footer-widget' ) or is_active_sidebar( 'footer-widget-2' ) or is_active_sidebar( 'footer-widget-3' ) or is_active_sidebar( 'footer-widget-4' ) ) : ?>
        <!-- .footer-top start -->
        <div class="footer-top">
            <div class="container footer-middle">
                <div class="row">
                    <?php get_template_part( 'footer-layout/layout' ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!--        /.footer-bottom start-->
    <div class="footer-bottom">
        <div class="row copy-right-text align-items-center">
            <div class="col-10 m-auto text-center font-weight-bold text-uppercase">
                <a href="<?php echo esc_url( __( 'https://www.themetim.com/', 'resta' ) ); ?>">
                    <?php echo esc_html( get_theme_mod('copyright', 'Resta By ThemeTim' ) ); ?>
                </a>
            </div>
        </div>
    </div>
    <!--        /.footer-bottom start-->
</footer>
<!-- /.footer end -->

<!-- Back to top button -->
<a href="javascript:void(0)" id="scroll"><span></span></a>
<!-- Back to top button -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>