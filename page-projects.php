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
				<div class="project__name toggler">
					<?php the_title() ?></p>
				</div><!-- /.project__name -->
			
				<div class="project__details toggle-target">
					<div class="project__type"><span>Type:</span>
					<?php
					$project_employer = get_field('project_employer');
					if( $project_employer ): ?>
							<p><?php echo esc_html( $project_employer->post_title ); ?></p>
					<?php endif; ?></div>
					<div class="project__description"><?php the_content() ?></div>
					<?php
						$contributions = get_field('project_contributions');
						if( $contributions ) {
								echo '<ul class="project__contributions">';
								foreach( $contributions as $contrib ) {
										echo '<li>';
												echo $contrib['contribution'];
										echo '</li>';
								}
								echo '</ul>';
						} 
					?>
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