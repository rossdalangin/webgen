<?php
/**
 * Template Name: Services Page
 *
 * @package FitPro
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    // Display the main content for the Services page, editable in the WordPress editor.
                    if ( have_posts() ) :
                        while ( have_posts() ) :
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->

            <div class="services-page-section">
                <div class="services-page-grid">
                    <?php
                    $service_query = new WP_Query( array(
                        'post_type' => 'fitpro_service',
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ) );

                    if ( $service_query->have_posts() ) :
                        while ( $service_query->have_posts() ) : $service_query->the_post();
                            ?>
                            <div class="service-offering">
                                <h3 class="service-title"><?php the_title(); ?></h3>
                                <div class="service-content"><?php the_content(); ?></div>
                                <a href="#contact" class="cta-button"><?php esc_html_e( 'Learn More', 'fitpro' ); ?></a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p><?php esc_html_e( 'Our services will be listed here soon.', 'fitpro' ); ?></p>
                        <?php
                    endif;
                    ?>
                </div><!-- .services-page-grid -->
            </div><!-- .services-page-section -->

        </div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
