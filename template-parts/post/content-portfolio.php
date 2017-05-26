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
		<?php the_post_thumbnail('portfolio-thumbnail'); ?>
	</div>
	<div class="back">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail('portfolio-thumbnail'); ?>
			<div class="portfolio-info">
				<h4><?php echo get_the_title(); ?></h4>
				<?php
					$terms = get_the_terms( $post->ID, 'jetpack-portfolio-type' );
					$add_comma = false;
					if ( $terms ) :
				?>
				<p class="portfolio-types">
					<?php
						foreach ( $terms as $term ) :
							if ( $add_comma ) :
								echo ', ';
							endif;
							echo $term->name;
							$add_comma = true;
						endforeach;
					?>
				</p>
				<?php
					endif;
				?>
				<?php
					$terms = get_the_terms( $post->ID, 'jetpack-portfolio-tag' );
					$add_comma = false;
					if ( $terms ) :
				?>
				<p class="portfolio-tags">
					<?php
						foreach ( $terms as $term ) :
							if ( $add_comma ) :
								echo ', ';
							endif;
							echo $term->name;
							$add_comma = true;
						endforeach;
					?>
				</p>
				<?php
					endif;
				?>
			</div>
		</a>
	</div>
</div>
