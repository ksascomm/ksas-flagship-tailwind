<?php
/**
 * Template part for displaying Magazine API content categorized as On Campus in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
	$latest_oncampus_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=366&categories=350';

if ( false === ( $latest_oncampus = get_transient( 'asmagazine_oncampus_query' ) ) ) {
	$latest_oncampus = wp_remote_get( $latest_oncampus_url );
	set_transient( 'asmagazine_oncampus_query', $latest_oncampus, 2419200 );
}

	// Display a error nothing is returned.
if ( is_wp_error( $latest_oncampus ) ) {
	$oncampus_error_string = $latest_oncampus->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $oncampus_error_string ) . '")</script>';
}

	// Get the body.
	$oncampus = json_decode( wp_remote_retrieve_body( $latest_oncampus ) );
	// Display a warning nothing is returned.
if ( empty( $oncampus ) ) {
	echo '<script>console.log("Error: There is no Faculty content")</script>';
}
	// If there are posts then display them!
if ( ! empty( $oncampus ) ) :?>
		<div class="magazine oncampus grid grid-cols-4 gap-4" id="oncampus">
		<?php foreach ( $oncampus as $campus ) : ?>
			<div class="shadow-md rounded hover:bg-blue-lightest">
				<div class="px-6 py-4">
					<h3><a class="text-blue hover:text-primary border-grey border-b-2 border-dashed hover:border-grey-darkest hover:border-b-2 hover:border-solid" href="<?php echo esc_url( $campus->link ); ?>"><?php echo esc_html( $campus->title->rendered ); ?></a></h3>
					<?php echo wp_kses_post( $campus->excerpt->rendered ); ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
<?php endif; ?>
