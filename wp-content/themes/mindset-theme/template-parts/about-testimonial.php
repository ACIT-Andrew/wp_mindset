<?php
/**
 * Template part for displaying random testimonial
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

?>

<?php
		$args = array(
			'post_type' 	 => 'fwd-testimonial',
			'posts_per_page' => 1,
			'orderby'		 => 'rand',
		);
		$query = new WP_Query($args);
		if($query -> have_posts()):
			// esc_html_x() escapes text and if is not translatable, uses original text instead
			echo '<section><h2>' . esc_html_x( 'Reviews', 'fwd' ) . '</h2>';
			while($query->have_posts()):
				$query -> the_post();
				?>
				<h3><?php the_title(); ?></h3>
				<?php
				the_content();
			endwhile;
			echo '</section>';
			wp_reset_postdata();
		endif;