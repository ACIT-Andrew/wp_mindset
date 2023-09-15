<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<?php echo do_shortcode( '[react-quotes]' ) ?>
		<div class="footer-contact">
			<?php
				if(!is_page(20)){
					if(function_exists('get_field')){
						if (get_field('address', 20)) {
							echo '<div class="footer-contact-left">';
							get_template_part( 'icons/location' );
							echo '<address>' . get_field('address', 20) . '</address>';
							echo '</div>';
						}
						if(get_field('email', 20)){
							echo '<div class="footer-contact-right">';
							get_template_part( 'icons/email' );
							echo '<a href="mailto:'. get_field('email', 20) .'">'. get_field('email', 20) .'</a>';
							echo '</div>';
						}
					}
				}
			?>
		</div><!-- .footer-contact -->
		<div class="footer-menus">
			<nav id="footer-navigation" class="footer-navigation">
				<?php wp_nav_menu(array('theme_location' => 'footer-left')); ?>
			</nav>	
			<nav id="footer-navigation" class="social-navigation">
				<?php wp_nav_menu(array('theme_location' => 'footer-right')); ?>
			</nav>	
		</div><!-- .footer-menus -->
		<div class="site-info">
			<br>
			<?php echo the_privacy_policy_link(); ?>
			<br>
			<?php esc_html_e('Created by ', 'fwd'); ?><a href="<?php echo esc_url(__('https://wp.bcitwebdeveloper.ca/', 'fwd')); ?>"><?php esc_html_e('Jonathon Leathers', 'fwd'); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
