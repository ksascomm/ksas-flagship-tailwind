<?php
/**
 * Template part for displaying People content in single-people.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose' ); ?>>
	<div class="grid grid-cols-3 gap-4">

	<?php if ( is_singular( 'people' ) ) : ?>
		<div class="col-span-3">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		</div>
	<?php endif; ?>
		<div class="col-span-3 md:col-span-1">
			<div class="-mt-2">
				<?php flagship_tailwind_post_thumbnail(); ?>
			</div>
		</div>
		<div class="col-span-3 md:col-span-2">
		<?php if ( is_singular( 'people' ) ) : ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_position', true ) ) : ?>
				<h2 class="font-heavy font-bold"><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_position', true ) ); ?></h2>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( is_page_template( 'page-templates/people-directory.php' ) ) : ?>
			<h2 class="font-heavy font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<h3 class=""><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_position', true ) ); ?></h3>
		<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_office', true ) ) : ?>
				<span class="fas fa-map-marker-alt" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_office', true ) ); ?><br>
			<?php endif; ?>

			<?php if ( get_post_meta( $post->ID, 'ecpt_phone', true ) ) : ?>
				<span class="fas fa-phone-square-alt" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_phone', true ) ); ?><br>
			<?php endif; ?>

			<?php if ( get_post_meta( $post->ID, 'ecpt_fax', true ) ) : ?>
				<span class="fas fa-fax" aria-hidden="true"></span>  <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_fax', true ) ); ?><br>
			<?php endif; ?>

			<?php
			if ( get_post_meta( $post->ID, 'ecpt_email', true ) ) :
				$email = get_post_meta( $post->ID, 'ecpt_email', true );
				?>
				<span class="fas fa-envelope" aria-hidden="true"></span> <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge( $email ); ?>">

					<?php echo email_munge( $email ); ?> </a><br>
			<?php endif; ?>
		</div>
		<?php if ( is_singular( 'people' ) ) : ?>
		<div class="col-span-3">
			<?php echo get_post_meta( $post->ID, 'ecpt_bio', true ); ?>
		</div>
		<?php endif; ?>
	</div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'flagship-tailwind' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
