<?php
/**
 * Template part for displaying the homepage blog section
 *
 * @package FitPro
 */
?>

<section class="blog-section">
	<div class="container">
		<h2 class="section-title"><?php echo esc_html__( 'Latest From The Blog', 'fitpro' ); ?></h2>
		<p class="section-subtitle"><?php echo esc_html__( 'Actionable tips to help you on your fitness journey.', 'fitpro' ); ?></p>

		<div class="blog-grid">
			<?php
			$latest_posts = new WP_Query( array(
				'posts_per_page'      => 3,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
			) );

			if ( $latest_posts->have_posts() ) :
				while ( $latest_posts->have_posts() ) :
					$latest_posts->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-preview' ); ?>>
						<header class="entry-header">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-thumbnail">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium_large' ); ?>
									</a>
								</div>
							<?php endif; ?>
							<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->

						<footer class="entry-footer">
							<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__( 'Read More', 'fitpro' ); ?></a>
						</footer>
					</article><!-- #post-<?php the_ID(); ?> -->
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<p class="no-posts-message"><?php echo esc_html__( 'Stay tuned for our latest articles!', 'fitpro' ); ?></p>
				<?php
			endif;
			?>
		</div><!-- .blog-grid -->
	</div><!-- .container -->
</section>
