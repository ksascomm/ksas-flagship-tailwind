<?php
/**
 * Template part for displaying sidebar on People CPT
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<div class="sidebar-menu text-blue" aria-labelledby="sidebar-navigation">
	<h1 class="font-semi text-xl text-black mb-4" id="sidebar-navigation">Also in <a href="<?php echo esc_html( get_home_url() ); ?>/people/" aria-label="Sidebar Menu: People">People</a></h1>
	<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'menu-1',
				'menu_class'      => 'nav',
				'container_class' => '',
				'submenu'         => 'People',
				'depth'           => 2,
				'items_wrap'      => '<ul class="%2$s" role="menu" aria-label="Sidebar Menu">%3$s</ul>',
			)
		);
		if ( has_term( '', 'role' ) && ! has_term( 'job-market-candidate', 'role' ) ) :
			?>
	<div class="ecpt-page-sidebar widget">
		<label for="jump">
			<h1 class="text-xl py-2 text-black">View Other Profiles</h1>
		</label>
		<select class="w-full h-8 text-lg text-black mt-4 mb-8" name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
				<option>---<?php the_title(); ?></option>
					<?php
				endwhile;
			endif;
			?>

			<?php
			$jump_menu_query = new WP_Query(
				array(
					'post-type' => 'people',
					'role'      => 'leadership',
					'meta_key'  => 'ecpt_people_alpha',
					'orderby'   => 'meta_value',
					'order'     => 'ASC',
				)
			);
			?>

			<?php
			while ( $jump_menu_query->have_posts() ) :
				$jump_menu_query->the_post();
				?>
				<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>

				<?php endwhile; ?>
		</select>
	</div>
	<?php endif; ?>
</div>
