<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dikopa-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('dikopa-single'); ?>>
	<?php dikopa_theme_post_thumbnail(); ?>

	<div class="loop-title loop-title-bottom">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>

	<div class="post-entry-container">
		<div class="entry-content">
			<?php
			the_content();

			?>
		</div><!-- .entry-content -->
	</div><!-- .post-entry-container -->

</article><!-- #post-<?php the_ID(); ?> -->
