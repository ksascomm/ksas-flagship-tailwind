<?php
/**
 * Template part for displaying any upcoming deadlines in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>

<?php if ( have_rows( 'upcoming_deadline', 807 ) ) : ?>

<div class="bg-white border-t-4 border-blue rounded-b px-2 md:px-4 py-3 shadow-md mt-12 mb-4" role="alert">
	<div class="flex">
		<div>
			<p class="font-heavy font-bold text-xl"><?php the_field( 'deadline_heading' ); ?></p>
			<?php
			while ( have_rows( 'upcoming_deadline', 807 ) ) :
				the_row();
				?>
			<p class="text-lg">
				<a class="border-grey border-b-2 hover:border-grey-darkest hover:border-b-2 hover:border-solid" href="<?php echo wp_kses_post( get_sub_field( 'deadline_link' ) ); ?>">
					<?php echo wp_kses_post( get_sub_field( 'deadline_title' ) ); ?>: <?php echo wp_kses_post( get_sub_field( 'deadline_date' ) ); ?>
				</a>
			</p>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php else : ?>
	<?php // No rows found. ?>
<?php endif; ?>
