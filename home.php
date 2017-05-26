<?php
/**
 * The blog page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 0.1
 * @version 0.1
 */

get_header(); ?>

<div class="wrap">
	<header class="page-header">
		<h1 class="page-title">Blog</h1>
	</header><!-- .page-header -->
		

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// Check if we have any blog posts
			if ( have_posts() ) :
			
				// If so, go through each one
				while ( have_posts() ) : the_post();
				
					// Post the full blog post
					get_template_part( 'template-parts/post/content' );
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
				
				// Changing the posts
				the_posts_pagination( array(
					'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				) );
			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer();
