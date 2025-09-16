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
                'enabled' => true,
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
            if ($a['order'] == $b['order']) {
                return 0;
            }
            return ($a['order'] < $b['order']) ? -1 : 1;
        });

        // 3. Loop through the sorted sections and display their content
        foreach ($sections as $slug => $data) {

            if ( ! $data['enabled'] ) {
                continue;
            }

            switch ($slug) {
                case 'hero':
                    $hero_bg_image_url = get_theme_mod('fitpro_hero_background_image', 'https://picsum.photos/1200/800?image=974');
                    $hero_style = 'background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(' . esc_url($hero_bg_image_url) . ');';
                    $button2_text = get_theme_mod('fitpro_hero_button2_text', 'Learn More');
                    $button2_url = get_theme_mod('fitpro_hero_button2_url', '');
                    ?>
                    <section class="hero-section" style="<?php echo esc_attr($hero_style); ?>">
                        <div class="container">
                            <div class="hero-content">
                                <h1 class="hero-headline"><?php echo esc_html( get_theme_mod('fitpro_hero_headline', 'Transform Your Body, Transform Your Life') ); ?></h1>
                                <p class="hero-subheadline"><?php echo wp_kses_post( get_theme_mod('fitpro_hero_subheadline', 'Stop guessing. Start seeing results...') ); ?></p>
                                <div class="hero-buttons">
                                    <a href="<?php echo esc_url( get_theme_mod('fitpro_hero_button_url', '#contact') ); ?>" class="cta-button"><?php echo esc_html( get_theme_mod('fitpro_hero_button_text', 'Get Your Free Consultation') ); ?></a>
                                    <?php if ( ! empty($button2_url) ) : ?>
                                        <a href="<?php echo esc_url($button2_url); ?>" class="cta-button cta-button-alternate"><?php echo esc_html($button2_text); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    break;

                case 'services':
                    // ... (rest of the cases remain the same)
                    ?>
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
                                            <div class="service-description"><?php echo wp_kses_post(get_the_excerpt()); ?></div>
                                            <a href="<?php the_permalink(); ?>" class="cta-button"><?php esc_html_e( 'Learn More', 'fitpro' ); ?></a>
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
