<?php
/**
 * Template part for displaying news section content in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<section class="flex flex-wrap px-5 py-12">
	<div class="w-full p-4">
		<div class="grid grid-cols-2 gap-4 divide-x divide-grey-lightest">
			<div class="col-span-2 lg:col-span-1">
			<h1 class="sm:text-3xl text-2xl font-serif">KSAS Spotlight</h1>
			<?php
			$homepage_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => '1',
				)
			);
			if (
			$homepage_query->have_posts() ) :
				while ( $homepage_query->have_posts() ) :
					$homepage_query->the_post();
					?>
				<article class="hub news bg-white shadow-xl rounded-lg">
					<?php
					the_post_thumbnail(
						'full',
						[
							'class' => 'h-64 w-full object-cover',
							'alt'   => get_the_title(),
						]
					);
					?>
					<div class="px-6 py-2">
						<div class="h-full flex items-start">
							<div class="hidden md:flex w-12 flex-skrink md:flex-shrink-0 flex-col text-center leading-none">
								<span class="text-primary pb-2 mb-2 border-b-2">
								<?php echo get_the_date( 'M' ); ?>
								</span>
								<span class="font-medium text-xl text-primary title-font">
								<?php echo get_the_date( 'j' ); ?>
								</span>
							</div>
							<div class="grow md:pl-6">
								<h1 class="text-2xl leading-tight font-heavy font-bold mb-4">
								<?php if ( get_post_meta( $post->ID, 'ecpt_location', true ) ) : ?>
									<a href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_location', true ) ); ?>" target="_blank" class="button" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								<?php else : ?>
									<a href="<?php the_permalink(); ?>" class="button" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								<?php endif; ?>
								</h1>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</article>
					<?php
				endwhile;
			endif;
			?>
			</div>
			<div class="col-span-2 lg:col-span-1 pl-4">
				<?php get_template_part( 'template-parts/front-page/hub-api' ); ?>
			</div>
		</div>
	</div>
</section>
