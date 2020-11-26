<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hsc2020
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php 
				$site_url  = get_site_url();
				$site_name = get_bloginfo();
				echo '<a href="'. esc_url( $site_url ) .'">'.$site_name.'</a>';
			?>
		</div><!-- /.site-info -->
			<?php 
				// Add icon-links for: 
				//   -- Github
				//   -- LinkedIn
				//   -- Instagram
				//   -- Facebook

				// Location: ACF Options page "my-custom-data"
				$social_links = get_field('social_media_links', 'option');
				if( $social_links ) :
					echo '<ul class="footer__social-links">';

					$github 	 = $social_links['github'];
					$linkedin  = $social_links['linkedin'];
					$instagram = $social_links['instagram'];
					$facebook  = $social_links['facebook'];
					
					if( $github ) {
						echo '<li><a href="'.esc_url($github).'" target="_blank">';
							echo '<i class="fab fa-github-square"></i>';
						echo '</a></li>';
					}
					if( $linkedin ) {
						echo '<li><a href="'.$linkedin.'" target="_blank">';
							echo '<i class="fab fa-linkedin"></i>';
						echo '</a></li>';
					}
					if( $instagram ) {
						echo '<li><a href="'.$instagram.'" target="_blank">';
							echo '<i class="fab fa-instagram-square"></i>';
						echo '</a></li>';
					}
					if( $facebook ) {
						echo '<li><a href="'.$facebook.'" target="_blank">';
							echo '<i class="fab fa-facebook-square"></i>';
						echo '</a></li>';
					}
					
					echo '</ul><!-- .footer__social-links -->';
				endif;

			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
