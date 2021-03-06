// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination } from "swiper";

// configure Swiper to use modules
Swiper.use([Navigation, Pagination]);
// import Swiper styles
import "swiper/swiper-bundle.css";

const swiper = new Swiper(".swiper-container", {
	slidesPerView: 1,
	spaceBetween: 10,
	// Responsive breakpoints
	breakpoints: {
		// when window width is >= 1200px
		1200: {
			slidesPerView: 3,
			spaceBetween: 30
		}
	},
	loop: true,
	loopFillGroupWithBlank: true,
	grabCursor: true,
	pagination: {
		el: ".swiper-pagination",
		type: "bullets",
		clickable: true
	},
	//to work on tabs, below was found from: https://github.com/nolimits4web/swiper/issues/2494#issuecomment-621777516
	observer: true,
	observeParents: true
});
