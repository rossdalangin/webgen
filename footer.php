<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FitPro
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-widgets-wrapper">

				<div class="footer-widget-area">
					<div class="widget">
						<h2 class="widget-title"><?php bloginfo( 'name' ); ?></h2>
						<p><?php bloginfo( 'description' ); ?></p>
					</div>
				</div>

				<div class="footer-widget-area">
					<div class="widget">
						<h2 class="widget-title"><?php esc_html_e( 'Contact Us', 'fitpro' ); ?></h2>
						<ul>
							<li><a href="mailto:hello@example.com">hello@example.com</a></li>
							<li><a href="tel:+1234567890">+1 (234) 567-890</a></li>
							<li><?php esc_html_e( '123 Fitness St, Workout City', 'fitpro' ); ?></li>
						</ul>
					</div>
				</div>

				<div class="footer-widget-area">
					<div class="widget">
						<h2 class="widget-title"><?php esc_html_e( 'Follow Us', 'fitpro' ); ?></h2>
						<ul class="social-links">
							<li><a href="#" target="_blank">Facebook</a></li>
							<li><a href="#" target="_blank">Instagram</a></li>
							<li><a href="#" target="_blank">YouTube</a></li>
						</ul>
					</div>
				</div>

				<div class="footer-widget-area">
					<div class="widget">
						<h2 class="widget-title"><?php esc_html_e( 'Newsletter', 'fitpro' ); ?></h2>
						<p><?php esc_html_e( 'Subscribe to get our latest fitness tips.', 'fitpro' ); ?></p>
						<form class="newsletter-form">
							<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your Email', 'fitpro' ); ?>" required>
							<button type="submit"><?php esc_html_e( 'Subscribe', 'fitpro' ); ?></button>
						</form>
                        <p class="form-plugin-notice"><small><em><?php echo esc_html__( 'Requires a functional form plugin.', 'fitpro' ); ?></em></small></p>
					</div>
				</div>

			</div><!-- .footer-widgets-wrapper -->

			<div class="site-info">
                <span class="copyright-text">
				    &copy; <?php echo date_i18n( 'Y' ); ?> <?php echo esc_html( get_theme_mod( 'fitpro_footer_copyright_text', get_bloginfo( 'name' ) . '. All Rights Reserved.' ) ); ?>
                </span>
				<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'fitpro' ), 'FitPro', '<a href="https://example.com" rel="designer">Jules</a>' );
				?>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Exit Intent Popup -->
<div id="exit-intent-popup" class="exit-intent-popup-wrapper" style="display: none;">
	<div class="exit-intent-popup-overlay"></div>
	<div class="exit-intent-popup-content">
		<button class="close-popup-button">&times;</button>
		<h3><?php esc_html_e( 'Wait! Don\'t Go!', 'fitpro' ); ?></h3>
		<p><?php esc_html_e( 'Get exclusive fitness tips, nutrition guides, and special offers delivered straight to your inbox. Subscribe to our free newsletter.', 'fitpro' ); ?></p>
		<form class="newsletter-form">
			<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your Best Email', 'fitpro' ); ?>" required>
			<button type="submit" class="cta-button"><?php esc_html_e( 'Get Free Tips', 'fitpro' ); ?></button>
		</form>
		<p><small><?php esc_html_e( 'Join thousands of others on their fitness journey!', 'fitpro' ); ?></small></p>
        <p class="form-plugin-notice"><small><em><?php echo esc_html__( 'Note: Requires a functional form plugin.', 'fitpro' ); ?></em></small></p>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
