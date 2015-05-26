<?php
/**
 * Loop for the Library
 *
 * @package Global Engineering Initiative
 */

define( 'WP_USE_THEMES', false );
require_once( '../../../wp-load.php' );

global $sitepress;

$sitepress->switch_lang( $_GET['language'] );

$tax = array(
	'relation' => 'AND',
);

if ( isset( $_GET['module'] ) ) :
	foreach ( $_GET['module'] as $module ) {
		$tax[] = array( 'taxonomy' => 'gei_module', 'field' => 'slug', 'terms' => $module );
	}
endif;
if ( isset( $_GET['skill'] ) ) :
	foreach ( $_GET['skill'] as $skill ) {
		$tax[] = array( 'taxonomy' => 'gei_skill', 'field' => 'slug', 'terms' => $skill );
	}
endif;
if ( isset( $_GET['topic'] ) ) :
	foreach ( $_GET['topic'] as $topic ) {
		$tax[] = array( 'taxonomy' => 'gei_topic', 'field' => 'slug', 'terms' => $topic );
	}
endif;
if ( isset( $_GET['type'] ) ) :
	foreach ( $_GET['type'] as $type ) {
		$tax[] = array( 'taxonomy' => 'gei_type', 'field' => 'slug', 'terms' => $type );
	}
endif;

$args = array(
	'post_type' => 'gei_resource',
	'posts_per_page' => -1,
	'order' => 'asc',
	'orderby' => 'post_title',
);

if ( isset( $_GET['module'] ) || isset( $_GET['skill'] ) || isset( $_GET['topic'] ) || isset( $_GET['type'] ) )
	$args['tax_query'] = $tax;

$library = new WP_Query( $args );

if ( $library->have_posts() ) :
	while ( $library->have_posts() ) : $library->the_post();
		get_template_part( 'content', 'resource-brief' );
	endwhile;
else :
	get_template_part( 'content', 'resource-null' );
endif; ?>