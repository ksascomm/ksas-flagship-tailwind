<?php
/**
 * Template part for displaying KSAS at a Glance content in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<?php
$distinctions        = get_field( 'statistics' );
$random_distinctions = array_rand( $distinctions, 4 );
if ( is_array( $random_distinctions ) ) :
	?>
<section class="distinctions bg-blue">
	<!-- Change the <g fill> to match the previous section colour -->
	<svg class="wave-top -mb-8" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
				<g class="wave" fill="#fefefe">
					<path d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"></path>
				</g>
				<g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
					<g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
						<path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
						<path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
						<path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
					</g>
				</g>
			</g>
		</g>
	</svg>
	<div class="container mx-auto sm:px-5 lg:px-0 py-12">
		<div class="flex flex-col text-center w-full mb-4">
			<h1 class="text-3xl sm:text-4xl md:text-4xl font-serif mb-4 text-white">The Krieger School at a Glance</h1>
		</div>
		<div class="flex flex-wrap text-center">
		<?php foreach ( $random_distinctions as $random_distinction ) : ?>
			<div class="p-4 lg:w-1/4 sm:w-1/2 w-full distinction h-56 relative mb-4 focus-within:shadow-lg focus-visible:ring">
					<div class="block w-full h-auto">
						<h2 class="text-5xl font-heavy font-bold">
							<div class="icon">
								<img class="px-2 inline-block text-white fill-white h-auto" src="<?php echo esc_url( $distinctions[ $random_distinction ]['icon']['url'] ); ?>" alt="Icon for <?php
								echo esc_html( $distinctions[ $random_distinction ]['number'] );
								?><?php echo esc_html( $distinctions[ $random_distinction ]['statistic_head'] ); ?>">
							</div>
							<?php
							echo esc_html( $distinctions[ $random_distinction ]['number'] );
							?>
						</h2>
						<p class="text-3xl font-heavy font-bold text-white tracking-tight"><?php echo esc_html( $distinctions[ $random_distinction ]['statistic_head'] ); ?></p>
					</div>
					<div class="absolute top-0 bottom-0 left-0 right-0 h-full w-full opacity-0 transition ease-in duration-200 flex flex-col justify-center bg-grey-lightest hover:opacity-100 single-distinction" id="<?php echo $distinctions[ $random_distinction ]['statistic_id']; ?>" tabindex="0">
						<div class="text-center py-6 px-4">
							<p class="sm:text-xl md:text-lg lg:text-xl font-sans text-black"><?php echo esc_html( $distinctions[ $random_distinction ]['statistic_description'] ); ?></p>
						</div>
					</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>
