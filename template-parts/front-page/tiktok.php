<?php
/**
 * Template part for displaying TikTok content in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<?php
	global $wp_query;
	$frontid = $wp_query->post->ID;
if ( get_field( 'ecpt_tiktok_video' ) ) :
	$video_id = the_field( 'ecpt_tiktok_video' );
else :
	$video_id = get_post_meta( $frontid, 'ecpt_tiktok_video', true );
	endif;
	$tiktok_video_url = 'https://www.tiktok.com/oembed?url=' . $video_id;
	$tiktok_request   = wp_remote_get( $tiktok_video_url, array( 'timeout' => 50 ) );

	$tiktok_video = json_decode( wp_remote_retrieve_body( $tiktok_request ), true );

	// Store the video link.
	preg_match( '/cite="([^"]+)"/', $tiktok_video['html'], $matches );
	$tiktok_vid_url = $matches[1];
?>
		<div class="tiktok-thumb">
			<a href="<?php echo esc_url( $tiktok_vid_url ); ?>">
				<img src="<?php echo esc_url( $tiktok_video['thumbnail_url'] ); ?>" class="image" alt="Tiktok Thumbnail for: <?php echo esc_html( $tiktok_video['title'] ); ?>">
				<div class="overlay">
					<div class="text text-center">
						<?php echo esc_html( $tiktok_video['title'] ); ?>
					</div>
				</div>
			</a>
		</div>
	<?php
	// Display a error nothing is returned.
	if ( is_wp_error( $tiktok_request ) || '200' != wp_remote_retrieve_response_code( $tiktok_request ) ) {
		$error_string = $tiktok_request->get_error_message();
		echo '<div class="callout alert"><p>' . esc_html( $error_string ) . '</p></div>';
	}?>
