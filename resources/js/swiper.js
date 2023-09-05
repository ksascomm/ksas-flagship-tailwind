// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

// import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';


const swiper = new Swiper(".swiper", {
	modules: [Navigation, Pagination],
	slidesPerView: 1,
	spaceBetween: 10,
	// Responsive breakpoints
	breakpoints: {
		// when window width is >= 1200px
		1200: {
			slidesPerView: 4,
			spaceBetween: 30,
		},
	},
	loop: true,
	loopFillGroupWithBlank: true,
	grabCursor: true,
	pagination: {
		el: ".swiper-pagination",
		type: "bullets",
		clickable: true,
	},
	//to work on tabs, below was found from: https://github.com/nolimits4web/swiper/issues/2494#issuecomment-621777516
	observer: true,
	observeParents: true,
});
