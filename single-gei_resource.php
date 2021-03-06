<?php
/**
 * The template for displaying all single posts.
 *
 * @package Global Engineering Initiative
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'resource-full' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'resource' ); ?>
<?php get_footer(); ?>
