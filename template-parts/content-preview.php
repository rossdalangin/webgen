<?php
/**
 * Template part for displaying post previews
 *
 * @package FitPro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-preview' ); ?>>
    <header class="entry-header">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                    <?php the_post_thumbnail( 'medium_large' ); ?>
                </a>
            </div>
        <?php endif; ?>
        <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <span class="cat-links">
            <?php
                $categories_list = get_the_category_list( esc_html__( ', ', 'fitpro' ) );
                if ( $categories_list ) {
                    printf( '<span class="screen-reader-text">%1$s</span>%2$s',
                        esc_html__( 'Posted in', 'fitpro' ),
                        $categories_list
                    );
                }
            ?>
        </span>
        <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'fitpro' ); ?> <span class="screen-reader-text"><?php the_title(); ?></span></a>
    </footer>
</article><!-- #post-<?php the_ID(); ?> -->
