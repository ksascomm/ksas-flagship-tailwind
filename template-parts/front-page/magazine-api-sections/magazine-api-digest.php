<?php
/**
 * Template part for displaying Magazine API content categorized as Student Digest in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
$latest_student_digest_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=311&categories=76';

if ( false === ( $latest_student_digest = get_transient( 'asmagazine_student_digest_query' ) ) ) {
	$latest_student_digest = wp_remote_get( $latest_student_digest_url );
	set_transient( 'asmagazine_student_digest_query', $latest_student_digest, 2419200 );
}

// Display a error nothing is returned.
if ( is_wp_error( $latest_student_digest ) ) {
	$student_digest_error_string = $latest_student_digest->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $student_digest_error_string ) . '")</script>';
}

// Get the body.
$student_digest = json_decode( wp_remote_retrieve_body( $latest_student_digest ) );
// Display a warning nothing is returned.
if ( empty( $student_digest ) ) {
	echo '<script>console.log("Error: There is no Student Digest content")</script>';
}
// If there are posts then display them!
if ( ! empty( $student_digest ) ) :?>
	<div class="swiper">
		<div class="magazine digest swiper-wrapper" id="digest">
		<?php foreach ( $student_digest as $digest ) : ?>
			<div class="swiper-slide hover:bg-blue-lightest">
				<div class="px-6 py-4">
					<h3><a href="<?php echo esc_url( $digest->link ); ?>"><?php echo esc_html( $digest->title->rendered ); ?></a></h3>
					<?php echo $digest->excerpt->rendered; ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<!-- If we need pagination -->
		<div class="swiper-pagination"></div>
	</div>
<?php endif; ?>
