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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'flagship-tailwind' ); ?></a>

	<header id="site-header" class="header-footer-group justify-between shadow sm:items-baseline w-full bg-blue content-center md:flex-row sm:text-left" role="banner">
		<div class="header-titles-wrapper">
			<div class="header-inner section-inner">
				<div class="header-titles sm:grid sm:grid-cols-1 sm:gap-x-12 lg:flex lg:justify-between">
					<div class="flex flex-col md:flex-row self-center">
						<div class="h-auto shield mx-auto mb-4 lg:mb-0">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/krieger.logo.cropped.svg" class="h-auto w-full p-5" alt="KSAS Shield, to the homepage">
							</a>
						</div>
					</div>
					<div class="desktop-menu sm:mb-0 self-center text-lg font-sans">
						<div class="flex flex-col md:flex-row-reverse my-4 lg:my-8 lg:px-2">
							<a class="py-2 px-3 hover:bg-blue-light sm:my-4 md:my-0 text-base text-center text-white" href="/academics/apply/">Admissions <span class="fa-solid fa-landmark-dome"></span></a>
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
							<ul id="default-menu" class="flex flex-row text-white mt-0" aria-label="<?php _e( 'Main Menu', 'textdomain' ); ?>">
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
									<button class="mx-auto block menu-btn hover:bg-blue-light py-2 px-4 border-transparent  active:bg-blue-light focus:outline-none focus:ring focus:ring-blue-light hover:border-transparent" aria-label="Menu" aria-controls="offCanvasTop1">Menu <span class="fa-solid fa-bars"></span></button>
								</li>
							</ul>
						</div>
					</div>
					<nav class="desktop-overlay-menu site-navigation desktop-overlay" role="dialog" id="fullscreenMenu">
						<button class="close-btn border border-white" aria-label="Close">
							Close
							<span class="text-2xl" aria-hidden="true">×</span>
						</button>
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
				</div><!-- .header-titles -->
				<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false" type="button">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg( 'search' ); ?>
						</span>
						<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'ksas-blocks' ); ?></span>
					</span>
				</button><!-- .search-toggle -->
				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle" type="button">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
						</span>
						<span class="toggle-text"><?php _e( 'Menu', 'ksas-blocks' ); ?></span>
					</span>
				</button><!-- .nav-toggle -->
			</div><!-- .header-inner -->
		</div><!-- .header-titles-wrapper -->
		<?php
			get_template_part( 'inc/modal-search' );
		?>
	</header><!-- #site-header -->
	<?php
	get_template_part( 'inc/modal-menu' );
