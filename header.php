<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flagship_Tailwind
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script>
	!function(a,b,c,d,e,f,g){a.GoogleAnalyticsObject=e,a[e]=a[e]||function(){(a[e].q=a[e].q||[]).push(arguments)},a[e].l=1*new Date,f=b.createElement(c),g=b.getElementsByTagName(c)[0],f.async=1,f.src=d,g.parentNode.insertBefore(f,g)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-40512757-1","jhu.edu"),ga("send","pageview");
	</script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5VTN64C');</script>
	<!-- End Google Tag Manager -->
	<meta name="facebook-domain-verification" content="s1lj448peh4wqw24bgcc5f2t6n23tc" />
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'flagship-tailwind' ); ?></a>

	<header id="masthead" class="bg-blue text-white flex flex-col text-center content-center md:flex-row sm:text-left sm:justify-between sm:items-baseline w-full py-4 lg:py-0">
		<div class="flex flex-col md:flex-row self-center">
			<div class="h-auto shield">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Krieger School of Arts & Sciences">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/krieger.logo.cropped.svg" class="h-auto w-full p-5" alt="KSAS Shield">
				</a>
			</div>
		</div>
		<div class="sm:mb-0 self-center text-lg font-sans">
			<div class="flex flex-col md:flex-row-reverse lg:my-8 lg:px-2">
				<a class="py-2 px-3 hover:bg-blue-light sm:my-4 md:my-0 text-base text-center" href="/academics/apply/">Admissions <span class="fa-solid fa-landmark-dome"></span></a>
				<div class="lg:mr-4">
					<form method="GET" action="<?php echo esc_url( site_url( '/search' ) ); ?>" role="search" aria-label="Site Search" class="bg-white shadow-sm site-search sm:mb-2 lg:mb-0">
						<input type="text" value="<?php echo get_search_query(); ?>" name="q" class="text-primary pl-2 text-sm" id="mobile-search" placeholder="Search this site" aria-label="search"/>
						<label for="mobile-search" class="screen-reader-text">
							Search This Website
						</label>
						<button type="submit" class="bg-grey-lightest hover:bg-secondary text-primary text-sm font-sans hover:text-white py-2 px-4 border border-transparent hover:border-solid hover:border-white" aria-label="search">Search <span class="fa-solid fa-magnifying-glass"></span></button>
					</form>
				</div>
			</div>
			<div role="navigation">
				<ul id="default-menu" class="flex text-white flex-col md:flex-row" aria-label="<?php _e( 'Main Menu', 'textdomain' ); ?>">
					<li class="grow lg:mr-2">
						<a href="<?php echo esc_url( site_url( '/academics/departments-programs-and-centers/' ) ); ?>" class="text-center block hover:bg-blue-light py-2 px-4 ">Departments & Programs</a>
					</li>
					<li class="grow lg:mr-2">
						<a href="<?php echo esc_url( site_url( '/academics/majors-minors/' ) ); ?>" class="text-center block hover:bg-blue-light py-2 px-4 ">Majors & Minors</a>
					</li>
					<li class="grow lg:mr-2">
						<a href="<?php echo esc_url( site_url( '/academics/fields/' ) ); ?>" class="text-center block hover:bg-blue-light py-2 px-4 ">Fields of Study</a>
					</li>
					<li class="grow lg:mr-2">
						<a href="#" class="text-center block openSideNav hover:bg-blue-light py-2 px-4" aria-label="Menu" aria-controls="offCanvasTop1">Menu <span class="fa-solid fa-bars"></span></a>
					</li>
				</ul>
			</div>
		</div>

		<!-- .site-branding -->


		<nav class="text-white overlay site-navigation" role="navigation" id="offCanvasTop1">
			<a href="javascript:void(0)" class="closeBtn" aria-label="Close menu" type="button"><span class="fa-solid fa-square-xmark"></span></a>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'menu_class'     => 'flex flex-wrap main-navigation overlay-content',
					// 'walker'         => new Aria_Walker_Nav_Menu(),
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
