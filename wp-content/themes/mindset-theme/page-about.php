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
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php
		$args = array(
			'post_type' 	 => 'fwd-testimonial',
			'posts_per_page' => -1,
			'orderby'		 => 'title',
			'order'			 => 'ASC'
		);
		$query = new WP_Query($args);
		if($query -> have_posts()):
			while($query->have_posts()):
				$query -> the_post();
				?>
				<h3><?php the_title(); ?></h3>
				<?php
				the_content();
			endwhile;
			wp_reset_postdata();
		endif;

		// get_template_part( 'template-parts/work', 'categories' );
		?>

	</main><!-- #primary -->

<?php

get_footer();
