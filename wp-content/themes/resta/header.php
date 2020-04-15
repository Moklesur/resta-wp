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
    <?php
    if ( get_theme_mod('enable_top_bar' ) == true ) :
        ?>
        <!--/.top-bar start-->
        <section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-lg-left text-md-left text-center">
                        <ul class="list-inline">
                            <?php
                            if ( ! empty( get_theme_mod('header_top_bar_content_1' ) ) ) :
                            ?>
                            <li class="list-inline-item"><i class="<?php echo esc_attr( get_theme_mod('header_top_bar_icon_1' ) ); ?> mr-2"></i><?php echo esc_html( get_theme_mod('header_top_bar_content_1' ) ); ?></li>
                            <?php
                            endif;

                            if ( ! empty( get_theme_mod('header_top_bar_content_2' ) ) ) :
                            ?>
                                <li class="list-inline-item"><i class="<?php echo esc_attr( get_theme_mod('header_top_bar_icon_2' ) ); ?> mr-2"></i><?php echo esc_html( get_theme_mod('header_top_bar_content_2' ) ); ?></li>
                            <?php
                            endif;
                            ?>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 text-lg-right text-md-right text-center">
                        <ul class="list-inline">

                            <?php
                            if ( ! empty( get_theme_mod('header_top_bar_content_3' ) ) ) :
                                ?>
                                <li class="list-inline-item"><i class="<?php echo esc_attr( get_theme_mod('header_top_bar_icon_3' ) ); ?> mr-2"></i><?php echo esc_html( get_theme_mod('header_top_bar_content_3' ) ); ?></li>
                            <?php
                            endif;

                            if ( ! empty( get_theme_mod('header_top_bar_content_4' ) ) ) :
                                ?>
                                <li class="list-inline-item"><i class="<?php echo esc_attr( get_theme_mod('header_top_bar_icon_4' ) ); ?> mr-2"></i><?php echo esc_html( get_theme_mod('header_top_bar_content_4' ) ); ?></li>
                            <?php
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--/.top-bar end-->
    <?php
    endif;
    ?>

    <!--/.header start -->
    <header class="site-header navbar-fixed" id="header">
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
