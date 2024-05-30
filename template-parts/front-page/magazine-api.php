<?php
/**
 * Template part for displaying Magazine API sections in page template front.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flagship_Tailwind
 */

?>
<section class="flex flex-wrap" id="tabs-id">
	<div class="px-5 py-12 container bg-white h-fit mx-auto">
		<div class="magazine-heading">
			<h1 class="sm:text-3xl text-2xl font-serif">Arts & Sciences Magazine
				<small><a href="https://magazine.krieger.jhu.edu/">Spring 2024 Issue</a></small>
			</h1>
		</div>
		<nav class="tabs flex flex-col sm:flex-row">
			<button data-target="panel-1" class="tab active btn-magazine">Features</button>
			<button data-target="panel-2" class="tab btn-magazine">News</button>
			<button data-target="panel-3" class="tab btn-magazine">Research</button>
			<button data-target="panel-4" class="tab btn-magazine">Faculty</button>
			<button data-target="panel-5" class="tab btn-magazine">Student Research</button>
			<button data-target="panel-6" class="tab btn-magazine">On Campus</button>
			<button data-target="panel-7" class="tab btn-magazine">Alumni</button>
		</nav>
		<div id="panels">
			<div class="panel-1 tab-content active py-5">
				<div class="grid grid-cols-3 gap-4">
					<div class="col-span-3 md:col-span-1">
						<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-cover' ); ?>
					</div>
					<div class="col-span-3 md:col-span-2">
						<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-feature' ); ?>
					</div>
				</div>
			</div>
			<div class="panel-2 tab-content py-5">
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-news' ); ?>
			</div>
			<div class="panel-3 tab-content py-5">
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-research' ); ?>
			</div>
			<div class="panel-4 tab-content py-5">
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-faculty' ); ?>
			</div>
			<div class="panel-5 tab-content py-5">
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-digest' ); ?>
			</div>
			<div class="panel-6 tab-content py-5">
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-classroom' ); ?>
			</div>
			<div class="panel-7 tab-content py-5">
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-alumni' ); ?>
			</div>
		</div>
	</div>
</section>
