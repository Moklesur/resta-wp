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

?>


<!-- /.footer start -->
<footer class="footer-area" style="background-image: url('img/footer/footer-bg.png')">
    <figure class="footer-logo">
        <a href=""> <img src="img/logo/logo.png" alt=""></a>
    </figure>
    <!--        /.footer-top start-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-sm-6 widget-area">
                    <h4 class="font-weight-bold text-white mb-50">About Company</h4>
                    <p class="mb-45">Consectetur adipiscing elit eusm
                        tempor ullamco aliquip common
                        quis nostrud exercitation.</p>
                    <ul class="social-list list-inline">
                        <li class="list-inline-item"><a href=""><i class="icofont-facebook"></i></a></li>
                        <li class="list-inline-item"><a href=""><i class="icofont-twitter"></i></a></li>
                        <li class="list-inline-item"><a href=""><i class="icofont-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href=""><i class="icofont-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-7 col-sm-6 ml-auto widget-area">
                    <h4 class="font-weight-bold text-white mb-50">Quick Links</h4>
                    <ul class="widget-menu list-unstyled">
                        <li>
                            <a href="">About Us</a>
                        </li>
                        <li>
                            <a href="#about">Careers</a>
                        </li>
                        <li>
                            <a href="#"> Blog Post</a>
                        </li>
                        <li>
                            <a href="#service">service</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 ml-auto widget-area">
                    <h4 class="font-weight-bold text-white mb-50">From Gallery</h4>
                    <div class="gallery-list">
                        <a href="img/gallery/gallery1.png" class="g-item"><img src="img/product/pizza1.png"
                                                                               alt=""> <span
                                    class="overlay-icon"> <i class="icofont-plus"></i> </span> </a>
                        <a href="img/gallery/gallery5.png" class="g-item"><img src="img/product/pizza4.png"
                                                                               alt=""> <span
                                    class="overlay-icon"> <i class="icofont-plus"></i> </span> </a>
                        <a href="img/gallery/gallery1.png" class="g-item"><img src="img/product/pizza3.png"
                                                                               alt=""> <span
                                    class="overlay-icon"> <i class="icofont-plus"></i> </span> </a>
                        <a href="img/gallery/gallery4.png" class="g-item"><img src="img/product/pizza5.png"
                                                                               alt=""> <span
                                    class="overlay-icon"> <i class="icofont-plus"></i> </span> </a>
                        <a href="img/gallery/gallery3.png" class="g-item"><img src="img/product/pizza2.png"
                                                                               alt=""> <span
                                    class="overlay-icon"> <i class="icofont-plus"></i> </span> </a>
                        <a href="img/gallery/gallery2.png" class="g-item"><img src="img/product/pizza5.png"
                                                                               alt=""> <span
                                    class="overlay-icon"> <i class="icofont-plus"></i> </span> </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-sm-6 ml-auto widget-area">
                    <h4 class="font-weight-bold text-white mb-50">Subscribe Now</h4>
                    <form action="" class="form-inline mb-40 subscribe-form">
                        <input type="email" class="form-control" placeholder="support24@gmail.com" name="email">
                        <button type="submit"><i class="icofont-arrow-right"></i></button>
                    </form>
                    <div class="call-nfo">
                        <h6 class="text-orange">Give us a free call:</h6>
                        <p><a href="tel:(+1) 800 456324">(+1) 800 456324</a> or <a href="tel:(+1) 555 456325">(+1)
                                555 456325</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--        /.footer-top start-->
    <!--        /.footer-bottom start-->
    <div class="footer-bottom">
        <div class="row copy-right-text align-items-center">
            <div class="col-10 m-auto text-center font-weight-bold text-uppercase">
                <p>Copyright © 2020. All Right Reserved <a href="" class="text-orange">Restaurent</a></p>
            </div>
        </div>
    </div>
    <!--        /.footer-bottom start-->
</footer>
<!-- /.footer end -->

	<footer id="colophon" class="site-footer d-none">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'resta' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'resta' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'resta' ), 'resta', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<!-- Back to top button -->
<a href="javascript:void(0)" id="scroll" style="display: none;"><span></span></a>
<!-- Back to top button -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
