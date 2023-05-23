<?php
/**
 * Template part for displaying Magazine API content categorized as Big Ideas in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
$latest_big_ideas_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=340&categories=70';

if ( false === ( $latest_big_ideas = get_transient( 'asmagazine_big_ideas_query' ) ) ) {
	$latest_big_ideas = wp_remote_get( $latest_big_ideas_url );
	set_transient( 'asmagazine_big_ideas_query', $latest_big_ideas, 2419200 );
}

// Display a error nothing is returned.
if ( is_wp_error( $latest_big_ideas ) ) {
	$big_ideas_error_string = $latest_big_ideas->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $big_ideas_error_string ) . '")</script>';
}

// Get the body.
$big_ideas = json_decode( wp_remote_retrieve_body( $latest_big_ideas ) );
// Display a warning nothing is returned.
if ( empty( $big_ideas ) ) {
	echo '<script>console.log("Error: There is no Big Ideas content")</script>';
}
// If there are posts then display them!
if ( ! empty( $big_ideas ) ) :?>
	<div class="swiper">
		<div class="magazine ideas swiper-wrapper" id="ideas">
		<?php foreach ( $big_ideas as $ideas ) : ?>
			<div class="swiper-slide hover:bg-blue-lightest">
				<div class="px-6 py-4">
					<h3><a href="<?php echo esc_url( $ideas->link ); ?>"><?php echo esc_html( $ideas->title->rendered ); ?></a></h3>
					<?php echo $ideas->excerpt->rendered; ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<!-- If we need pagination -->
		<div class="swiper-pagination"></div>
	</div>
<?php endif; ?>
