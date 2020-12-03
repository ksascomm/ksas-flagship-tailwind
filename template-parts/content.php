<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose flex flex-col' ); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title font-heavy font-bold">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title font-heavy font-bold"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				if ( ! is_sticky() ) :
					flagship_tailwind_posted_on();
					endif;
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php flagship_tailwind_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		// Show content if single post page.
		if ( is_single() ) :
			?>
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'flagship-tailwind' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		else :
			// Show excerpt if on index page.
			the_excerpt();

		endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flagship-tailwind' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php if ( ! is_single() ) : ?>
		<hr>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
