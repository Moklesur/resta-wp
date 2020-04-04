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

    <div class="blog-thumb mb-30 align-content-end h-100<?php echo esc_attr( $noThumbs ); ?>" <?php if( has_post_thumbnail() ){ ?>style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>')"<?php } ?>>
        <header class="content">

            <?php

            if ( 'post' === get_post_type() ) :

                resta_posted_on();

            endif;

            if ( is_singular() ) :
                the_title( '<h1 class="font-weight-bold mb-40 blog-title">', '</h1>' );
            else :
                the_title( '<h4 class="font-weight-bold mb-40 blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; ?>



            <div class="d-flex justify-content-between">
                <?php

                if ( 'post' === get_post_type() ) :
                    ?>
                    <ul class="author-nfo">
                        <li>
                            <?php
                            resta_posted_by();
                            ?>
                        </li>
                    </ul>
                <?php
                endif;?>

<!--                <ul class="comment-nfo list-inline">-->
<!--                    <li class="list-inline-item"><a href=""><i class="icofont-user mr-2 text-orange"></i>68</a></li>-->
<!--                    <li class="list-inline-item"><a href=""><i class="icofont-eye-alt mr-2 text-orange"></i>68</a></li>-->
<!--                </ul>-->
            </div>
        </header>

        <footer>
            <a href="<?php echo esc_url( get_the_permalink()); ?>" class="btn more-btn">
                <?php esc_html_e( 'Read more', 'resta' ); ?>
                <span><i class="icofont-arrow-right"></i></span>
            </a>
        </footer>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
