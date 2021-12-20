<?php
/**
 * Template Name: Front
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

get_header();
?>
	<div class="flex border-t border-blue hero bg-grey-cool bg-opacity-50 front-featured-image-area h-auto">
		<div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-2/5">
			<div>
				<h2 class="text-primary text-3xl md:text-3xl lg:text-4xl font-serif  tracking-tighter">
					<?php if ( have_rows( 'heading' ) ) : ?>
						<?php
						$repeater = get_field( 'heading' ); // Get the repeater field.
						$rand     = wp_rand( 0, ( count( $repeater ) - 1 ) ); // Randomize the rows.
						$message  = get_field( 'heading_text' );
						?>
						<?php echo esc_html( $repeater[ $rand ]['heading_text'] ); ?>
					<?php else : ?>
						<?php the_title(); ?>
					<?php endif; ?>
				</h2>
				<div class="mt-2 text-primary text-lg md:text-xl tracking-tight"><?php the_content(); ?></div>
				<?php get_template_part( 'template-parts/front-page/upcoming-deadlines' ); ?>
			</div>
		</div>
		<div class="hidden lg:block lg:w-3/5 front featured-image">
			<?php get_template_part( 'template-parts/photoshelter-api' ); ?>
		</div>
	</div>


	<section class="calls-to-action bg-white  border-b-2 border-grey" id="primary">
		<?php get_template_part( 'template-parts/front-page/find-program' ); ?>
		<?php get_template_part( 'template-parts/front-page/statistics' ); ?>
	</section>

	<section class="interactive relative pb-20 bg-grey-lightest">
		<?php get_template_part( 'template-parts/front-page/news-section' ); ?>

		<?php get_template_part( 'template-parts/front-page/social-wall' ); ?>
	</section>

	<section class="highlights relative bg-white">
		<div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px;"><svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0"><polygon class="text-white fill-white" points="2560 0 2560 100 0 100"></polygon></svg></div>
		<?php get_template_part( 'template-parts/front-page/magazine-api' ); ?>

		<?php get_template_part( 'template-parts/front-page/giving-section' ); ?>
	</section>


<?php
get_footer();
