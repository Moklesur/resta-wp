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

<footer class="footer-area" style="background-image: url('img/footer/footer-bg.png')">
    <!-- /.footer start -->
    <figure class="footer-logo">
        <a href=""> <img src="img/logo/logo.png" alt=""></a>
    </figure>

    <?php if ( is_active_sidebar( 'footer-widget' ) or is_active_sidebar( 'footer-widget-2' ) or is_active_sidebar( 'footer-widget-3' ) or is_active_sidebar( 'footer-widget-4' ) ) : ?>
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
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'resta' ) ); ?>">
                    <?php esc_html_e( 'Copyright © 2020. All Right Reserved', 'resta' ); ?>
                </a>
            </div>
        </div>
    </div>
    <!--        /.footer-bottom start-->
</footer>
<!-- /.footer end -->

<!-- Back to top button -->
<a href="javascript:void(0)" id="scroll" style="display: none;"><span></span></a>
<!-- Back to top button -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
