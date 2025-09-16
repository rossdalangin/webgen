<?php
/**
 * Template part for displaying the homepage testimonials section
 *
 * @package FitPro
 */
?>

<section class="testimonials-section">
	<div class="container">
		<h2 class="section-title"><?php echo esc_html__( 'What Our Clients Say', 'fitpro' ); ?></h2>
		<p class="section-subtitle"><?php echo esc_html__( 'Real people, real results.', 'fitpro' ); ?></p>

		<div class="testimonials-grid">

			<div class="testimonial-item">
				<blockquote class="testimonial-quote">
					<p>"I've tried countless programs, but nothing stuck. The personalized approach here was a game-changer. I'm down 30 pounds and have more energy than ever. I didn't just get a plan; I got a new lifestyle."</p>
				</blockquote>
				<cite class="testimonial-author">- Sarah L.</cite>
				<p class="testimonial-achievement"><?php echo esc_html__( 'Lost 30 lbs & Gained Confidence', 'fitpro' ); ?></p>
			</div>

			<div class="testimonial-item">
				<blockquote class="testimonial-quote">
					<p>"As someone who was new to the gym, I was intimidated. My coach was incredibly supportive and taught me proper form and technique. After just 3 months, I feel stronger, healthier, and more confident in my own skin."</p>
				</blockquote>
				<cite class="testimonial-author">- Mark T.</cite>
				<p class="testimonial-achievement"><?php echo esc_html__( 'Built Foundational Strength & Technique', 'fitpro' ); ?></p>
			</div>

		</div>
	</div>
</section>
