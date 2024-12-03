<?php
/**
 * Template part for displaying Magazine API content categorized as Big Ideas in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
$latest_classroom_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=369&categories=348,350';

if ( false === ( $latest_classroom = get_transient( 'asmagazine_classroom_query' ) ) ) {
	$latest_classroom = wp_remote_get( $latest_classroom_url );
	set_transient( 'asmagazine_classroom_query', $latest_classroom, 2419200 );
}

// Display a error nothing is returned.
if ( is_wp_error( $latest_classroom ) ) {
	$classroom_error_string = $latest_classroom->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $classroom_error_string ) . '")</script>';
}

// Get the body.
$classroom = json_decode( wp_remote_retrieve_body( $latest_classroom ) );
// Display a warning nothing is returned.
if ( empty( $classroom ) ) {
	echo '<script>console.log("Error: There is no Clasroom content")</script>';
}
// If there are posts then display them!
if ( ! empty( $classroom ) ) :?>

		<div class="magazine classroom grid grid-cols-1 md:grid-cols-4 gap-4" id="classroom">
		<?php foreach ( $classroom as $class ) : ?>
			<div class="shadow-md rounded hover:bg-blue-lightest">
				<div class="px-6 py-4">
					<h3><a class="text-blue hover:text-primary border-grey border-b-2 border-dashed hover:border-grey-darkest hover:border-b-2 hover:border-solid" href="<?php echo esc_url( $class->link ); ?>"><?php echo esc_html( $class->title->rendered ); ?></a></h3>
					<?php echo wp_kses_post( $class->excerpt->rendered ); ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
<?php endif; ?>
