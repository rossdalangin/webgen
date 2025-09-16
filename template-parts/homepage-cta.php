<?php
/**
 * Template part for displaying the homepage CTA section
 *
 * @package FitPro
 */
?>

<section id="contact" class="cta-section">
	<div class="container">
		<div class="cta-content">
			<h2 class="section-title"><?php echo esc_html__( 'Ready to Start Your Transformation?', 'fitpro' ); ?></h2>
			<p class="section-subtitle"><?php echo esc_html__( 'Your first step is a conversation with us. Fill out the form below for a free, no-obligation consultation to see if we\'re the right fit for you.', 'fitpro' ); ?></p>

			<div class="cta-form-wrapper">
				<!--
					NOTE: This is a placeholder form. For a real site, this should be connected
					to a form plugin (like Contact Form 7 or Gravity Forms) or a custom handler.
				-->
				<form class="cta-form">
					<div class="form-group">
						<input type="text" name="name" placeholder="<?php esc_attr_e( 'Your Name', 'fitpro' ); ?>" required>
					</div>
					<div class="form-group">
						<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your Email', 'fitpro' ); ?>" required>
					</div>
					<button type="submit" class="cta-button"><?php echo esc_html__( 'Book My Free Consultation', 'fitpro' ); ?></button>
				</form>
				<p class="form-privacy-notice"><small><?php echo esc_html__( 'We respect your privacy. No spam, ever.', 'fitpro' ); ?></small></p>
                <p class="form-plugin-notice"><small><em><?php echo esc_html__( 'Note: This is a demo form. To make it functional, please install a forms plugin like Contact Form 7 and replace the markup.', 'fitpro' ); ?></em></small></p>
			</div>
		</div>
	</div>
</section>
