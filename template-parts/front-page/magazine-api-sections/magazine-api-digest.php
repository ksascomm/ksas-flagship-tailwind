<?php
/**
 * Template part for displaying Magazine API content categorized as Student Research in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
$latest_student_research_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=369&categories=351';

if ( false === ( $latest_student_research = get_transient( 'asmagazine_student_research_query' ) ) ) {
	$latest_student_research = wp_remote_get( $latest_student_research_url );
	set_transient( 'asmagazine_student_research_query', $latest_student_research, 2419200 );
}

// Display a error nothing is returned.
if ( is_wp_error( $latest_student_research ) ) {
	$student_research_error_string = $latest_student_research->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $student_research_error_string ) . '")</script>';
}

// Get the body.
$student_research = json_decode( wp_remote_retrieve_body( $latest_student_research ) );
// Display a warning nothing is returned.
if ( empty( $student_research ) ) {
	echo '<script>console.log("Error: There is no Student Research content")</script>';
}
// If there are posts then display them!
if ( ! empty( $student_research ) ) :?>
		<div class="magazine digest grid grid-cols-1 md:grid-cols-4 gap-4" id="digest">
		<?php foreach ( $student_research as $research ) : ?>
			<div class="shadow-md rounded hover:bg-blue-lightest">
				<div class="px-6 py-4">
					<h3><a class="text-blue hover:text-primary border-grey border-b-2 border-dashed hover:border-grey-darkest hover:border-b-2 hover:border-solid" href="<?php echo esc_url( $research->link ); ?>"><?php echo esc_html( $research->title->rendered ); ?></a></h3>
					<?php echo wp_kses_post( $research->excerpt->rendered ); ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
<?php endif; ?>
