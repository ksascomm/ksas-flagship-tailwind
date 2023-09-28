<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flagship_Tailwind
 */

?>

<aside id="secondary" class="sidebar widget-area w-full lg:w-1/5 ">
<?php
	global $post; // Setup the global variable $post.
	// Get the top-level page slug for sidebar/widget content conditionals.
	$ancestors      = get_post_ancestors( $post->ID ); // Get the array of ancestors.
	$ancestor_id    = ( $ancestors ) ? $ancestors[ count( $ancestors ) - 1 ] : $post->ID;
	$the_ancestor   = get_page( $ancestor_id );
	$ancestor_url   = get_permalink( $the_ancestor );
	$ancestor_title = $the_ancestor->post_title;

if ( is_page() && $post->post_parent ) {
	// Make sure we are on a page and that the page is a parent.
	$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
} else {
	$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
}
if ( $kiddies ) :
	?>

		<div class="sidebar-menu text-blue">
			<h1 class="font-semi text-xl text-black mb-4">Also in
			<?php if ( is_home() ) : ?>
				<a href="<?php echo esc_url( get_home_url() ); ?>/about/" aria-label="Sidebar Menu: About">About</a>
			<?php else : ?>
				<a href="<?php echo esc_url( $ancestor_url ); ?>" aria-label="Sidebar Menu: <?php echo esc_html( $ancestor_title ); ?>" class="border-dotted border-b-2 border-grey"><?php echo esc_html( $ancestor_title ); ?></a>
			<?php endif; ?>
			</h1>
			<?php if ( is_page_template( 'page-templates/outside-ia.php' ) ) : ?>
				<ul class="nav">
					<?php echo $kiddies; ?>
				</ul>
			<?php else : ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'menu-1',
						'menu_class'      => 'nav',
						'container_class' => '',
						'sub_menu'        => true,
					)
				);
				?>
			<?php endif; ?>
			</div>

	<?php endif; ?>

	<?php if ( is_home() || is_single() && ! is_singular( array( 'studyfields', 'tribe_events', 'people', 'testimonial' ) ) ) : ?>
		<div class="sidebar-menu text-blue">
			<h1 class="font-semi text-xl text-black mb-4">Also in <a href="<?php echo esc_url( get_home_url() ); ?>/about/" aria-label="Sidebar Menu: About">About</a></h1>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_class'     => 'nav',
					'submenu'        => 'About',
					'depth'          => 2,
					'items_wrap'     => '<ul class="%2$s" aria-label="Sidebar Menu">%3$s</ul>',
				)
			);
		?>
		</div>
	<?php endif; ?>

	<?php if ( is_singular( 'people' ) ) : ?>
		<?php get_template_part( 'template-parts/single-people-sidebar' ); ?>
	<?php endif; ?>

	<?php if ( is_singular( 'studyfields' ) ) : ?>
		<?php get_template_part( 'template-parts/single-studyfields-sidebar' ); ?>
	<?php endif; ?>

	<!-- Start Page Specific Sidebar -->
	<?php if ( is_page() && get_post_meta( $post->ID, 'ecpt_page_sidebar', true ) ) : ?>
		<div class="ecpt-page-sidebar widget prose">
			<?php
			wp_reset_postdata();
			echo apply_filters( 'the_content', get_post_meta( $post->ID, 'ecpt_page_sidebar', true ) );
			?>
		</div>
	<?php endif; ?>
	<!-- End Page Specific Sidebar -->

</aside><!-- #secondary -->

