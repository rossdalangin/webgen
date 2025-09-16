<?php
/**
 * Template part for displaying the homepage services section
 *
 * @package FitPro
 */
?>

<section class="services-section">
	<div class="container">
		<h2 class="section-title"><?php echo esc_html__( 'Our Core Programs', 'fitpro' ); ?></h2>
		<p class="section-subtitle"><?php echo esc_html__( 'Designed to deliver results, no matter your starting point.', 'fitpro' ); ?></p>

		<div class="services-grid">

			<div class="service-item">
				<div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-barbell"><line x1="12" y1="2" x2="12" y2="22"></line><line x1="6" y1="6" x2="18" y2="6"></line><line x1="6" y1="18" x2="18" y2="18"></line></svg>
				</div>
				<h3 class="service-title"><?php echo esc_html__( '1-on-1 Personal Training', 'fitpro' ); ?></h3>
				<p class="service-description"><?php echo esc_html__( 'Get personalized workouts and dedicated attention from a certified coach to fast-track your strength and conditioning goals.', 'fitpro' ); ?></p>
			</div>

			<div class="service-item">
				<div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-apple"><path d="M12 20.94c1.5 0 2.75 1.06 4 1.06 3 0 6-8 6-12.22A4.91 4.91 0 0 0 17 5c-2.22 0-4 1.44-5 2-1-.56-2.78-2-5-2a4.9 4.9 0 0 0-5 4.78C2 14 5 22 8 22c1.25 0 2.5-1.06 4-1.06Z"></path><path d="M10 2c1 .5 2 2 2 5"></path></svg>
                </div>
				<h3 class="service-title"><?php echo esc_html__( 'Custom Nutrition Planning', 'fitpro' ); ?></h3>
				<p class="service-description"><?php echo esc_html__( 'Fuel your body correctly with a science-based nutrition plan tailored to your metabolism, lifestyle, and fitness objectives.', 'fitpro' ); ?></p>
			</div>

			<div class="service-item">
				<div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-laptop"><path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55A1 1 0 0 1 20.7 20H3.3a1 1 0 0 1-.58-1.45L4 16"></path></svg>
				</div>
				<h3 class="service-title"><?php echo esc_html__( 'Online Fitness Coaching', 'fitpro' ); ?></h3>
				<p class="service-description"><?php echo esc_html__( 'Train on your own terms with our comprehensive online coaching program, complete with weekly check-ins and video support.', 'fitpro' ); ?></p>
			</div>

		</div>
	</div>
</section>
