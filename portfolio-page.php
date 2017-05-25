<?php
/**
 * Template Name: Portfolio
 * Description: The template for displaying pages with a grid of portfolio items
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @subpackage Twenty_Seventeen_TaroOmiya
 * @since 0.1
 * @version 0.1
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >
				<?php if ( has_post_thumbnail() ) :
					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

					// Calculate aspect ratio: h / w * 100%.
					$ratio = $thumbnail[2] / $thumbnail[1] * 100;
					?>

					<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
						<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
					</div><!-- .panel-image -->

				<?php endif; ?>

				<div class="panel-content">
					<div class="wrap">
						<header class="entry-header">
							<?php the_title( '<h2 class="entry-title" id="' . $post->post_name . '">', '</h2>' ); ?>

							<?php twentyseventeen_edit_link( get_the_ID() ); ?>

						</header><!-- .entry-header -->

						<div class="entry-content">
							Section currently in development...
							<?php
								/* translators: %s: Name of current post */
								//the_content( sprintf(
								//	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
								//	get_the_title()
								//) );
							?>
						</div><!-- .entry-content -->
					</div><!-- .wrap -->
				</div><!-- .panel-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
