<?php
/**
 * The template for displaying services posts on the front page
 *
 * @package Euphony
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hentry-inner">
		<?php 

		if ( $media_id = get_post_meta( $post->ID, 'ect-alt-featured-image', true ) ) {
				$title_attribute = the_title_attribute( 'echo=0' ); 
				// Get alternate thumbnail from CPT meta.
				?> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php echo wp_get_attachment_image( $media_id, 'euphony-service', false,  array( 'title' => $title_attribute, 'alt' => $title_attribute ) ); ?> </a> <?php
			} elseif ( has_post_thumbnail() ) { 
				euphony_post_thumbnail( 'euphony-service', 'html', true, true ); 
			}

		?>

		<div class="entry-container">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>' ); ?>
			</header>
			<?php
				$excerpt = get_the_excerpt();

				echo '<div class="entry-summary"><p>' . $excerpt . '</p></div><!-- .entry-summary -->';
			?>
		</div><!-- .entry-container -->
	</div> <!-- .hentry-inner -->
</article> <!-- .article -->
