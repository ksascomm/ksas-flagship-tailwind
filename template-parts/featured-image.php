<?php
/**
 * Template part for displaying featured images
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

if ( has_post_thumbnail( $post->ID ) || get_field( 'photoshelter_api' ) ) : ?>

<div class="w-full" role="banner">
	<div class="flex bg-white lg:bg-grey-cool lg:bg-opacity-50 featured-image-area">
		<div class="flex items-center text-center lg:text-left px-6 sm:w-full lg:w-2/5">
			<h1 class="tracking-tight leading-10 sm:leading-none entry-title">
				<?php the_title(); ?>
			</h1>
		</div>
		<div class="hidden lg:block lg:w-3/5 featured-image" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">

		<?php
		if ( has_post_thumbnail() ) :
				the_post_thumbnail(
					'full',
					array(
						'class' => 'h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full',
					)
				);
			else :
					// Otherwise, randomly display one of the following images.
					$theme = get_template_directory_uri();
					$bg    = array(
						$theme . '/dist/images/headers/flagship_sub_01.jpg',
						$theme . '/dist/images/headers/flagship_sub_02.jpg',
						$theme . '/dist/images/headers/flagship_sub_03.jpg',
						$theme . '/dist/images/headers/flagship_sub_04.jpg',
						$theme . '/dist/images/headers/flagship_sub_05.jpg',
						$theme . '/dist/images/headers/flagship_sub_06.jpg',
					);

					$i              = wp_rand( 0, count( $bg ) - 1 ); // Generate random number size of the array.
					$selected_image = "$bg[$i]"; // Set variable equal to which random filename was chosen.
					?>
				<img src="<?php echo esc_url( $selected_image ); ?>" alt="Generic Hero Image" class="h-56 w-full object-cover sm:h-72 lg:w-full lg:h-full">
						<?php
				endif;
			?>
		</div>
	</div>
</div>

				<?php
endif; ?>
