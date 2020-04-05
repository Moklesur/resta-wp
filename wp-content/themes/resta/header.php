<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Resta
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'resta' ); ?></a>
<?php wp_body_open(); ?>
<div id="page" class="wrapper site">

    <!--/.top-bar start-->
    <section class="top-bar absolute-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-lg-left text-md-left text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href=""><i class="icofont-clock-time mr-2"></i>07 am - 12 am,
                                Mon - Sun </a></li>
                        <li class="list-inline-item"><a href=""><i class="icofont-location-pin mr-2"></i>20, Floor,
                                California USA</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-lg-right text-md-right text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="tel:+00 568 697 435"><i
                                        class="icofont-headphone mr-2"></i>+00 568 697 435 </a></li>
                        <li class="list-inline-item"><a href="mailto:support24@gmail.com"><i
                                        class="icofont-envelope mr-2"></i>support24@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/.top-bar end-->

    <!--/.header start -->
    <header class="site-header absolute-header navbar-fixed" id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="navbar-brand">
                    <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    endif;
                    $resta_description = get_bloginfo( 'description', 'display' );
                    if ( $resta_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $resta_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'        => 'resta-main-menu'
                    ) );
                    ?>
                    <div class="my-2 my-lg-0 ml-lg-auto d-flex align-items-center">
                        <a href="" class="mr-3 d-inline-block mini-cart"><i class="icofont-cart text-white"></i> <span class="count">2</span></a>
                        <a href="" class="btn d-none d-lg-inline-block my-2 my-sm-0 reservation-btn">Reservation<span><i class="icofont-arrow-right"></i></span></a>
                        <a href="#" class=" d-lg-none d-inline-block nav-mobile">
                            <i class="fa icofont-navigation-menu"></i>
                        </a>
                    </div>
            </nav>
        </div>
    </header>
    <!--/.header end -->
