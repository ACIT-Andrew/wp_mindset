<?php
/**
 * Template Name: Front Page
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while (have_posts()):
			the_post();

			get_template_part('template-parts/content', 'page');
			?>

						<section class="home-intro">
						<?php
						if (function_exists('get_field')) {
							if (get_field('top_section')) {
								the_field('top_section');
							}
						}
						?>

						</section>

						<section class="home-work"></section>

						<section class="home-work"></section>

						<section class="home-left">
							<?php
							if(function_exists('get_field')){
								if ( get_field( 'left_section_heading' ) ) {
									echo '<h2>' . esc_html(get_field( 'left_section_heading' )) . '</h2>';
								}
							
								if ( get_field( 'left_section_content' ) ) {
									echo '<p>' . esc_html(get_field( 'left_section_content' )) . '</p>';
								}
							}
							?>
						</section>

						<section class="home-right">
							<?php
							if(function_exists('get_field')){
								if ( get_field( 'right_section_heading' ) ) {
									echo '<h2>' . esc_html(get_field( 'right_section_heading' )) . '</h2>';
								}
							
								if ( get_field( 'right_section_content' ) ) {
									echo '<p>' . esc_html(get_field( 'right_section_content' )) . '</p>';
								}
							}
							?>

						</section>

						<section class="home-slider"></section>
			
						<section class="home-blog">
							<h2><?php esc_html_e('Latest Blog Posts', 'fwd'); ?></h2>
							<?php
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => 4
							);

							$blog_query = new WP_Query($args);

							if ($blog_query->have_posts()) {
								while ($blog_query->have_posts()):
									$blog_query->the_post();
									?>

											<article>
												<a href="<?php the_permalink(); ?>">
													<h3><?php the_title(); ?></h3>
													<p><?php echo get_the_date(); ?></p>
												</a>
											</article>

											<?php
											if (has_post_thumbnail()) {
												the_post_thumbnail('small');
											}
								endwhile;
								wp_reset_postdata();
							}
							?>
						</section>

					<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();