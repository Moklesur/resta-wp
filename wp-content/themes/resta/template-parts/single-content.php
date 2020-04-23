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
    if (!has_post_thumbnail()) {
        $noThumbs = ' no-thumbs';
    }

    ?>

    <figure class="single-blog-post">
        <a href="<?php the_permalink(); ?>" class="blog-thumbnail mb-30 d-block">
            <?php the_post_thumbnail(); ?>
        </a>
        <figcaption class="content">
            <header>
                <?php
                if ('post' === get_post_type()) :

                    resta_posted_on();

                endif;

                if (is_singular()) :
                    the_title('<h1 class="font-weight-bold mb-30 blog-title">', '</h1>');
                else :
                    the_title('<h4 class="font-weight-bold mb-30 blog-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif; ?>
                <nav class="d-flex justify-content-between mb-30">
                    <?php

                    if ('post' === get_post_type()) :
                        ?>
                        <ul class="author-nfo list-unstyled m-0">
                            <li>
                                <?php
                                resta_posted_by();
                                ?>
                            </li>
                        </ul>
                    <?php
                    endif; ?>
                    <ul class="comment-nfo list-inline m-0">
                        <li class="list-inline-item"><a href=""><i
                                        class="icofont-user mr-2 text-orange"></i>68</a></li>
                        <li class="list-inline-item"><a href="<?php echo esc_url( get_the_permalink()); ?>"><i
                                        class="icofont-eye-alt mr-2 text-orange"></i><?php echo gt_get_post_view(); ?></a></li>
                    </ul>
                </nav>
            </header>

            <section class="description"><?php
                the_content();
                ?>
            </section>
        </figcaption>
    </figure>



</article><!-- #post-<?php the_ID(); ?> -->
