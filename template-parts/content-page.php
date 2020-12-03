<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose' ); ?>>

<?php if ( ! has_post_thumbnail( $post->ID ) && get_field( 'photoshelter_api' ) == 0 ) : ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

<?php endif; ?>

	<div class="entry-content">

		<?php if (is_page( 'covid19' ) || '13265' == $post->post_parent ) : ?>
			<div class="callout warning">
				<p>Page last modified: <strong><?php the_modified_time( 'F j, Y' ); ?> at <?php the_modified_time( 'g:i a' ); ?></strong></p>
			</div>
		<?php endif;?>

		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flagship-tailwind' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

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
