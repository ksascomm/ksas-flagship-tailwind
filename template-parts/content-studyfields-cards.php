<?php
/**
 * Template part for displaying study fields cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>

<?php
$program_types = get_the_terms( $post->ID, 'program_type' );
if ( $program_types && ! is_wp_error( $program_types ) ) :
	$program_type_names = array();
	foreach ( $program_types as $program_type ) {
		$program_type_names[] = $program_type->slug;
	}
	$program_type_name = join( ' ', $program_type_names );
endif;
?>
<div class="p-2 w-full md:w-1/3 <?php echo esc_html( $program_type_name ); ?> item">
	<div class="h-full rounded-lg overflow-hidden field">
		<div class="p-8">
			<h1 class="title-font text-xl font-heavy font-bold mb-3">
				<?php if ( 'Pre-Med' === $post->post_title ) : ?>
					<a class="field-text-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				<?php else : ?>
					<a class="field-text-link" href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_homepage', true ) ); ?>"><?php the_title(); ?></a>
				<?php endif; ?>
			</h1>
			<p class="leading-relaxed mb-3">
				<?php if ( get_post_meta( $post->ID, 'ecpt_emailaddress', true ) ) : ?>
					<span class="fa-solid fa-envelope"></span>
					<a href="mailto:<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_emailaddress', true ) ); ?>">
						<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_emailaddress', true ) ); ?>
					</a>
				<?php endif; ?>
			</p>
			<div class="flex items-center flex-wrap ">
				<?php if ( get_post_meta( $post->ID, 'ecpt_majors', true ) ) : ?>
					<span class="inline-block text-primary border-primary border-solid border-2 bg-white font-heavy font-bold text-lg px-2 mx-1">Major</span>
				<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'ecpt_minors', true ) ) : ?>
					<span class="inline-block text-primary border-primary border-solid border-2 font-heavy font-bold text-lg px-2 mx-1">Minor</span>
				<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'ecpt_degreesoffered', true ) ) : ?>
					<span class="inline-block text-white bg-primary  border-solid border-2 font-heavy font-bold text-lg px-2 mx-1"><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_degreesoffered', true ) ); ?></span>
				<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'ecpt_pcitext', true ) ) : ?>
					<p class="text-base pt-2"><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_pcitext', true ) ); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<span class="hidden"><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_keywords', true ) ); ?></span>
	</div>
</div>
