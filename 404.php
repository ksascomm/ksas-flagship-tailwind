<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Flagship_Tailwind
 */

get_header();
?>
<div class="flex flex-wrap md:flex-row-reverse p-4">
	<main id="primary" class="site-main w-full">
		<div class="breadcrumbs mb-4" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
		<section class="error-404 not-found prose">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'flagship-tailwind' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable', 'flagship-tailwind' ); ?></p>

				<p><?php _e( 'Please try the following:', 'flagship-tailwind' ); ?></p>

<ul>
				<li><?php _e( 'Check your spelling', 'flagship-tailwind' ); ?></li>
				<li>
					<?php
						/* translators: %s: home page url */
						printf(
							__(
								'Return to the <a href="%s">home page</a>',
								'flagship-tailwind'
							),
							home_url()
						);
						?>
				</li>
				<li><?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'flagship-tailwind' ); ?></li>
				<li>Try Searching:
				<ul class="search-404">
					<li>
					<form method="GET" action="<?php echo esc_html( site_url( '/search' ) ); ?>" role="search" aria-label="Mobile Menu Search" class="bg-white">
						<input type="text" value="<?php echo get_search_query(); ?>" name="q" class="text-primary pl-2 border-grey" id="mobile-search" placeholder="Search this site" aria-label="search"/>
						<label for="mobile-search" class="screen-reader-text">
							Search This Website
						</label>
						<button type="submit" class="bg-grey-lightest hover:bg-secondary text-primary font-sans hover:text-white py-2 px-4" aria-label="search">Search <span class="fa-solid fa-magnifying-glass"></span></button>
					</form>
					</li>
				</ul>
				</li>
			</ul>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div>
<?php
get_footer();
