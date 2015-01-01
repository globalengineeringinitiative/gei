<?php
/**
 * @package Global Engineering Initiative
 */
?>

<?php $terms = wp_get_object_terms( $post->ID, array(
	'gei_discipline',
	'gei_module',
	'gei_region',
	'gei_skill',
	'gei_topic',
) );
$types = wp_get_object_terms( $post->ID, array( 'gei_type' ) );
$post_class = 'panel panel-primary ';
foreach ( $terms as $term ) {
	$post_class .= $term->slug . ' ';
}
foreach ( $types as $type ) {
	$post_class .= $type->slug . ' ';
} ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( rtrim ( $post_class ) ); ?>>
	<div class="panel-heading">
		<?php the_title( sprintf( '<h1 class="panel-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( get_field( 'subtitle' ) ) : ?>
			<h2 class="subtitle"><?php the_field( 'subtitle' ); ?></h2>
		<?php endif; ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="resource-meta">
			<?php gei_posted_on(); ?>
		</div><!-- .resource-meta -->
		<?php endif; ?>
	</div><!-- .panel-heading -->

	<div class="panel-body">
		<?php if ( get_field( 'summary' ) ) the_field( 'summary' ); ?>
	</div><!-- .resource-content -->

	<footer class="panel-footer">
		<p><?php if ( get_field( 'authors' ) ) : $authors = get_field( 'authors' );
				$c = count( $authors );
				$i = 1;
				foreach ( $authors as $author ) {
					echo $author['first_name'] . ' ' . $author['last_name'];
					if ( $c > 2 && $i < $c ) echo ', ';
					if ( $i == ( $c - 1 ) ) echo ' and ';
					$i++;
				} ?><br /><?php endif; ?>
		<?php if ( get_field( 'publication_date' ) ) :
		$date = DateTime::createFromFormat('m/d/Y', get_field('publication_date') );
		echo $date->format('F Y');
		endif; ?></p>
		<ul id="tags">
			<?php foreach ( $terms as $term ) { ?>
			<li><a class="btn btn-primary"><?php echo $term->name; ?></a></li>
			<?php } ?>
			<li><a class="btn btn-default"><?php echo $type->name; ?></a></li>
		</ul>
		
	</footer><!-- .resource-footer -->
</div><!-- #post-## -->