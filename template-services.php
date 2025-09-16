<?php
/**
 * Template Name: Services Page
 *
 * This is the template that displays the "Services" page.
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

                    <!-- Service 1 -->
                    <h3><?php echo esc_html( get_theme_mod( 'fitpro_service1_title', '1-on-1 Personal Training' ) ); ?></h3>
                    <p><?php echo wp_kses_post( get_theme_mod( 'fitpro_service1_desc', 'Our flagship program is designed for maximum results...' ) ); ?></p>
                    <?php
                        $features1 = get_theme_mod( 'fitpro_service1_features', "Fully customized weekly workout schedule\nIn-person or live video sessions\nContinuous progress tracking and adjustments" );
                        if ( ! empty( $features1 ) ) {
                            $features_array = explode( "\n", $features1 );
                            echo '<ul>';
                            foreach ( $features_array as $feature ) {
                                echo '<li>' . esc_html( trim( $feature ) ) . '</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                    <p><strong><?php esc_html_e( 'Pricing:', 'fitpro' ); ?></strong> <?php echo esc_html( get_theme_mod( 'fitpro_service1_price', 'Starting at $300/month' ) ); ?></p>
                    <a href="#contact" class="cta-button"><?php esc_html_e( 'Book a Free Consultation', 'fitpro' ); ?></a>

                    <hr>

                    <!-- Service 2 -->
                    <h3><?php echo esc_html( get_theme_mod( 'fitpro_service2_title', 'Custom Nutrition Planning' ) ); ?></h3>
                    <p><?php echo wp_kses_post( get_theme_mod( 'fitpro_service2_desc', 'Proper nutrition is the cornerstone...' ) ); ?></p>
                    <?php
                        $features2 = get_theme_mod( 'fitpro_service2_features', "Comprehensive metabolic and lifestyle assessment\nCustomized meal plans and recipes\nWeekly check-ins and plan adjustments" );
                        if ( ! empty( $features2 ) ) {
                            $features_array = explode( "\n", $features2 );
                            echo '<ul>';
                            foreach ( $features_array as $feature ) {
                                echo '<li>' . esc_html( trim( $feature ) ) . '</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                    <p><strong><?php esc_html_e( 'Pricing:', 'fitpro' ); ?></strong> <?php echo esc_html( get_theme_mod( 'fitpro_service2_price', 'Starting at $150/month' ) ); ?></p>
                    <a href="#contact" class="cta-button"><?php esc_html_e( 'Discuss Your Nutrition Goals', 'fitpro' ); ?></a>

                    <hr>

                    <!-- Service 3 -->
                    <h3><?php echo esc_html( get_theme_mod( 'fitpro_service3_title', 'Online Fitness Coaching' ) ); ?></h3>
                    <p><?php echo wp_kses_post( get_theme_mod( 'fitpro_service3_desc', 'Get the expertise of a world-class coach...' ) ); ?></p>
                    <?php
                        $features3 = get_theme_mod( 'fitpro_service3_features', "Personalized training program delivered via our app\nVideo demonstrations for all exercises\nWeekly email check-ins and feedback" );
                        if ( ! empty( $features3 ) ) {
                            $features_array = explode( "\n", $features3 );
                            echo '<ul>';
                            foreach ( $features_array as $feature ) {
                                echo '<li>' . esc_html( trim( $feature ) ) . '</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                    <p><strong><?php esc_html_e( 'Pricing:', 'fitpro' ); ?></strong> <?php echo esc_html( get_theme_mod( 'fitpro_service3_price', 'Starting at $100/month' ) ); ?></p>
                    <a href="#contact" class="cta-button"><?php esc_html_e( 'Start Your Online Training', 'fitpro' ); ?></a>

                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
        </div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
