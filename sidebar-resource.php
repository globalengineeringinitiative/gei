<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Global Engineering Initiative
 */ ?>
<?php $disciplines = wp_get_object_terms( $post->ID, array( 'gei_discipline', ) );
$modules = wp_get_object_terms( $post->ID, array( 'gei_module', ) );
$regions = wp_get_object_terms( $post->ID, array( 'gei_region', ) );
$skills = wp_get_object_terms( $post->ID, array( 'gei_skill', ) );
$topics = wp_get_object_terms( $post->ID, array( 'gei_topic', ) );
$types = wp_get_object_terms( $post->ID, array( 'gei_type' ) ); ?>
<div id="secondary" role="complementary">
	<h1><?php _e( 'Resource Data', 'gei' ); ?></h1>
	<?php if ( !empty( $disciplines ) ) { ?>
		<h2><?php _e( 'Discipline(s)', 'gei' ); ?></h2>
		<ul id="disciplines" class="tags">
			<?php foreach ( $disciplines as $term ) { ?>
			<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
	<?php if ( !empty( $modules ) ) { ?>
		<h2><?php _e( 'Module(s)', 'gei' ); ?></h2>
		<ul id="modules" class="tags">
			<?php foreach ( $modules as $term ) { ?>
			<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
	<?php if ( !empty( $skills ) ) { ?>
		<h2><?php _e( 'Skill(s)', 'gei' ); ?></h2>
		<ul id="skills" class="tags">
			<?php foreach ( $skills as $term ) { ?>
			<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
	<?php if ( !empty( $topics ) ) { ?>
		<h2><?php _e( 'Topic(s)', 'gei' ); ?></h2>
		<ul id="topics" class="tags">
			<?php foreach ( $topics as $term ) { ?>
			<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
	<?php if ( !empty( $regions ) ) { ?>
		<h2><?php _e( 'Region', 'gei' ); ?></h2>
		<ul id="disciplines" class="tags">
			<?php foreach ( $regions as $term ) { ?>
			<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
	<?php if ( !empty( $types ) ) { ?>
		<h2><?php _e( 'Media Type', 'gei' ); ?></h2>
		<ul id="topics" class="tags">
			<?php foreach ( $types as $term ) { ?>
			<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
</div><!-- #secondary -->