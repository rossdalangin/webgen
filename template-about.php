<?php
/**
 * Template Name: About Page
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
                    // Display the main content for the About page, editable in the WordPress editor.
                    if ( have_posts() ) :
                        while ( have_posts() ) :
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->

            <div class="team-members-section">
                <h2 class="section-title"><?php esc_html_e( 'Meet the Team', 'fitpro' ); ?></h2>
                <div class="team-members-grid">
                    <?php
                    $team_query = new WP_Query( array(
                        'post_type' => 'fitpro_team',
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ) );

                    if ( $team_query->have_posts() ) :
                        while ( $team_query->have_posts() ) : $team_query->the_post();
                            ?>
                            <div class="team-member">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="team-member-photo">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="team-member-info">
                                    <h3 class="team-member-name"><?php the_title(); ?></h3>
                                    <div class="team-member-bio"><?php the_content(); ?></div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p><?php esc_html_e( 'Our team members will be listed here soon.', 'fitpro' ); ?></p>
                        <?php
                    endif;
                    ?>
                </div><!-- .team-members-grid -->
            </div><!-- .team-members-section -->

        </div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
