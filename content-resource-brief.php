<?php
/**
 * @package Global Engineering Initiative
 */
?>

<?php $disciplines = wp_get_object_terms( $post->ID, array( 'gei_discipline', ) );
$modules = wp_get_object_terms( $post->ID, array( 'gei_module', ) );
$regions = wp_get_object_terms( $post->ID, array( 'gei_region', ) );
$skills = wp_get_object_terms( $post->ID, array( 'gei_skill', ) );
$topics = wp_get_object_terms( $post->ID, array( 'gei_topic', ) );
$types = wp_get_object_terms( $post->ID, array( 'gei_type' ) );
$post_class = 'resource ';
foreach ( $disciplines as $term ) {
	$post_class .= $term->slug . ' ';
}
foreach ( $modules as $term ) {
	$post_class .= $term->slug . ' ';
}
foreach ( $regions as $term ) {
	$post_class .= $term->slug . ' ';
}
foreach ( $skills as $term ) {
	$post_class .= $term->slug . ' ';
}
foreach ( $topics as $term ) {
	$post_class .= $term->slug . ' ';
}
foreach ( $types as $term ) {
	$post_class .= $term->slug . ' ';
} ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( rtrim ( $post_class ) ); ?>>
	<header>
		<?php the_title( sprintf( '<h1 class="panel-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( get_field( 'subtitle' ) ) : ?>
			<h2 class="subtitle"><?php the_field( 'subtitle' ); ?></h2>
		<?php endif; ?>
		<a class="type" href="<?php echo esc_url( get_term_link( $types[0] ) ); ?>"><?php echo $types[0]->name; ?></a>
	</header>

	<section class="resource-content">
		<?php if ( get_field( 'short_summary' ) ) : ?>
			<p><?php the_field( 'short_summary' ); ?></p>
		<?php else :
			the_field( 'summary' );
		endif; ?>
	</section><!-- .resource-content -->

	<footer class="resource-footer">
		<p class="metadata"><?php if ( get_field( 'authors' ) ) : $authors = get_field( 'authors' );
				$c = count( $authors );
				$i = 1;
				foreach ( $authors as $author ) {
					echo $author['first_name'] . ' ' . $author['last_name'];
					if ( $c > 2 && $i < $c ) echo ', ';
					if ( $i == ( $c - 1 ) ) echo ' and ';
					$i++;
				} ?><?php endif; ?><?php if ( get_field( 'authors') && get_field ( 'publication_date' ) ) : ?> / <?php endif; ?>
		<?php if ( get_field( 'publication_date' ) ) :
		$date = DateTime::createFromFormat('m/d/Y', get_field('publication_date') );
		echo $date->format('F Y');
		endif; ?></p>
		
		<?php if ( !empty( $modules ) ) { ?>
			<div class="tags">
				<span class="label"><?php _e( 'Modules', 'gei' ); ?>: </span>
				<ul id="modules">
					<?php foreach ( $modules as $term ) { ?>
					<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
		<?php if ( !empty( $skills ) ) { ?>
			<div class="tags">
				<span class="label"><?php _e( 'Skills', 'gei' ); ?>: </span>
				<ul id="skills">
					<?php foreach ( $skills as $term ) { ?>
					<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
		<?php if ( !empty( $topics ) ) { ?>
			<div class="tags">
				<span class="label"><?php _e( 'Topics', 'gei' ); ?>: </span>
				<ul id="topics">
					<?php foreach ( $topics as $term ) { ?>
					<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
	</footer><!-- .resource-footer -->
</div>