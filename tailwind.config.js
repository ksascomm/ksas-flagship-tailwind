const { NoEmitOnErrorsPlugin } = require("webpack");

module.exports = {
	content: [
		"./404.php",
		"./archive.php",
		"./comments.php",
		"./footer.php",
		"./header.php",
		"./index.php",
		"./page.php",
		"./search.php",
		"./searchform.php",
		"./sidebar.php",
		"./single-people.php",
		"./single-studyfields.php",
		"./single.php",
		"./inc/*.php",
		"./page-templates/*.php",
		"./resources/js/*.js",
		"./resources/css/wordpress.css",
		"./template-parts/*.php",
		"./template-parts/*/*.php",
		"./template-parts/*/*/*.php",
	],
	theme: {
		screens: {
			sm: "36rem",
			md: "48rem",
			lg: "62rem",
			xl: "80rem",
			"2xl": "100rem",
		},
		colors: {
			primary: "hsl(260 100% 50%)",
			primary: "#31261D",
			secondary: "#002d72",
			transparent: "transparent",
			black: "#31261D",
			"old-black": "#2c2c33",
			"grey-darkest": "#4A484C",
			grey: "#e5e2e0",
			"grey-lightest": "#F8F8F8",
			"grey-cool": "#bfccd9",
			white: "#fefefe",
			blue: "#002d72",
			"blue-light": "#68ace5",
			"blue-lightest": "#c3dcf5",
			"blue-sky": "#418fde",
		},
		fontSize: {
			sm: ".875rem",
			base: "1rem",
			lg: "1.125rem",
			xl: "1.25rem",
			"2xl": "1.5rem",
			"3xl": "1.875rem",
			"4xl": "2.25rem",
			"5xl": "3rem",
		},
		ratios: {
			xs: 1.125,
			sm: 1.333,
			md: 1.5,
			lg: 1.618,
			xl: 2,
			"2xl": 3,
		},
		fontFamily: {
			sans: [
				"Gentona-Light",
				"system-ui",
				"BlinkMacSystemFont",
				"-apple-system",
				"Segoe UI",
				"sans-serif"
			],
			serif: [
				"Quadon",
				"Georgia",
				"serif"
			],
			mono: [
				"Menlo",
				"Monaco",
				"Consolas",
				"Liberation Mono",
				"Courier New",
				"monospace"
			],
			heavy: [
				"Gentona-Bold",
				"system-ui",
				"BlinkMacSystemFont",
				"-apple-system",
				"Segoe UI",
				"sans-serif"
			],
			semi: [
				"Gentona-SemiBold",
				"system-ui",
				"BlinkMacSystemFont",
				"-apple-system",
				"Segoe UI",
				"sans-serif"
			],
		},
		extend: {
			typography: {
				DEFAULT: {
					css: [
						{
							color: "#31261D",
							maxWidth: "110ch",
							lineHeight: "1.6",
							fontSize: "1.125rem",
							'--tw-prose-body': "#31261D",
							'--tw-prose-bullets': "#31261D",
							'--tw-prose-headings': "#31261D",
							'--tw-prose-links': "#002d72",
							'--tw-prose-bold': "#31261D",
							'--tw-prose-code': "#31261D",
							'--tw-prose-pre-code': "#31261D",
							'--tw-prose-pre-bg': "#f8f8f8",
							'--tw-prose-quotes': "#31261D",
							'--tw-prose-counters': "31261D",
							"ul > li::before": {
							  backgroundColor: "#31261D",
							},
							"ol > li::before": {
							  display: "none",
							  backgroundColor: "#fefefe",
							  color: "#31261D",
							},
							"ol > li": {
							  display: "list-item",
							},
							"ul > li": {
							  display: "list-item",
							},
							h1: {
								marginBottom: "1rem",
								color: "#31261D"
							},
							h2: {
								marginTop: "0rem",
								marginBottom: ".5rem",
								color: "#31261D"
							},
							h3: {
								marginTop: "0rem",
								marginBottom: ".5rem",
								fontSize: "1.6rem",
								color: "#31261D"
							},
							h4: {
								marginTop: "0rem",
								marginBottom: ".5rem",
								color: "#31261D",
								fontSize: "1.25rem"
							},
							p: {
								marginTop: "1rem",
								marginBottom: "1rem",
							},
							li: {
								marginTop: "0rem",
								marginBottom: ".25rem",
							},
							code: {
								color: "#31261D"
							},
							table: {
								fontSize: "1rem"
							},
							thead: {
								color: "#31261D"
							},
							img: {
								marginTop: "1rem",
								marginBottom: "1rem"
							},
							a: {
								color: "#002d72",
								textDecoration: "none"
							},
							hr: {
								marginTop: "1.25rem",
								marginBottom: "1.25rem",
								borderColor: "#bfccd9"
							},
						},
					],
				}
			}
		}
	},
	plugins: [
		require("@tailwindcss/typography")
	]
};
