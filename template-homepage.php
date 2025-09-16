<?php
/**
 * Template Name: Homepage
 *
 * @package FitPro
 */

get_header();
?>

	<main id="primary" class="site-main">

        <?php
        // 1. Define all homepage sections with their data and order
        $sections = array(
            'hero' => array(
                'order' => get_theme_mod('fitpro_hero_order', 10),
                'enabled' => true, // You could add a checkbox in customizer to disable sections
            ),
            'services' => array(
                'order' => get_theme_mod('fitpro_services_preview_order', 20),
                'enabled' => true,
            ),
            'testimonials' => array(
                'order' => get_theme_mod('fitpro_testimonials_order', 30),
                'enabled' => true,
            ),
            'blog' => array(
                'order' => get_theme_mod('fitpro_blog_order', 40),
                'enabled' => true,
            ),
            'cta' => array(
                'order' => get_theme_mod('fitpro_cta_order', 50),
                'enabled' => true,
            ),
        );

        // 2. Sort the sections array based on the 'order' key
        uasort($sections, function($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        // 3. Loop through the sorted sections and display their content
        foreach ($sections as $slug => $data) {

            if ( ! $data['enabled'] ) {
                continue;
            }

            switch ($slug) {
                case 'hero':
                    ?>
                    <!-- Hero Section -->
                    <section class="hero-section">
                        <div class="container">
                            <div class="hero-content">
                                <h1 class="hero-headline"><?php echo esc_html( get_theme_mod('fitpro_hero_headline', 'Transform Your Body, Transform Your Life') ); ?></h1>
                                <p class="hero-subheadline"><?php echo wp_kses_post( get_theme_mod('fitpro_hero_subheadline', 'Stop guessing. Start seeing results...') ); ?></p>
                                <a href="<?php echo esc_url( get_theme_mod('fitpro_hero_button_url', '#contact') ); ?>" class="cta-button"><?php echo esc_html( get_theme_mod('fitpro_hero_button_text', 'Get Your Free Consultation') ); ?></a>
                            </div>
                        </div>
                    </section>
                    <?php
                    break;

                case 'services':
                    ?>
                    <!-- Services Section -->
                    <section class="services-section fade-in-section">
                        <div class="container">
                            <h2 class="section-title"><?php echo esc_html( get_theme_mod('fitpro_services_headline', 'Our Core Programs') ); ?></h2>
                            <p class="section-subtitle"><?php echo esc_html( get_theme_mod('fitpro_services_subheadline', 'Designed to deliver results, no matter your starting point.') ); ?></p>
                            <div class="services-grid">
                                <?php
                                $service_query = new WP_Query( array('post_type' => 'fitpro_service', 'posts_per_page' => 3, 'orderby' => 'menu_order', 'order' => 'ASC') );
                                if ( $service_query->have_posts() ) :
                                    while ( $service_query->have_posts() ) : $service_query->the_post();
                                        ?>
                                        <div class="service-item">
                                            <h3 class="service-title"><?php the_title(); ?></h3>
                                            <div class="service-description"><?php the_content(); ?></div>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                    </section>
                    <?php
                    break;

                case 'testimonials':
                    ?>
                    <!-- Testimonials Section -->
                    <section class="testimonials-section fade-in-section">
                        <div class="container">
                            <h2 class="section-title"><?php echo esc_html( get_theme_mod('fitpro_testimonials_headline', 'What Our Clients Say') ); ?></h2>
                            <p class="section-subtitle"><?php echo esc_html( get_theme_mod('fitpro_testimonials_subheadline', 'Real people, real results.') ); ?></p>
                            <div class="testimonials-grid">
                                <div class="testimonial-item">
                                    <blockquote class="testimonial-quote"><p><?php echo wp_kses_post( get_theme_mod('fitpro_testimonial1_text', '"I\'ve tried countless programs..."') ); ?></p></blockquote>
                                    <cite class="testimonial-author"><?php echo esc_html( get_theme_mod('fitpro_testimonial1_author', '- Sarah L.') ); ?></cite>
                                </div>
                                <div class="testimonial-item">
                                    <blockquote class="testimonial-quote"><p><?php echo wp_kses_post( get_theme_mod('fitpro_testimonial2_text', '"As someone who was new to the gym..."') ); ?></p></blockquote>
                                    <cite class="testimonial-author"><?php echo esc_html( get_theme_mod('fitpro_testimonial2_author', '- Mark T.') ); ?></cite>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    break;

                case 'blog':
                    ?>
                    <!-- Blog Section -->
                    <section class="blog-section fade-in-section">
                        <div class="container">
                            <h2 class="section-title"><?php echo esc_html( get_theme_mod('fitpro_blog_headline', 'Latest From The Blog') ); ?></h2>
                            <p class="section-subtitle"><?php echo esc_html( get_theme_mod('fitpro_blog_subheadline', 'Actionable tips to help you on your fitness journey.') ); ?></p>
                            <div class="blog-grid">
                                <?php
                                $latest_posts = new WP_Query( array('posts_per_page' => 3, 'post_status' => 'publish', 'ignore_sticky_posts' => 1) );
                                if ( $latest_posts->have_posts() ) :
                                    while ( $latest_posts->have_posts() ) : $latest_posts->the_post();
                                        get_template_part( 'template-parts/content', 'preview' );
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                    </section>
                    <?php
                    break;

                case 'cta':
                    ?>
                    <!-- CTA Section -->
                    <section id="contact" class="cta-section fade-in-section">
                        <div class="container">
                            <div class="cta-content">
                                <h2 class="section-title"><?php echo esc_html( get_theme_mod('fitpro_cta_headline', 'Ready to Start Your Transformation?') ); ?></h2>
                                <p class="section-subtitle"><?php echo wp_kses_post( get_theme_mod('fitpro_cta_subheadline', 'Your first step is a conversation with us...') ); ?></p>
                                <div class="cta-form-wrapper">
                                    <!-- Form shortcode would go here -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    break;
            }
        }
        ?>

	</main><!-- #main -->

<?php
get_footer();
