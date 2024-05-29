<?php
/**
 * Template part for displaying Magazine API content categorized as Faculty in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
	$latest_faculty_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=366&categories=345';

if ( false === ( $latest_faculty = get_transient( 'asmagazine_faculty_query' ) ) ) {
	$latest_faculty = wp_remote_get( $latest_faculty_url );
	set_transient( 'asmagazine_faculty_query', $latest_faculty, 2419200 );
}

	// Display a error nothing is returned.
if ( is_wp_error( $latest_faculty ) ) {
	$faculty_error_string = $latest_faculty->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $faculty_error_string ) . '")</script>';
}

	// Get the body.
	$faculty = json_decode( wp_remote_retrieve_body( $latest_faculty ) );
	// Display a warning nothing is returned.
if ( empty( $faculty ) ) {
	echo '<script>console.log("Error: There is no Faculty content")</script>';
}
	// If there are posts then display them!
if ( ! empty( $faculty ) ) :?>
		<div class="magazine faculty grid grid-cols-1 md:grid-cols-4 gap-4" id="faculty">
		<?php foreach ( $faculty as $fac ) : ?>
			<div class="shadow-md rounded hover:bg-blue-lightest">
				<div class="px-6 py-4">
					<h3><a class="text-blue hover:text-primary border-grey border-b-2 border-dashed hover:border-grey-darkest hover:border-b-2 hover:border-solid"href="<?php echo esc_url( $fac->link ); ?>"><?php echo esc_html( $fac->title->rendered ); ?></a></h3>
					<?php echo wp_kses_post( $fac->excerpt->rendered ); ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
<?php endif; ?>
