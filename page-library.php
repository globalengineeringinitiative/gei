<?php
/* Template Name: Library */
/**
 * @package Global Engineering Initiative
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar( 'library' ); ?>
	<div id="resources" class="container">
		<div id="isotope" class="resources">
		</div>
	</div>
<?php get_footer(); ?>