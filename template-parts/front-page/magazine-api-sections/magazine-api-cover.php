<?php
/**
 * Template part for displaying Magazine API content categorized as Cover Story in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

$frontpagecoverimg_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?_embed&slug=home';

if ( false === ( $frontpagecover = get_transient( 'asmagazine_cover_image_query' ) ) ) {
	$frontpagecover = wp_remote_get( $frontpagecoverimg_url );
	set_transient( 'asmagazine_cover_image_query', $frontpagecover, 2419200 );
}

	// Display a error nothing is returned.
if ( is_wp_error( $frontpagecover ) ) {
	$front_error_string = $frontpagecover->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $front_error_string ) . '")</script>';

}
	// Get the body.

	$frontcover = json_decode( wp_remote_retrieve_body( $frontpagecover ) );

	// Display a warning nothing is returned.
if ( empty( $frontcover ) ) {
	echo '<script>console.log("Error: There is no Front Cover content")</script>';
}

	// If there is a featured image for the home page, display it!
if ( ! empty( $frontcover ) ) :?>
	<?php foreach ( $frontcover as $cover ) : ?>
		<img class="w-1/2 sm:w-2/3 md:w-3/4 lg:w-4/5 mx-auto" src="<?php echo esc_url( $cover->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'full'}->source_url ); ?>" alt="<?php echo esc_html( $cover->_embedded->{'wp:featuredmedia'}[0]->alt_text ); ?>">
	<?php endforeach; ?>
<?php endif; ?>
