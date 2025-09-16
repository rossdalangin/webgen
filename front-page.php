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
		// Start the Loop.
		while ( have_posts() ) :
			the_post();

			// Display the page content from the WordPress editor.
			the_content();

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
