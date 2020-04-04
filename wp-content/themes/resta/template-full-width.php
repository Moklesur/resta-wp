<?php
/**
 * Template Name: Full Width
 *
 * @package Resta
 * @subpackage Resta
 */
get_header();
?>

    <main id="content" class="full-width-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->

<?php

get_footer();