<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package FitPro
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		// Display Hero Section
		get_template_part( 'template-parts/homepage-hero' );

		// Display Services Section
		get_template_part( 'template-parts/homepage-services' );

		// Display Testimonials Section
		get_template_part( 'template-parts/homepage-testimonials' );

		// Display Blog Section
		get_template_part( 'template-parts/homepage-blog' );

		// Display CTA Section
		get_template_part( 'template-parts/homepage-cta' );
		?>

	</main><!-- #main -->

<?php
get_footer();
