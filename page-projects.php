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
 * @package hsc2020
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
		<?php	
		endwhile; // End of the loop.
		?>

		<?php
		$args = array(
			'post_type' => 'project',
			'posts_per_page' => -1
		);
		$projects_posts = new WP_Query($args);

		if($projects_posts->have_posts()) :
			echo '<ul class="projects">';

			while($projects_posts->have_posts()) : 
					$projects_posts->the_post();
		?>
			<li class="project">
				<div class="toggler">
					<h2 class="project__name"><?php the_title() ?></h2><!-- /.project__name -->
				</div><!-- /.toggler -->
				
				<div class="toggle-target">
					<?php
						$link = get_field('project_links');
						if ( $link ) {
							$direct = $link['relevant_link'];
							if ( $direct ) :
								echo '<a class="project__link" href="'.$direct.'" target="_blank">View <strong>live</strong> project!  <i class="fas fa-external-link-alt"></i></a>';
							endif;
							$wayback = $link['wayback_machine_link'];
							if ( $wayback ) :
								echo '<a class="project__link" href="'.$wayback.'" target="_blank">View <strong>archived</strong> project!  <i class="fas fa-external-link-alt"></i></a>';
							endif;

							if ( !$direct && !$wayback ):
								echo "<p>Sorry, for some reason there's not a link for this project.</p>";
							endif;
						}
					?>
					<div class="project__details">
						<?php
							$contributions = get_field('project_contributions');
							if( $contributions ) {
								echo '<div class="project__contributions">';
									echo '<h3 class="project__heading">Contributions</h3>';
									echo '<ul class="project__contributions_list">';
									foreach( $contributions as $contrib ) {
											echo '<li>';
													echo $contrib['contribution'];
											echo '</li>';
									}
									echo '</ul>';
								echo '</div><!-- /.project__contributions -->';
							} 
						?>
						<div class="project__description">
							<h3 class="project__heading">Back Story</h3>
							<?php the_content() ?>
						</div><!-- /.project__description -->

					</div><!-- /.project__details -->
				</div><!-- /.toggle-target -->

			</li><!-- /.project -->
		<?php
			endwhile;

			echo '</ul><!-- /.projects -->';

		else: 
		?>

			Oops, there are no posts.

		<?php
		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();