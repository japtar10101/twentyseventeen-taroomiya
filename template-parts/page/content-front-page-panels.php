<?php
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $twentyseventeencounter;

?>

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
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'See more<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) :

				// Show four most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				if ( $recent_posts->have_posts() ) : ?>
				<div class="recent-posts">
					<?php
					while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
						get_template_part( 'template-parts/post/content', 'excerpt' );
					endwhile;
					wp_reset_postdata();
					?>
				</div><!-- .recent-posts -->
			<?php endif;
			// Show recent projects if is a portfolio page
			elseif ( $post->post_name === 'portfolio'  ) :
				// TODO: use const 'jetpack_portfolio_posts_per_page' to retrieve number of posts from the theme's own settings
				$num_posts = 12;
				$num_columns = 3;
				$current_index = 0;

				// Show 6 most recent projects.
				$recent_projects = new WP_Query( array(
					'posts_per_page'      => $num_posts,
					'post_type'           => 'jetpack-portfolio',
					'post_status'         => 'publish',
					'order'               => 'desc',
					'orderby'             => 'date',
				) );
				if ( $recent_projects->have_posts() ) : ?>
				<div class="portfolio">
					<?php
					while ( $recent_projects->have_posts() ) :
						$recent_projects->the_post();
						get_template_part( 'template-parts/post/content', 'portfolio' );
						++$current_index;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
				<script type="text/javascript">
				(function($){
				  $(".portfolio-content").flip({
					trigger: "hover"
				  });
				})(jQuery);
				</script>
				<?php endif;
			endif; ?>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
