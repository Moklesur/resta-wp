<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Resta
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function resta_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// boxed or width layout
    if ( get_theme_mod( 'site_layout' ) == 'boxed' ) {
        $classes[] =  "boxed";
    }else{
        $classes[] = "wide";
    }

	return $classes;
}
add_filter( 'body_class', 'resta_body_classes' );

/**
 *  Social Links
 */
add_action( 'resta_social', 'resta_social_action' );
function resta_social_action() {

    $social_arg = array(

        array(
            'name' => 'facebook',
            'href' => get_theme_mod( 'facebook' ),
            'class' => 'fb'
        ),
        array(
            'name' => 'twitter',
            'href' => get_theme_mod( 'twitter' ),
            'class' => 'twitter'
        ),
        array(
            'name' => 'youtube',
            'href' => get_theme_mod( 'youtube' ),
            'class' => 'youtube'
        ),
        array(
            'name' => 'linkedin',
            'href' => get_theme_mod( 'linkedin' ),
            'class' => 'linkedin'
        ),
        array(
            'name' => 'pinterest',
            'href' => get_theme_mod( 'pinterest' ),
            'class' => 'pinterest'
        ),
        array(
            'name' => 'instagram',
            'href' =>  get_theme_mod( 'instagram' ),
            'class' => 'instagram'
        ),
        array(
            'name' => 'dribbble',
            'href' =>  get_theme_mod( 'dribbble' ),
            'class' => 'dribbble'
        ),
        array(
            'name' => 'google-plus',
            'href' => get_theme_mod( 'google_plus' ),
            'class' => 'g-plus'
        )

    );

    foreach ( $social_arg as $item ) {
        if( !empty( esc_url( $item['href'] ) ) ){
            ?>
            <li class="list-inline-item">
                <a class="<?php echo esc_attr( $item['class'] ); ?>" href="<?php echo esc_url( $item['href'] ); ?>"  target="_blank">
                    <i class="icofont-<?php echo esc_attr( $item['name'] ); ?>"></i>
                </a>
            </li>
            <?php
        }
    }
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function resta_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'resta_pingback_header' );
