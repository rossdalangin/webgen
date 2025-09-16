<?php
/**
 * Template Name: About Page
 *
 * This is the template that displays the "About" page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

                    <h2><?php echo esc_html( get_theme_mod( 'fitpro_about_mission_headline', 'Our Mission: Your Peak Performance' ) ); ?></h2>
                    <p><?php echo wp_kses_post( get_theme_mod( 'fitpro_about_mission_text', 'We believe that fitness is not just about looking good—it\'s about feeling unstoppable...' ) ); ?></p>

                    <hr>

                    <h3><?php echo esc_html( get_theme_mod( 'fitpro_about_story_headline', 'The FitPro Story' ) ); ?></h3>
                    <p><?php echo wp_kses_post( get_theme_mod( 'fitpro_about_story_text', 'Founded by certified coach Alex Jordan...' ) ); ?></p>

                    <hr>

                    <h3><?php echo esc_html( get_theme_mod( 'fitpro_about_team_headline', 'Meet the Team' ) ); ?></h3>

                    <h4><?php echo esc_html( get_theme_mod( 'fitpro_about_team1_name', 'Alex Jordan - Founder & Head Coach' ) ); ?></h4>
                    <p><?php echo wp_kses_post( get_theme_mod( 'fitpro_about_team1_bio', 'With over 10 years of experience...' ) ); ?></p>

                    <h4><?php echo esc_html( get_theme_mod( 'fitpro_about_team2_name', 'Jenna Davis - Nutrition Specialist' ) ); ?></h4>
                    <p><?php echo wp_kses_post( get_theme_mod( 'fitpro_about_team2_bio', 'Jenna is a registered dietitian...' ) ); ?></p>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
        </div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
