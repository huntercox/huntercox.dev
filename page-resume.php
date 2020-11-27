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
