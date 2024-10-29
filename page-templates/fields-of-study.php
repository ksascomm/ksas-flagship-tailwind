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

		<form class="study-fields bg-grey-lightest border-solid border-grey border-2 p-4 mb-4" id="filters">
			<fieldset class="flex flex-col md:flex-row">
				<legend class="text-2xl font-heavy font-bold mb-2">Filter our fields of study by program type</legend>
				<button class="all bg-primary text-white hover:bg-white hover:text-primary is-checked" data-filter="*" aria-label="View All Programs">View All</button>
				<button class="undergrad bg-secondary text-white hover:bg-white hover:text-secondary" data-filter=".undergrad_program" aria-label="Sort Undergraduate Programs" href="javascript:void(0)">Undergraduate</button>
				<button class="full-time bg-blue-light text-primary hover:bg-white hover:text-primary hover:border-blue-light" data-filter=".full_time_program" aria-label="Sort Master's & Doctorates Programs" href="javascript:void(0)">Master's & Doctorates</button>
				<button class="part-time button bg-blue-lightest text-primary hover:bg-white hover:text-primary hover:border-blue-lighest" data-filter=".part_time_program" aria-label="Sort Professional Master’s and Certificates (AAP)" href="javascript:void(0)">Professional Master’s and Certificates (AAP)</button>
			</fieldset>
			<fieldset class="w-auto search-form my-2 px-2">
				<legend class="mt-4 mb-2 text-2xl font-heavy font-bold">Search by major/minor name, area of study, or description</legend>
				<label class="sr-only" for="id_search">Enter term</label>
				<input class="w-3/4 lg:w-7/12 quicksearch rounded-r-lg p-2 border-t border-b border-r bg-white" type="text" name="search" id="id_search" aria-label="Search Fields of Study" placeholder="Enter major/minor name, area of study, or description keyword"/>
			</fieldset>
		</form>

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
		<section class="fields-of-study loading" id="isotope-list" >

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
