<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Resta
 */

get_header();
?>

    <main id="main" class="site-main">

        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>

                    <header class="page-header col-12 mb-30">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_type() );

                    endwhile;

                    ?>
                    <div class="col-12 text-center resta-pagination pagination-fix">
                    <?php
                    the_posts_pagination( array(
                        'mid_size' => 2,
                        'prev_text' => __( 'Prev', 'bring-back' ),
                        'next_text' => __( 'Next', 'bring-back' ),
                    ) );
                    ?></div><?php

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>
        </div>

    </main><!-- #main -->

<?php

get_footer();
