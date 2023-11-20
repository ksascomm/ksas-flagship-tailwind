<?php
/**
 * Template part for displaying Magazine API content categorized as Deans Desktop in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
$latest_from_dean_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_embed&volume=356&categories=72';

if ( false === ( $latest_from_dean = get_transient( 'asmagazine_from_dean_query' ) ) ) {
	$latest_from_dean = wp_remote_get( $latest_from_dean_url );
	set_transient( 'asmagazine_from_dean_query', $latest_from_dean, 2419200 );
}

// Display a error nothing is returned.
if ( is_wp_error( $latest_from_dean ) ) {
	$dean_error_string = $latest_from_dean->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $dean_error_string ) . '")</script>';
}

// Get the body.
$from_dean = json_decode( wp_remote_retrieve_body( $latest_from_dean ) );
// Display a warning nothing is returned.
if ( empty( $from_dean ) ) {
	echo '<script>console.log("Error: There is no Dean content")</script>';
}
// If there are posts then display them!
if ( ! empty( $from_dean ) ) :?>
		<div class="magazine dean">
			<?php foreach ( $from_dean as $dean ) : ?>
				<div class="grid grid-cols-3 gap-4">
					<div class="col-span-3 md:col-span-1">
						<img class="w-1/2 sm:w-2/3 md:w-3/4 mx-auto" src="<?php echo esc_url( $dean->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'full'}->source_url ); ?>" alt="Dean Headshot">
					</div>
					<div class="col-span-3 md:col-span-2">
						<p><?php echo wp_kses_post( $dean->excerpt->rendered ); ?></p>
						<p><a class="button bg-secondary text-white hover:bg-blue-light hover:text-primary font-heavy font-bold py-2 px-4 rounded-md" href="<?php echo esc_url( $dean->link ); ?>">More from the Dean</a></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
