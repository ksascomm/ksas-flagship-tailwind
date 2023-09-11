<?php
/**
 * Template part for displaying Undergraduate Experience callout in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<section class="flex flex-wrap" id="undergrad-experience">
	<div class="px-5 py-12 container bg-white h-fit mx-auto">
		<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile" style="grid-template-columns:auto 40%">
			<div class="wp-block-media-text__content">
				<h1 class="text-4xl leading-snug">The Undergraduate <span class="text-blue">Experience</span></h1>
				<p class="text-2xl py-4">The undergraduate experience at the Krieger School allows students to build basic abilities that allow them to flourish and learn throughout their life.</p>
				<div class="my-4"><a href="<?php echo esc_url( site_url( '/undergraduate-experience/' ) ); ?>" class=" bg-blue text-white font-heavy font-bold text-base lg:text-lg p-4 hover:bg-blue-light hover:text-primary rounded-md border-none">Explore Undergraduate Education</a></div>
			</div>
			<figure class="wp-block-media-text__media not-prose"><img src="http://krieger.jhu.edu/wp-content/uploads/2021/08/CIIP_impact.jpg" alt="" class="wp-image-15056 size-full"/></figure>
		</div>
	</div>
</section>
