<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Global Engineering Initiative
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( !is_front_page() ) : the_title( '<h1 class="entry-title">', '</h1>' ); endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gei' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit This', 'gei' ), '<p class="edit-link">', '</p>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->