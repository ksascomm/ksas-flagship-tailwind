<?php
/**
 * Template part for displaying Magazine API content categorized as Alumni in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
	$latest_alumni_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=366&categories=69';

if ( false === ( $latest_alumni = get_transient( 'asmagazine_alumni_query' ) ) ) {
	$latest_alumni = wp_remote_get( $latest_alumni_url );
	set_transient( 'asmagazine_alumni_query', $latest_alumni, 2419200 );
}

	// Display a error nothing is returned.
if ( is_wp_error( $latest_alumni ) ) {
	$alumni_error_string = $latest_alumni->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $alumni_error_string ) . '")</script>';
}

	// Get the body.
	$alumni = json_decode( wp_remote_retrieve_body( $latest_alumni ) );
	// Display a warning nothing is returned.
if ( empty( $alumni ) ) {
	echo '<script>console.log("Error: There is no Alumni content")</script>';
}
	// If there are posts then display them!
if ( ! empty( $alumni ) ) :?>
		<div class="magazine alumni grid grid-cols-4 gap-4" id="alumni">
		<?php foreach ( $alumni as $alum ) : ?>
			<div class="shadow-md rounded hover:bg-blue-lightest">
				<div class="px-6 py-4">
					<h3><a class="text-blue hover:text-primary border-grey border-b-2 border-dashed hover:border-grey-darkest hover:border-b-2 hover:border-solid" href="<?php echo esc_url( $alum->link ); ?>"><?php echo esc_html( $alum->title->rendered ); ?></a></h3>
					<?php echo wp_kses_post( $alum->excerpt->rendered ); ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
