<?php
/**
 * The template for displaying the footer
 *
 * @package FitPro
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-widgets-wrapper">

				<div class="footer-widget-area">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php else : ?>
						<!-- Placeholder content if the widget area is empty -->
						<div class="widget">
							<h2 class="widget-title"><?php esc_html_e( 'About Us', 'fitpro' ); ?></h2>
							<p><?php esc_html_e( 'Add a Text widget to this area to say something about your brand.', 'fitpro' ); ?></p>
						</div>
					<?php endif; ?>
				</div>

				<div class="footer-widget-area">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<?php dynamic_sidebar( 'footer-2' ); ?>
					<?php else : ?>
						<!-- Placeholder content -->
						<div class="widget">
							<h2 class="widget-title"><?php esc_html_e( 'Contact Us', 'fitpro' ); ?></h2>
							<ul>
								<li><a href="#"><?php esc_html_e( 'Contact Page', 'fitpro' ); ?></a></li>
							</ul>
						</div>
					<?php endif; ?>
				</div>

				<div class="footer-widget-area">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-3' ); ?>
					<?php else : ?>
						<!-- Placeholder content -->
						<div class="widget">
							<h2 class="widget-title"><?php esc_html_e( 'Quick Links', 'fitpro' ); ?></h2>
							<ul>
								<li><a href="#"><?php esc_html_e( 'Add a Navigation Menu widget here.', 'fitpro' ); ?></a></li>
							</ul>
						</div>
					<?php endif; ?>
				</div>

				<div class="footer-widget-area">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<?php dynamic_sidebar( 'footer-4' ); ?>
					<?php else : ?>
						<!-- Placeholder content -->
						<div class="widget">
							<h2 class="widget-title"><?php esc_html_e( 'Newsletter', 'fitpro' ); ?></h2>
							<p><?php esc_html_e( 'Add a newsletter signup form widget here.', 'fitpro' ); ?></p>
						</div>
					<?php endif; ?>
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
