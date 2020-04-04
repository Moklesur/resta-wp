<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Resta
 */

get_header();
?>

    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if ( have_posts() ) : ?>

                        <header class="page-header col-12 mb-30">
                            <h1 class="page-title">
                                <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Search Results for: %s', 'resta' ), '<span>' . get_search_query() . '</span>' );
                                ?>
                            </h1>
                        </header><!-- .page-header -->

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );

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
        </div>
    </main><!-- #main -->

<?php
get_footer();
