<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Resta
 */

$class[] = 'col-lg-12 col-sm-12 col-12';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>

    <?php

    $noThumbs = '';
    if ( has_post_thumbnail() ) {
        $noThumbs = ' no-thumbs';
    }

    ?>

    <figure class="single-blog-post">

        <?php
        if ( ( has_post_thumbnail() ) && get_theme_mod('featured_image_single_enable', true ) ) :

        the_post_thumbnail();

        endif;
        ?>

        <figcaption class="content">
            <header>
                <?php
                if (is_singular()) :
                    the_title('<h1 class="font-weight-bold mb-30 blog-title">', '</h1>');
                else :
                    the_title('<h4 class="font-weight-bold mb-30 blog-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

                if( get_theme_mod('meta_single_enable', true ) ) :
                ?>
                    <nav class="d-flex justify-content-between">

                        <?php

                        if ( 'post' === get_post_type() ) :
                            ?>
                            <ul class="author-nfo list-unstyled m-0">
                                <li>
                                    <?php
                                    resta_posted_by();
                                    ?>
                                </li>
                            </ul>
                        <?php
                        endif;

                        if ( 'post' === get_post_type() ) :

                            resta_posted_on();

                        endif;
                        ?>
                    </nav>
                <?php endif; ?>
            </header>

            <div class="description">
                <?php
                the_content();
                ?>
            </div>
        </figcaption>
    </figure>
</article><!-- #post-<?php the_ID(); ?> -->
