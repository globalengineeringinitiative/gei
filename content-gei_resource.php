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
	'gei_type',
) );
$post_class = '';
foreach ( $terms as $term ) {
	$post_class .= $term->slug . ' ';
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( rtrim ( $post_class ) ); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gei_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gei' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gei' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php gei_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->