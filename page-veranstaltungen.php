<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dikopa-theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php
		$args = array(
		    'post_type' => 'post',
		    'post_status' => 'publish',
		    'category_name' => 'Vortragsankündigung',
		);
		$arr_posts = new WP_Query( $args );

		if ( $arr_posts->have_posts() ) :
		?>
			<div class="loop-title">
				<h1>Vergangene und anstehende Veranstaltungen</h1>
			</div>
		<?php
		    while ( $arr_posts->have_posts() ) :
		        $arr_posts->the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

		    endwhile;
				the_posts_navigation();
		    wp_reset_postdata();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
