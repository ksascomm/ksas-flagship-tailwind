<?php
/**
 * Template part for displaying images from Photoshelter
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

$username      = get_field( 'username', 'option' );
$password      = get_field( 'password', 'option' );
$url           = 'https://www.photoshelter.com/psapi/v3/mem/authenticate?api_key=2yrk5yDYpec&email=' . $username . '&password=' . $password . '&mode=token';
$transient_key = 'photoshelter-api';
$request       = get_transient( $transient_key );
if ( false === $request ) {
	$request = wp_remote_get( $url );

	if ( is_wp_error( $request ) ) {
		// Cache failures for a 15 minutes, will speed up page rendering in the event of remote failure.
		set_transient( $transient_key, $request, MINUTE_IN_SECONDS * 15 );
		return false;
	}
	// Success, cache for 24 hours.
	set_transient( $transient_key, $request, DAY_IN_SECONDS * 1 );
}

if ( is_wp_error( $request ) ) {
	return false;
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );

if ( ! empty( $data ) ) {
	$token = $data->data->token;
}
$saved_token = $token;

$front_id    = get_field( 'front_hero_gallery_id', 'option' );
$interior_id = get_field( 'interior_hero_gallery_id', 'option' );
if ( is_front_page() ) {
	$gallery_id = $front_id;
} else {
	$gallery_id = $interior_id;
}

$photoshelter_response = wp_remote_get(
	'https://www.photoshelter.com/psapi/v3/gallery/' . $gallery_id . '?api_key=2yrk5yDYpec&auth_token=' . $saved_token . '&extend={
	"GalleryImage":{"fields":"image_id","params":{}},
	"ImageLink":{"fields":"link,base","params":{"image_mode":"fill","image_size":"683x400"}},
	"Image":{"fields":"image_id","params":{}},
	"Iptc":{"fields":"caption","params":{}}
}'
);
if ( is_wp_error( $photoshelter_response ) ) {
	$photoshelter_data = json_decode( wp_remote_retrieve_body( $photoshelter_response ) );
	echo '<script>console.log("Error:' . $photoshelter_data . '")</script>';
} else {
	$photoshelter_data   = json_decode( wp_remote_retrieve_body( $photoshelter_response ) );
	$photoshelter_images = $photoshelter_data->data->Gallery->GalleryImage;
}

$random_photoshelter_image = $photoshelter_images[ array_rand( $photoshelter_images ) ];

if ( ! empty( $random_photoshelter_image ) ) :?>
		<img src="<?php echo esc_url( $random_photoshelter_image->ImageLink->link, ); ?>" alt="<?php echo esc_html( $random_photoshelter_image->Image->Iptc->caption ); ?>" class="h-56 w-full object-cover sm:h-72 lg:w-full lg:h-full">

<?php endif; ?>
