<?php
/**
 * Template part for displaying Magazine API content categorized as Research in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
	$latest_research_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=366&categories=75';

if ( false === ( $latest_research = get_transient( 'asmagazine_research_query' ) ) ) {
	$latest_research = wp_remote_get( $latest_research_url );
	set_transient( 'asmagazine_research_query', $latest_research, 2419200 );
}

	// Display a error nothing is returned.
if ( is_wp_error( $latest_research ) ) {
	$research_error_string = $latest_research->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $research_error_string ) . '")</script>';
}

	// Get the body.
	$research = json_decode( wp_remote_retrieve_body( $latest_research ) );
	// Display a warning nothing is returned.
if ( empty( $research ) ) {
	echo '<script>console.log("Error: There is no Research content")</script>';
}
	// If there are posts then display them!
if ( ! empty( $research ) ) :?>
	<div class="magazine research grid grid-cols-4 gap-4" id="research">
	<?php foreach ( $research as $rese ) : ?>
		<div class="shadow-md rounded hover:bg-blue-lightest">
			<div class="px-6 py-4">
				<h3><a class="text-blue hover:text-primary border-grey border-b-2 border-dashed hover:border-grey-darkest hover:border-b-2 hover:border-solid" href="<?php echo esc_url( $rese->link ); ?>"><?php echo esc_html( $rese->title->rendered ); ?></a></h3>
				<?php echo wp_kses_post( $rese->excerpt->rendered ); ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
