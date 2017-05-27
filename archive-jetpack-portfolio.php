<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	
<div class="wrap" style="margin-bottom: 2em;">

	<header class="page-header">
		<h1 class="page-title">All Projects</h1>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<p>Click once or tap twice on a thumbnail to see more information about that project.</p>
		<?php
		$num_columns = 3;
		$current_index = 0;

		// Show all projects in a grid.
		$all_projects = new WP_Query( array(
			'posts_per_page'      => -1,
			'post_type'           => 'jetpack-portfolio',
			'post_status'         => 'publish',
			'order'               => 'desc',
			'orderby'             => 'date',
		) );
		if ( $all_projects->have_posts() ) : ?>
			<div class="portfolio">
				<?php
				while ( $all_projects->have_posts() ) :
					$all_projects->the_post();
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
		<?php
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
