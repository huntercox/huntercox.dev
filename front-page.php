<?php
/**
 * The template for displaying the Homepage.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hsc2020
 */

get_header();
?>
<?php
			$hero = get_field('home_hero_section');
			if( $hero ): ?>
					<div class="home__hero">
						<div class="hero__bg-img" style="background-image: url(<?php echo esc_url( $hero['background_image']['url'] ); ?>)"></div><!-- /.hero__bg-img -->
							<div class="hero__overlay">
									<?php
										$headline = $hero['overlay_headline']; 
										$tagline  = $hero['overlay_tagline'];

										if ( $headline ) {
											echo '<h2 class="hero__headline">'.$headline.'</h2>';
										}
										if ( $tagline ) {
											echo '<p class="hero__tagline">'.$tagline.'</p>';
										}
									?>
							</div><!-- /.hero__overlay -->
					</div>
		<?php endif; ?>

		
		<main id="primary" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- Introduction -->
				<?php if ( get_field('home_intro_section') ) : ?>
					<div class="home__intro">
						<p><?php echo get_field('home_intro_section'); ?></p>
					</div><!-- ./home__intro-section -->
				<?php endif; ?>
				
			</article><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
		<?php 
			$bg_img = get_field('background_image', 'option');
			
			if( $bg_img ) { echo '</div><!-- /.bg-img -->'; } ?>


		<!-- Callout -->
		<?php 

			if( $bg_img ) {
				$bg_url = $bg_img['url'];
				echo '<div class="home__callout bg-img" style="background-image:url('.$bg_url.');">';
			} else {
				echo '<div class="home__callout">';
			}
		?>
				<!-- Links -->
				<div class="home__links">
					<?php
						// Links group
						$links = get_field('home_links_section'); 
						if ( $links ) : 
							echo '<div class="links">';

							$resume_link = $links['resume_link'];
							$projects_link = $links['projects_link'];

							if( $resume_link ) { 
								$resume_title = $resume_link->post_title;
								$resume_ID 		= $resume_link->ID;
								$resume_url   = get_permalink($resume_ID);
						
								echo '<a class="links__resume" href="'. $resume_url .'">'. $resume_title.'</a>';
					
							} 
							if( $projects_link ) {
								$projects_title = $projects_link->post_title;
								$projects_ID 		= $projects_link->ID;
								$projects_url   = get_permalink($projects_ID);
								
								echo '<a class="links__projects" href="'. esc_url($projects_url) .'">' .$projects_title.'</a>';
								
							}
							echo '</div><!-- /.links -->';
						endif;
					?>
					</div><!-- /.home__links -->

			<div class="callout container">
			<?php
				// Callout group
				$callout = get_field('home_callout_section'); 
				if ( $callout ) : 
					$callout_headline =  $callout['callout_headline'];
					$callout_link 		=  $callout['callout_link'];

					// Headline
					if( $callout_headline ) {
						echo '<p class="callout__headline">';
							echo $callout_headline;
						echo '</p>';
					}

					// Link
					if( $callout_link ) {
						$link_url = $callout_link['url'];
						$link_title = $callout_link['title'];
    			?>
						<a class="callout__link" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php
					}
					
				endif; // callout group
			?>
			</div><!-- /.callout -->
		</div><!-- /.home__callout-section -->

<?php
get_footer();
