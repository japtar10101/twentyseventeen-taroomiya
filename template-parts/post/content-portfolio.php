<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<div class="portfolio-content">
	<div class="front"> 
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail('portfolio-thumbnail'); ?>
		</a>
	</div>
	<div class="back">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<h4><?php echo get_the_title(); ?></h4>
		</a>
	</div>
</div>
