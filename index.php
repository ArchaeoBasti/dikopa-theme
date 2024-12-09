<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		    'post_status' => 'future',
		    'category_name' => 'Vortragsankündigung',
		);
		$arr_posts = new WP_Query( $args );

		if ( $arr_posts->have_posts() ) :
		?>
			<div class="loop-title">
				<h1>Vortragsankündigung</h1>
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
				//the_posts_navigation();
		    wp_reset_postdata();

		endif;
?>


		<?php query_posts('cat=-'.get_cat_ID( "Vortragsankündigung" )); ?>
		<div class="loop-title">
			<h1>What's new?</h1>
		</div>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
