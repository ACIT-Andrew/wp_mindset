<?php
/**
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

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()):
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php
		$args = array(
			'post_type' => 'fwd-our-services',
			'posts_per_page' => -1,
			'orderby'		 => 'title',
			'order'			 => 'ASC'
		);
		$query = new WP_Query($args);
		if ($query->have_posts()):
			// Output Navigation
			?>
			<nav>
				<?php
				while ($query->have_posts()):
					$query->the_post();
							?>
								<a href="#<?php the_ID()?>"><?php the_title()?></a>
							<?php
				endwhile;
				?>
			</nav>
			
			<?php
			$terms = get_terms( 
				array(
					'taxonomy' => 'fwd-our-services',
				)
			);
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$args = array(
						'post_type' => 'fwd-our-services',
						'posts_per_page' => -1,
						'tax_query'		=> array(
							array(
								'taxonomy' => 'fwd-our-services',
								'field'    => 'slug',
								'terms'    => $term->slug
							)
						)
					);
					// Add your WP_Query() code here
					$query = new WP_Query($args);
					// Use $term->slug in your tax_query
					if($query->have_posts()):
						echo '<section><h2>' . $term->name . '</h2>';
						while($query->have_posts()):
							$query->the_post();
							if(function_exists('get_field')):
								if(get_field('description')):
							?>
								<article id="<?php the_ID();?>">
									<h3><?php the_title()?></h3>
									<div class="entry-content">
										<p><?php echo get_field('description'); ?></p>
									</div>
								</article>
							<?php
								endif;
							endif;
						endwhile;
						echo '</section>';
					endif;
					?>
						<?php
					// print_r($query);
					// print_r($term);
					// Use $term->name to organize the posts
				}
			// wp_reset_postdata(  );
			}

			wp_reset_postdata();
		endif;
		?>
	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();