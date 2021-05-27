<?php
/**
 * Template part for displaying Magazine API content categorized as Features in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

// Get the Feature taxonomy ID.
$latest_features_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?_fields=title,link,acf,categories&volume=311&categories=141';

if ( false === ( $latest_features = get_transient( 'asmagazine_features_query' ) ) ) {
	$latest_features = wp_remote_get( $latest_features_url );
	set_transient( 'asmagazine_features_query', $latest_features, 2419200 );
}

// Display a error nothing is returned.
if ( is_wp_error( $latest_features ) ) {
	$feature_error_string = $latest_features->get_error_message();
	echo '<script>console.log("Error:' . esc_html( $feature_error_string ) . '")</script>';
}

// Get the body.
$features = json_decode( wp_remote_retrieve_body( $latest_features ) );
// Display a warning nothing is returned.
if ( empty( $features ) ) {
	echo '<script>console.log("Error: There is no Features content")</script>';
}
// If there are posts then display them!
if ( ! empty( $features ) ) :?>

	<div class="magazine features">
		<?php foreach ( $features as $feature ) : ?>
			<div class="mb-4">
				<h3>
					<a href="<?php echo esc_url( $feature->link ); ?>">
						<?php
						$category_name = $feature->categories[0];
						if ( '136' == $category_name ) :
							?>
							<?php echo '<small class="text-primary">Cover Story:</small> '; ?>
						<?php endif; ?>
						<?php echo esc_html( $feature->title->rendered ); ?>
					</a>
				</h3>
				<p><?php echo esc_html( $feature->acf->ecpt_tagline ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>
