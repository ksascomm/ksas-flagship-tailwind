<?php
/**
 * Template part for displaying Hub API content in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<h1 class="sm:text-3xl text-2xl font-serif">News from The Hub</h1>

<div class="grid sm:grid-cols-2 md:grid-cols-2 gap-4">
<?php
	$hub_url = 'https://api.hub.jhu.edu/articles?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&divisions=426&per_page=2';
if ( false === ( $hub_call = get_transient( 'flagship_hub_query' ) ) ) {
		$hub_call = wp_remote_get( $hub_url );
	set_transient( 'flagship_hub_query', $hub_call, 86400 ); }

	// Display a error nothing is returned.
if ( is_wp_error( $hub_call ) ) {
		$error_string = $hub_call->get_error_message();
		echo '<div class="callout alert"><p>' . esc_html( $error_string ) . '</p></div>';

}

	// Get the body.
if ( is_array( $hub_call ) && ! empty( $hub_call['body'] ) ) {
	$hub_results = json_decode( $hub_call['body'], true );
} else {
		return false; // wp_remote_get failed somehow!
}
	$hub_articles = $hub_results['_embedded'];

	// Display a warning nothing is returned.
if ( empty( $hub_articles ) ) {
	echo '<div class="callout warning"><p>There are no upcoming events</p></div>';
}
foreach ( $hub_articles['articles'] as $hub_article ) {
	?>
	<article class="hub news bg-white shadow-xl rounded-lg" aria-labelledby="post-<?php echo esc_html( $hub_article['id'] ); ?>">
		<img class="w-full" src="<?php echo esc_html( $hub_article['_embedded']['image_thumbnail'][0]['sizes']['thumbnail'] ); ?>" alt="From The Hub: <?php echo esc_html( $hub_article['headline'] ); ?>" />

		<h1 class="text-lg leading-tight font-heavy font-bold px-6">
			<a href="<?php echo esc_url( $hub_article['url'] ); ?>" id="post-<?php echo esc_html( $hub_article['id'] ); ?>"><?php echo esc_html( $hub_article['headline'] ); ?></a>
		</h1>
		<h2 class="text-sm font-heavy font-bold text-grey-darkest py-1 px-6">
		<?php
		$date = $hub_article['publish_date'];
			echo esc_html( gmdate( 'M j', $date ) );
		?>
		</h2>
		<p class="pt-1 pb-4 px-6 text-base">
			<?php
			echo esc_html( $hub_article['subheadline'] );
			if ( empty( $hub_article['subheadline'] ) ) {
				echo esc_html( $hub_article['excerpt'] );
			}
			?>
		</p>
	</article>
	<?php } ?>
	</div>
