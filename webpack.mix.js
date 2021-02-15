const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const glob = require("glob-all");
const PurgecssPlugin = require("purgecss-webpack-plugin");

/* ==========================================================================
  Config
  ========================================================================== */
const config = {
	proxyUrl: "krieger.local/",
	injectChanges: true,
	port: 3000,
	openOnStart: true,
	pathToLocalSSLCert: "",
	pathToLocalSSLKey: "",
	filesToWatch: [
		"./**/*.php",
		"./**/*.html",
		"resources/**/*.css",
		"resources/js/**/*.js",
		"resources/img/*",
		"tailwind-config.js"
	]
};

/* ==========================================================================
  Purge CSS Extractors
  ========================================================================== */

const TailwindExtractor = content => {
	return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
};

/* ==========================================================================
  Laravel Mix Config
  ========================================================================== */
mix
	// handle JS files
	.js("resources/js/app.js", "dist/js/bundle.min.js")
	.disableNotifications()

	.postCss(
		"./resources/css/style.css",
		"./dist/css/style.css",
		tailwindcss("./tailwind.config.js")
	)

	// Move images to dist directory
	.copyDirectory("resources/images", "dist/images")

	// Move fonts to dist directory
	.copyDirectory("resources/fonts", "dist/fonts")

	.options({
		processCssUrls: false
	})

	// BrowserSync
	.browserSync({
		proxy: config.proxyUrl,
		open: config.openOnStart,
		port: config.port,
		files: config.filesToWatch
	});

// remove unused CSS from files - only used when running npm run production
if (mix.inProduction()) {
	mix.options({
		uglify: {
			uglifyOptions: {
				mangle: true,

				compress: {
					warnings: false, // Suppress uglification warnings
					pure_getters: true,
					conditionals: true,
					unused: true,
					comparisons: true,
					sequences: true,
					dead_code: true,
					evaluate: true,
					if_return: true,
					join_vars: true
				},

				output: {
					comments: false
				},

				exclude: [/\.min\.js$/gi] // skip pre-minified libs
			}
		}
	});

	// Purge CSS config
	// more examples can be found at https://gist.github.com/jack-pallot/217a5d172ffa43c8c85df2cb41b80bad
	mix.webpackConfig({
		plugins: [
			new PurgecssPlugin({
				paths: glob.sync([
					path.join(__dirname, "./**/*.php"),
					path.join(__dirname, "resources/js/**/*.js"),
					path.join(__dirname, "resources/js/components/**/*.vue")
				]),

				extractors: [
					{
						extractor: TailwindExtractor,
						extensions: ["html", "php", "js", "vue"]
					}
				],

				safelist: [
					"p",
					"h1",
					"h2",
					"h3",
					"h4",
					"h5",
					"h6",
					"hr",
					"ol",
					"ol li",
					"ul",
					"ul li",
					"em",
					"b",
					"strong",
					"blockquote",
					"tablepress",
					"current-item",
					"sideNav",
					"sub-menu",
					"callout",
					"breadcrumbs",
					"current-item",
					"page-numbers",
					/^gsc-/,
					/^gs-/,
					/(^wp-block-)\w+/,
					/^icon-/,
					"class",
					/(^c-accordion)\w+/,
				],
			})
		]
	});
}
