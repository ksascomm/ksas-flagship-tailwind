<?php
/**
 * Template Name: Fields of Study
 *
 * The template for displaying Fields of Study custom post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

get_header();
?>
<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="flex flex-wrap md:flex-row-reverse p-1 sm:p-2 md:p-4">
	<main id="primary" class="site-main w-full lg:w-4/5">
		<div class="breadcrumbs mb-4" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>

		<?php
		if ( have_posts() ) :
			?>
			<?php if ( ! has_post_thumbnail( $post->ID ) ) : ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			<?php endif; ?>

			<?php


			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
		endif;
		?>

		<div class="study-fields bg-grey-lightest border-solid border-grey border-2 p-4 mb-4" role="region" aria-label="Filters">
			<div class="flex flex-col md:flex-row" id="filters">
				<a class="all button bg-primary text-white hover:bg-white hover:text-primary" href="javascript:void(0)" data-filter="*" aria-label="View All Programs">View All</a>
				<a class="undergrad button bg-secondary text-white hover:bg-white hover:text-secondary" href="javascript:void(0)" data-filter=".undergrad_program" aria-label="Sort Undergraduate Programs">Undergraduate</a>
				<a class="full-time button bg-blue-light text-primary hover:bg-white hover:text-primary hover:border-blue-light" href="javascript:void(0)" data-filter=".full_time_program" aria-label="Sort Master's & Doctorates Programs">Master's & Doctorates</a>
				<a class="part-time button bg-blue-lightest text-primary hover:bg-white hover:text-primary hover:border-blue-lighest" href="javascript:void(0)" data-filter=".part_time_program" aria-label="Sort Professional Master’s and Certificates (AAP)">Professional Master’s and Certificates (AAP)</a>
			</div>
			<h4 class="py-4 text-2xl">
				<label class="heading" for="id_search">Search our fields of study by keyword:</label>
			</h4>
			<div class="w-auto">
				<input class="w-3/4 quicksearch rounded-r-lg p-2 border-t border-b border-r bg-white" type="text" name="search" id="id_search" aria-label="Search Fields of Study" placeholder="Enter major/minor, area of study, or description keyword"/>
			</div>
		</div>

		<?php
			$flagship_studyfields_query = new WP_Query(
				array(
					'post_type'      => 'studyfields',
					'orderby'        => 'title',
					'order'          => 'ASC',
					'posts_per_page' => 100,
				)
			);

			if ( $flagship_studyfields_query->have_posts() ) :
				?>
		<section class="fields-of-study loading"  id="isotope-list" >

			<div class="container px-5 py-24 mx-auto">
				<div class="flex flex-wrap -m-4">
					<?php
					while ( $flagship_studyfields_query->have_posts() ) :
						$flagship_studyfields_query->the_post();

						get_template_part( 'template-parts/content', 'studyfields-cards' );

					endwhile;
					?>
				</div>
			</div>
		</section>
				<?php
		endif;
			// End of the loop.
			?>
		<?php
		// Return to main loop.
		wp_reset_postdata();
		?>
	</main><!-- #main -->

<?php
get_sidebar();
?>
</div>
<?php
get_footer();
