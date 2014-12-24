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
			<div id="filters" class="resource-filter col-md-3">
				<h1><?php _e( 'Filter', 'gei' ); ?></h1>
				<h2><?php _e( 'Discipline', 'gei' ); ?></h2>
				<ul class="button-group" data-filter-group="discipline">
					<li><button class="btn btn-sm btn-primary" data-filter=""><?php _e( 'All', 'gei' ); ?></button></li>
					<?php $terms = get_terms( 'gei_discipline' );
					foreach ( $terms as $term ) { ?>
					<li><button class="btn btn-sm btn-default" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button></li>
					<?php } ?>
				</ul>
				<h2><?php _e( 'Module', 'gei' ); ?></h2>
				<ul class="button-group" data-filter-group="module">
					<li><button class="btn btn-sm btn-primary" data-filter=""><?php _e( 'All', 'gei' ); ?></button></li>
					<?php $terms = get_terms( 'gei_module' );
					foreach ( $terms as $term ) { ?>
					<li><button class="btn btn-sm btn-default" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button></li>
					<?php } ?>
				</ul>
				<h2><?php _e( 'Region', 'gei' ); ?></h2>
				<ul class="button-group" data-filter-group="region">
					<li><button class="btn btn-sm btn-primary" data-filter=""><?php _e( 'All', 'gei' ); ?></button></li>
					<?php $terms = get_terms( 'gei_region' );
					foreach ( $terms as $term ) { ?>
					<li><button class="btn btn-sm btn-default" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button></li>
					<?php } ?>
				</ul>
				<h2><?php _e( 'Skill', 'gei' ); ?></h2>
				<ul class="button-group" data-filter-group="skill">
					<li><button class="btn btn-sm btn-primary" data-filter=""><?php _e( 'All', 'gei' ); ?></button></li>
					<?php $terms = get_terms( 'gei_skill' );
					foreach ( $terms as $term ) { ?>
					<li><button class="btn btn-sm btn-default" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button></li>
					<?php } ?>
				</ul>
				<h2><?php _e( 'Topic', 'gei' ); ?></h2>
				<ul class="button-group" data-filter-group="topic">
					<li><button class="btn btn-sm btn-primary" data-filter=""><?php _e( 'All', 'gei' ); ?></button></li>
					<?php $terms = get_terms( 'gei_topic' );
					foreach ( $terms as $term ) { ?>
					<li><button class="btn btn-sm btn-default" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button></li>
					<?php } ?>
				</ul>
				<h2><?php _e( 'Media Type', 'gei' ); ?></h2>
				<ul class="button-group" data-filter-group="type">
					<li><button class="btn btn-sm btn-primary" data-filter=""><?php _e( 'All', 'gei' ); ?></button></li>
					<?php $terms = get_terms( 'gei_type' );
					foreach ( $terms as $term ) { ?>
					<li><button class="btn btn-sm btn-default" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button></li>
					<?php } ?>
				</ul>
			</div>
			<div id="isotope" class="resources col-md-9">
				<?php $resources = get_posts( array(
					'post_type' => 'gei_resource',
					'posts_per_page' => -1,
					'order' => 'asc',
					'orderby' => 'post_title',
				) );
				foreach ( $resources as $post ) {
					get_template_part( 'content', 'gei_resource' );
				} ?>
			</div>
		</section>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>