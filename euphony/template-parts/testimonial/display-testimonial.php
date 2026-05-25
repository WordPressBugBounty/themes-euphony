<?php
/**
 * The template for displaying testimonial items
 *
 * @package Euphony
 */
?>

<?php
$enable = get_theme_mod( 'euphony_testimonial_option', 'disabled' );

if ( ! euphony_check_section( $enable ) ) {
	// Bail if featured content is disabled
	return;
}

// Get Jetpack options for testimonial.
$jetpack_defaults = array(
	'page-title' => esc_html__( 'Testimonials', 'euphony' ),
);

// Get Jetpack options for testimonial.
// Jetpack 14.2+ stores archive title/content as a theme_mod array (jetpack_testimonials).
// Fall back to the old flat WP option for sites that have not migrated yet.
$jetpack_testimonials = (array) get_theme_mod( 'jetpack_testimonials', array() );
$headline    = ! empty( $jetpack_testimonials['page-title'] ) ? $jetpack_testimonials['page-title'] : get_option( 'jetpack_testimonial_title', esc_html__('Testimonials', 'euphony') );
$subheadline = ! empty( $jetpack_testimonials['page-content'] ) ? $jetpack_testimonials['page-content'] : get_option( 'jetpack_testimonial_content');

$classes[] = 'section testimonial-content-section';

if ( ! $headline && ! $subheadline ) {
	$classes[] = 'no-headline';
}
?>

<div id="testimonial-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">

	<?php if ( $headline || $subheadline ) : ?>
		<div class="section-heading-wrapper testimonial-content-section-headline">
		<?php if ( $headline ) : ?>
			<div class="section-title-wrapper">
				<h2 class="section-title"><?php echo wp_kses_post( $headline ); ?></h2>
			</div><!-- .section-title-wrapper -->
		<?php endif; ?>

		<?php if ( $subheadline ) : ?>
			<div class="section-description-wrapper section-subtitle">
				<?php
	            $subheadline = apply_filters( 'the_content', $subheadline );
	            echo str_replace( ']]>', ']]&gt;', $subheadline );
                ?>
			</div><!-- .section-description-wrapper -->
		<?php endif; ?>
		</div><!-- .section-heading-wrapper -->
	<?php endif; ?>

		<div class="section-content-wrapper testimonial-content-wrapper testimonial-slider owl-carousel owl-dots-enabled">
			<?php get_template_part( 'template-parts/testimonial/post-types', 'testimonial' ); ?>
		</div><!-- .section-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- .testimonial-content-section -->
