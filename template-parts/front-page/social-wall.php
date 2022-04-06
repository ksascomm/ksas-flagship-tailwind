<?php
/**
 * Template part for displaying social media content in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<section class="px-5 py-12">
	<div class="container mx-auto flex flex-wrap">
		<div class="flex w-full flex-wrap">
			<h1 class="sm:text-3xl text-2xl font-serif lg:w-1/3 lg:mb-0 mt-2">Connect with Us</h1>
			<div class="flex flex-wrap flex-row md:flex-row-reverse lg:pl-6 lg:w-2/3 mx-auto leading-relaxed  font-heavy font-bold pb-4">
				<a href="https://facebook.com/JHUArtsSciences" class="py-3 px-4 text-blue hover:text-primary"><span class="fa-brands fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
				<a href="https://twitter.com/JHUArtsSciences" class="py-3 px-4 text-blue hover:text-primary"><span class="fa-brands fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
				<a href="https://www.youtube.com/user/jhuksas" class="py-3 px-4 text-blue hover:text-primary"><span class="fa-brands fa-youtube fa-2x"></span><span class="screen-reader-text">YouTube</span></a>
				<a href="https://www.tiktok.com/@jhuartssciences" class="py-3 px-4 text-blue hover:text-primary"><span class="fa-brands fa-tiktok fa-2x"></span><span class="screen-reader-text">TikTok</span></a>
				<a href="https://www.instagram.com/JHUArtsSciences/" class="py-3 px-4 text-blue hover:text-primary"><span class="fa-brands fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a>
				<div class="py-3 px-4 text-2xl font-bold font-heavy">#JHUArtsSciences</div>
			</div>
		</div>
		<div class="flex flex-wrap w-full md:-m-2 -m-1">
			<div class="p-2 md:px-2 w-full">
				<?php echo do_shortcode( '[instagram-feed]' ); ?>
			</div>
		</div>
	</div>
</section>
