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

		<h2>Using page.php</h2>

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.

		if(is_page(20)){
			if(function_exists('get_field')){
				if (get_field('address', 20)) {
					echo '<address>' . get_field('address', 20) . '</address>';
				}
				if(get_field('email', 20)){
					echo '<a href="mailto:'. get_field('email', 20) .'">'. get_field('email', 20) .'</a>';
				}
			}
		}

		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
