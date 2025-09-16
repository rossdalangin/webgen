<?php
/**
 * The main template file
 *
 * @package FitPro
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container">
            <div class="blog-layout-wrapper">

                <div class="blog-content-area">
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            if ( is_home() && ! is_front_page() ) {
                                single_post_title();
                            } else {
                                _e( 'The Blog', 'fitpro' );
                            }
                            ?>
                        </h1>
                    </header>

                    <?php if ( have_posts() ) : ?>

                        <div class="blog-main-grid">
                            <?php
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'template-parts/content', 'preview' );
                            endwhile;
                            ?>
                        </div><!-- .blog-main-grid -->

                        <?php
                        the_posts_navigation();

                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif;
                    ?>
                </div><!-- .blog-content-area -->

                <?php get_sidebar(); ?>

            </div><!-- .blog-layout-wrapper -->
        </div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
