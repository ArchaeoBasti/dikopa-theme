<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dikopa-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('dikopa-single'); ?>>
	<div class="post-thumbnail-container">
		<?php dikopa_theme_post_thumbnail(); ?>
	</div>
	<div class="post-entry-container">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
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
			the_content();

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
