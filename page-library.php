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
		<section id="resources" class="container">
			<div id="isotope" class="resources">
				<?php $resources = get_posts( array(
					'post_type' => 'gei_resource',
					'posts_per_page' => 1,
					'order' => 'asc',
					'orderby' => 'post_title',
				) );
				foreach ( $resources as $post ) {
					get_template_part( 'content', 'resource-brief' );
				} ?>
				<div id="null" class="resource">
					<header>
						<h1 class="resource-title"><?php echo get_option( 'options_no_match_title' ); ?></h1>
					</header>
					<section class="resource-body"><?php echo get_option( 'options_no_match_text' ); ?></section>
				</div>
			</div>
		</section>
	</div><!-- #primary -->

<?php get_sidebar( 'library' ); ?>
<?php get_footer(); ?>