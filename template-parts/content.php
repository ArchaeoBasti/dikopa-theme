<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dikopa-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-thumbnail-container">
		<?php dikopa_theme_post_thumbnail(); ?>
	</div>
	<div class="post-entry-container">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<table style="width: 100%; margin: 0; padding: 0;">
				<tr><td align="left">
					<?php
					dikopa_theme_posted_on();
					?>
				</td><td align="right">
					<?php
					dikopa_theme_posted_by();
					?>
				</td></tr>
			</table>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<div class="entry-content">
			<?php
			the_excerpt(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dikopa-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dikopa-theme' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div><!-- .post-entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->
