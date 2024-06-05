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
		<div class="tabs">
			<div role="tablist" aria-label="Magazine Tabs" class="flex flex-col sm:flex-row mb-4">
				<button role="tab" aria-controls="panel-1"  aria-selected="true" id="tab-1" tabindex="0" class="btn-magazine">Features</button>
				<button role="tab" aria-selected="false" aria-controls="panel-2" id="tab-2" tabindex="-1" class="btn-magazine">News</button>
				<button role="tab" aria-selected="false" aria-controls="panel-3" id="tab-3" tabindex="-1" class="btn-magazine">Research</button>
				<button role="tab" aria-selected="false" aria-controls="panel-4" id="tab-4" tabindex="-1" class="btn-magazine">Faculty</button>
				<button role="tab" aria-selected="false" aria-controls="panel-5" id="tab-5" tabindex="-1" class="btn-magazine">Student Research</button>
				<button role="tab" aria-selected="false" aria-controls="panel-6" id="tab-6" tabindex="-1" class="btn-magazine">On Campus</button>
				<button role="tab" aria-selected="false" aria-controls="panel-7" id="tab-7" tabindex="-1" class="btn-magazine">Alumni</button>
			</div>
			<div id="panel-1" role="tabpanel" tabindex="0" aria-labelledby="tab-1">
				<div class="grid grid-cols-3 gap-4">
					<div class="col-span-3 md:col-span-1">
						<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-cover' ); ?>
					</div>
					<div class="col-span-3 md:col-span-2">
						<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-feature' ); ?>
					</div>
				</div>
			</div>
			<div id="panel-2" role="tabpanel" tabindex="0" aria-labelledby="tab-2" hidden>
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-news' ); ?>
			</div>
			<div id="panel-3" role="tabpanel" tabindex="0" aria-labelledby="tab-3" hidden>
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-research' ); ?>
			</div>
			<div id="panel-4" role="tabpanel" tabindex="0" aria-labelledby="tab-4" hidden>
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-faculty' ); ?>
			</div>
			<div id="panel-5" role="tabpanel" tabindex="0" aria-labelledby="tab-5" hidden>
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-digest' ); ?>
			</div>
			<div id="panel-6" role="tabpanel" tabindex="0" aria-labelledby="tab-6" hidden>
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-classroom' ); ?>
			</div>
			<div id="panel-7" role="tabpanel" tabindex="0" aria-labelledby="tab-7" hidden>
				<?php get_template_part( 'template-parts/front-page/magazine-api-sections/magazine-api-alumni' ); ?>
			</div>
		</div>
	</div>
</section>
