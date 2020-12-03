<?php
/**
 * Template part for displaying featured images
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

if ( has_post_thumbnail( $post->ID ) || get_field( 'photoshelter_api' ) ) : ?>

<div class="w-full">
	<div class="flex bg-white lg:bg-grey-cool lg:bg-opacity-50 featured-image-area">
		<div class="flex items-center text-center lg:text-left px-6 sm:w-full lg:w-2/5">
			<h1 class="tracking-tight leading-10 sm:leading-none entry-title">
				<?php the_title(); ?>
			</h1>
		</div>
		<div class="hidden lg:block lg:w-3/5 featured-image" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">

		<?php if ( get_field( 'photoshelter_api' ) == 1 ) :

			get_template_part( 'template-parts/photoshelter-api' );

			else :
				the_post_thumbnail(
					'full',
					array(
						'class' => 'h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full'
					)
				);
			endif;
			?>
		</div>
	</div>
</div>

	<?php
endif; ?>
