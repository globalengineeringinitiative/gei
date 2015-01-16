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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( get_field( 'subtitle' ) ) : ?>
			<h2 class="subtitle"><?php the_field( 'subtitle' ); ?></h2>
		<?php endif; ?>
		<div class="entry-meta">
			<p><?php if ( get_field( 'authors' ) ) : $authors = get_field( 'authors' );
					$c = count( $authors );
					$i = 1;
					foreach ( $authors as $author ) {
						echo $author['first_name'] . ' ' . $author['last_name'];
						if ( $c > 2 && $i < $c ) echo ', ';
						if ( $i == ( $c - 1 ) ) echo ' and ';
						$i++;
					} ?><?php if ( get_field( 'source' ) || get_field( 'publication_date' ) ) : ?> / <?php endif; ?><?php endif; ?>
			<?php if ( get_field( 'source' ) ) :
				the_field( 'source' ); ?><?php if ( get_field( 'publication_date' ) ) : ?> / <?php endif; ?><?php endif; ?>
			<?php if ( get_field( 'publication_date' ) ) :
			$date = DateTime::createFromFormat('m/d/Y', get_field('publication_date') );
			echo $date->format('F Y');
			endif; ?></p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_field( 'summary' ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<section class="links">
			<ul>
		<?php if ( get_field( 'external_url' ) ) : ?>
			<li><a href="<?php the_field( 'external_url' ); ?>" target="_blank"><i class="fa fa-globe"></i>  <?php _e( 'Visit Resource Online', 'gei' ); ?></a></li>
		<?php endif; ?>
		<?php if ( get_field( 'file_download_url' ) ) : ?>
			<li><a href="<?php the_field( 'file_download_url' ); ?>" target="_blank">
				<?php if ( get_field( 'file_format' ) ) :
					$format = get_field( 'file_format' );
					switch( $format ) {
					    case 'pdf':
					        echo '<i class="fa fa-file-pdf-o"></i>';
					        break;
					    case 'xls':
					        echo '<i class="fa fa-file-excel-o"></i>';
					        break;
					    case 'ppt':
					        echo '<i class="fa fa-file-powerpoint-o"></i>';
					        break;
					    case 'doc':
					        echo '<i class="fa fa-file-word-o"></i>';
					    	break;
					}
				else :
					echo '<i class="fa fa-reply"></i>';
				endif; ?> <?php _e( 'Download Resource', 'gei' ); ?></a>
			</li>
		<?php endif; ?>
				<li><a href="<?php $library = get_page_by_title( __('Library', 'gei') ); echo get_page_link( $library->ID );  ?>"><i class="fa fa-angle-left"></i> Return to Library</a></li>
			</ul>
		</section>
		<ul id="tags">
			<?php foreach ( $terms as $term ) { ?>
			<li><a href=""><?php echo $term->name; ?></a></li>
			<?php } ?>
			<li><a href=""><?php echo $type->name; ?></a></li>
		</ul>		
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->