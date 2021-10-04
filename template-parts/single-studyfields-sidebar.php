<?php
/**
 * Template part for displaying sidebar on Study Fields CPT
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<div class="sidebar-menu text-blue" aria-labelledby="sidebar-navigation">
	<h1 class="font-semi text-xl text-black mb-4" id="sidebar-navigation">Also in <a href="<?php echo esc_url( get_home_url() ); ?>/academics/" aria-label="Sidebar Menu: Academics">Academics</a></h1>
	<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'menu-1',
				'menu_class'      => 'nav',
				'container_class' => '',
				'submenu'         => 'Academics',
				'depth'           => 2,
				'items_wrap'      => '<ul class="%2$s" aria-label="Sidebar Menu">%3$s</ul>',
			)
		);
		?>

		<?php $field = get_post_meta( $post->ID, 'ecpt_field_level', true ); ?>
		<div class="ecpt-page-sidebar widget">
			<h1 class="text-xl py-2 text-black leading-tight">
				<label for="jump">
					<?php if ( ( 'undergraduate' === $field ) || ( 'full-graduate' === $field ) ) : ?>
						Other Undergraduate, Master's, and Doctorate Programs
					<?php elseif ( 'part-graduate' === $field ) : ?>
						Other Professional Master’s and Certificate Programs
					<?php endif; ?>
				</label>
			</h1>
			<select class="w-full h-8 text-lg text-black mt-4 mb-8" name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
			<option>--<?php the_title(); ?></option>
			<?php
			if ( ( 'undergraduate' === $field ) || ( 'full-graduate' === $field ) ) :
				?>

					<?php
					$jump_menu_undergrad_query = new WP_Query(
						array(
							'post_type'      => 'studyfields',
							'orderby'        => 'title',
							'order'          => 'ASC',
							'posts_per_page' => -1,
							'tax_query'      => array(
								array(
									'taxonomy' => 'program_type',
									'field'    => 'slug',
									'terms'    => array( 'undergrad_program', 'full_time_program' ),
								),
							),
						)
					);
					while ( $jump_menu_undergrad_query->have_posts() ) :
						$jump_menu_undergrad_query->the_post();
						?>
						<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
				<?php endwhile; ?>

			<?php else : ?>

				<?php
				$jump_menu_part_grad_query = new WP_Query(
					array(
						'post_type'      => 'studyfields',
						'orderby'        => 'title',
						'order'          => 'ASC',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy' => 'program_type',
								'field'    => 'slug',
								'terms'    => 'part_time_program',
							),
						),
					)
				);
				while ( $jump_menu_part_grad_query->have_posts() ) :
					$jump_menu_part_grad_query->the_post();
					?>
					<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
				<?php endwhile; ?>

			<?php endif; ?>
			</select>
		</div>
</div>
