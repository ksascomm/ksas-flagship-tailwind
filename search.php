<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Flagship_Tailwind
 */

get_header();
?>
<div class="flex flex-wrap p-4">
	<main id="primary" class="site-main w-full lg:w-4/5">
		<div class="breadcrumbs mb-4" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
		<header class="prose">
			<h1>
				<?php
				/* translators: %s: search query. */
				_e( 'Search Results', 'flagship-tailwind' );
				?>
			</h1>
		</header><!-- .page-header -->

		<gcse:search></gcse:search>

	</main><!-- #main -->
</div>
<?php
get_footer();
