<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flagship_Tailwind
 */

?>

	<footer class="site-footer bg-old-black text-white mt-20 border-t-1 border-grey-darkest relative">
		<div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px" >
			<svg
				class="absolute -bottom-px overflow-hidden"
				xmlns="http://www.w3.org/2000/svg"
				preserveAspectRatio="none"
				version="1.1"
				viewBox="0 0 2560 100"
				x="0"
				y="0"
			>
				<polygon
				class="text-old-black fill-old-black"
				points="2560 0 2560 100 0 100"
				></polygon>
			</svg>
		</div>
		<div class="site-info p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
			<div class="m-2 col-span-4 lg:col-span-1">
				<div class="">
					<a href="https://www.jhu.edu/" aria-label="Johns Hopkins University">
					<img class="h-auto w-64 self-center" src="<?php echo esc_url( get_template_directory_uri() ); ?>/resources/images/jhu-horizontal.png" alt="Johns Hopkins University">
					</a>
				</div>
			</div>
			<div class="col-span-4 lg:col-span-2">
				<ul class="flex m-4 justify-center" role="menu">
					<li role="menuitem" class="ml-4 hover:text-blue-light"><a href="https://accessibility.jhu.edu/">Accessibility</a></li>
					<li role="menuitem" class="ml-4 hover:text-blue-light"><a href="https://it.johnshopkins.edu/policies/privacystatement">Privacy Statement</a></li>
				</ul>
			</div>
			<div class="social-media m-4 col-span-4 lg:col-span-1">
				<a href="https://facebook.com/JHUArtsSciences"><span class="fab fa-facebook-square fa-2x hover:text-blue-light"></span><span class="screen-reader-text">Facebook</span></a>
				<a href="https://www.instagram.com/JHUArtsSciences/"><span class=" fab fa-instagram fa-2x hover:text-blue-light"></span><span class="screen-reader-text">Instagram</span></a>
				<a href="https://twitter.com/JHUArtsSciences"><span class="fab fa-twitter fa-2x hover:text-blue-light"></span><span class="screen-reader-text">Twitter</span></a>
				<a href="https://www.youtube.com/user/jhuksas"><span class="fab fa-youtube fa-2x hover:text-blue-light"></span><span class="screen-reader-text">YouTube</span></a>
				<a href="https://www.tiktok.com/@jhuartssciences"><span class="fab fa-tiktok fa-2x hover:text-blue-light"></span><span class="screen-reader-text">TikTok</span></a>
			</div>
			<div class="col-span-4 my-6">
				<p class="text-center">&copy; <?php print gmdate( 'Y' ); ?> Johns Hopkins University, <br>Zanvyl Krieger School of Arts & Sciences, <br>3400 N. Charles St, Baltimore, MD 21218</p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
