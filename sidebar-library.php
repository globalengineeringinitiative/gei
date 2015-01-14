<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Global Engineering Initiative
 */ ?>

<div id="secondary" role="complementary">
	<h1><?php _e( 'Filter', 'gei' ); ?></h1>
	<h2><a class="show-filter" data-toggle="collapse" data-target="#module"><?php _e( 'Module', 'gei' ); ?> <i class="fa fa-angle-up"></i></a></h2>
	<ul id="module" class="filters collapse" data-filter-group="module">
		<?php $terms = get_terms( 'gei_module' );
		foreach ( $terms as $term ) { ?>
		<li><a data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
		<?php } ?>
	</ul>
	<h2><a class="show-filter" data-toggle="collapse" data-target="#skill"><?php _e( 'Skill', 'gei' ); ?> <i class="fa fa-angle-up"></i></a></h2>
	<ul id="skill" class="filters collapse" data-filter-group="skill">
		<?php $terms = get_terms( 'gei_skill' );
		foreach ( $terms as $term ) { ?>
		<li><a data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
		<?php } ?>
	</ul>
	<h2><a class="show-filter" data-toggle="collapse" data-target="#topic"><?php _e( 'Topic', 'gei' ); ?> <i class="fa fa-angle-up"></i></a></h2>
	<ul id="topic" class="filters collapse" data-filter-group="topic">
		<?php $terms = get_terms( 'gei_topic' );
		foreach ( $terms as $term ) { ?>
		<li><a data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
		<?php } ?>
	</ul>
</div><!-- #secondary -->