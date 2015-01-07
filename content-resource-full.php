<?php
/**
 * @package Global Engineering Initiative
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3' ); ?>>
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
					} ?><br /><?php endif; ?>
			<?php if ( get_field( 'source' ) ) :
				the_field( 'source' ); ?><br /><?php endif; ?>
			<?php if ( get_field( 'publication_date' ) ) :
			$date = DateTime::createFromFormat('m/d/Y', get_field('publication_date') );
			echo $date->format('F Y');
			endif; ?></p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_field( 'summary' ); ?>
		<?php if ( get_field( 'external_url' ) ) : ?>
			<p><a href="<?php the_field( 'external_url' ); ?>" target="_blank"><i class="fa fa-globe"></i>  <?php _e( 'Visit Resource Online', 'gei' ); ?></a></p>
		<?php endif; ?>
		<?php if ( get_field( 'file_download_url' ) ) : ?>
			<p><a href="<?php the_field( 'file_download_url' ); ?>" target="_blank">
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
					    case 'url':
					        echo '<i class="fa fa-file-code-o"></i>';
					    	break;
					}
				else :
					echo '<i class="fa fa-file-o"></i>';
				endif; ?> <?php _e( 'Download Resource', 'gei' ); ?></a></p>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php gei_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->