<?php
/**
 * Template part for displaying Magazine API content categorized as News in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
$latest_news_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=366&categories=1';

if ( false === ( $latest_news = get_transient( 'asmagazine_news_query' ) ) ) {
	$latest_news = wp_remote_get( $latest_news_url );
	set_transient( 'asmagazine_news_query', $latest_news, 2419200 );
}

// Display a error nothing is returned.
if ( is_wp_error( $latest_news ) ) {
	$news_error_string = $latest_news->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $news_error_string ) . '")</script>';
}

// Get the body.
$news = json_decode( wp_remote_retrieve_body( $latest_news ) );
// Display a warning nothing is returned.
if ( empty( $news ) ) {
	echo '<script>console.log("Error: There is no News content")</script>';
}
// If there are posts then display them!
if ( ! empty( $news ) ) :?>

		<div class="magazine news grid grid-cols-4 gap-4" id="news">
			<?php foreach ( $news as $new ) : ?>
				<div class="shadow-md rounded hover:bg-blue-lightest">
					<div class="px-6 py-4">
						<h3><a class="text-blue hover:text-primary border-grey border-b-2 border-dashed hover:border-grey-darkest hover:border-b-2 hover:border-solid" href="<?php echo esc_url( $new->link ); ?>"><?php echo esc_html( $new->title->rendered ); ?></a></h3>
						<?php echo wp_kses_post( $new->excerpt->rendered ); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<!-- If we need pagination -->
<?php endif; ?>
