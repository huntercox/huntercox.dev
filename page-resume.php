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

		<h2>Work History</h2>
		<?php
		$args = array('post_type' => 'employer');
		$employers = get_posts( $args );

		echo '<div class="work-history">';

		foreach($employers as $job):
		?>
			<div class="employer">
				<div class="employer__label">
					<?php
						$job_title = get_field('job_title', $job);
						$location  = get_field('location', $job);
						$time 		 = get_field('time_employed', $job); // Group
						if ($time):
							$start_date = $time['start_date'];
							$end_date 	= $time['end_date'];
							$duration		= $time['duration'];
						endif;
					?>
					<p class="employer__job-title"><?php echo $job_title; ?></p>
					<h3 class="employer__name"><span class="employer__name_at">at</span><?php echo $job->post_title; ?></h3>
				</div>
				<div class="employer__sub-label">
					<p class="employer__dates">
					<?php 
						if ($start_date) {
							echo $start_date; 
						}
						echo '<span class="employer__dates_to">to</span>';
						if ($end_date) {
							echo $end_date; 
						}		
							?>
						</p><!-- /.employer__dates -->
				</div><!-- /.employer__sub-label -->
				
				<div class="employer__description">
					<?php echo $job->post_content; ?>
				</div><!-- /.employer__description -->
			</div><!-- /.employer -->
		<?php
		endforeach;

		echo '</div><!-- /.work-history -->'
		?>


	</main><!-- #main -->

	<div class="resume__skills">
		<div class="resume__skills--hard">
			<div class="container">
			<?php  
				$hard_skills = get_field('hard_skills');
				if ($hard_skills) {
					echo '<h3>Hard Skills</h3>';
					echo '<ul class="hard-skills">';
					foreach ($hard_skills as $skill) :
						$hard_skill = $skill['hard_skill'];
						echo '<li>'.$hard_skill.'</li>';
					endforeach;
					echo '</ul>';
				}
			?>
			</div><!-- /.container -->
		</div><!-- /.resume__skills--hard -->

		<div class="resume__skills--soft">
			<div class="container">
			<?php  
				$soft_skills = get_field('soft_skills');
				if ($soft_skills) {
					echo '<h3>Soft Skills</h3>';
					echo '<ul class="soft-skills">';
					foreach ($soft_skills as $skill) :
						$soft_skill = $skill['soft_skill'];
						echo '<li>'.$soft_skill.'</li>';
					endforeach;
					echo '</ul>';
				}
			?>
			</div><!-- /.container -->
		</div><!-- /.resume__skills--hard -->
	</div><!-- /.resume__skills -->

<?php
get_footer();
