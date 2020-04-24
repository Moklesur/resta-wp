<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Resta
 */

$class[] = 'col-lg-4 col-sm-6 col-12 blog-item';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <?php

    $noThumbs = '';
    if( ! has_post_thumbnail() ){
        $noThumbs = ' no-thumbs';
    }

    ?>
        <figure class="blog-style-one">
            <?php
            if (!empty(has_post_thumbnail())):
            ?>
            <a href="<?php the_permalink(); ?>" class="blog-thumbnail">
                <?php
                the_post_thumbnail();
                ?>
            </a>
            <?php
          endif;
            ?>
            <figcaption class="content">
                <header class="mb-20">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="font-weight-bold mb-30 blog-title">', '</h1>' );
                    else :
                        the_title( '<h4 class="font-weight-bold mb-30 blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif; ?>


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
                </header>

                <div class="description"><?php the_excerpt(); ?></div>

                <footer>
                    <a href="<?php echo esc_url( get_the_permalink()); ?>" class="btn learn-more">
                        <?php esc_html_e( 'Read more', 'resta' ); ?>
                        <span><i class="icofont-arrow-right"></i></span>
                    </a>
                </footer>
            </figcaption>
        </figure>
</article><!-- #post-<?php the_ID(); ?> -->
