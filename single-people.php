<?php
/**
 * The template for displaying all single People custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Flagship_Tailwind
 */

get_header();
?>

<div class="flex flex-wrap md:flex-row-reverse p-1 sm:p-2 md:p-4"  data-aos="fade-in" data-aos-once="true">
	<main id="primary" class="site-main w-full lg:w-4/5">
		<div class="breadcrumbs mb-4" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'people' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php
	get_sidebar();
	?>
</div>
<?php
get_footer();
