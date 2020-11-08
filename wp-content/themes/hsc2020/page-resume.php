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

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<?php
		$args = array('post_type' => 'employer');
		$employers = get_posts( $args );
		foreach($employers as $job):
		?>
			<h3 class="employer_title">><?php echo $job->post_title; ?></h3>
			<div class='post-content'><?php echo $job->post_content; ?></div>
			<!-- Projects -->
			<?php if ( have_rows('project_list') ) : ?>
			
				<?php while( have_rows('project_list') ) : the_row(); ?>
			
					<?php the_sub_field('project_name'); ?>
			
				<?php endwhile; ?>
			
			<?php endif; ?>
			
		<?php
		endforeach;
		?>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
