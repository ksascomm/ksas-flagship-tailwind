<?php
/**
 * Template part for displaying news section content in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<section class="flex flex-wrap px-5 py-12">
	<div class="w-full p-4">
		<div class="grid grid-cols-2 gap-4 divide-x divide-grey-lightest">
			<div class="col-span-2 lg:col-span-1">
			<h1 class="sm:text-3xl text-2xl font-serif">KSAS Spotlight</h1>
				<article class="hub news bg-white shadow-xl rounded-lg">
					<div class="px-6 py-2">
						<div class="video-thumbnail">
							<a href="https://www.youtube.com/watch?v=lCmH2EFkpkM" target="_blank" rel="noopener" class="text-blue hover:text-blue-light">
								<img src="https://img.youtube.com/vi/lCmH2EFkpkM/maxresdefault.jpg" alt="Youtube Video thumbnail for First-Year Seminars at Johns Hopkins University Video">
								<div class="playbutton"></div>
							</a>
						</div>
						<div class="description">
							<p>Every first-year student at Johns Hopkins enrolls in a <strong class="font-bold font-heavy">First-Year Seminar (FYS)</strong> of their choice. These small, intimate, conversation-focused classes cross academic disciplines, and help students build connections that will serve them for the next four years. Each seminar is unique to the faculty teaching it, but all are discussion-based with embedded experiential learning.</p>
						</div>
					</div>
				</article>
			</div>
			<div class="col-span-2 lg:col-span-1 pl-4">
				<?php get_template_part( 'template-parts/front-page/hub-api' ); ?>
			</div>
		</div>
	</div>
</section>
