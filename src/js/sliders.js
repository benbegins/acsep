// import Swiper JS
import Swiper, { Navigation } from "swiper"
// import Swiper styles
import "/node_modules/swiper/swiper.min.css"

const sliders = () => {
	const sliderServices = new Swiper(".slider-services", {
		modules: [Navigation],
		spaceBetween: 24,
		speed: 400,
		slidesPerView: 1.1,
		breakpoints: {
			640: {
				spaceBetween: 32,
				slidesPerView: 2,
			},
			1024: {
				spaceBetween: 32,
				slidesPerView: 4,
			},
		},
		navigation: {
			nextEl: ".slider-services-navigation.next",
			prevEl: ".slider-services-navigation.prev",
		},
	})

	const sliderSolutions = new Swiper(".slider-solutions", {
		modules: [Navigation],
		spaceBetween: 24,
		speed: 400,
		slidesPerView: 1.1,
		breakpoints: {
			640: {
				spaceBetween: 32,
				slidesPerView: 2,
			},
			1024: {
				spaceBetween: 32,
				slidesPerView: 3,
			},
		},
		navigation: {
			nextEl: ".slider-solutions-navigation.next",
			prevEl: ".slider-solutions-navigation.prev",
		},
	})

	const sliderActualites = new Swiper(".slider-actualites", {
		spaceBetween: 24,
		speed: 400,
		slidesPerView: 1.1,
		breakpoints: {
			640: {
				spaceBetween: 32,
				slidesPerView: 2,
			},
			1024: {
				spaceBetween: 32,
				slidesPerView: 4,
			},
		},
	})

	const sliderTemoignages = new Swiper(".slider-temoignages", {
		modules: [Navigation],
		spaceBetween: 24,
		speed: 400,
		slidesPerView: 1.1,
		breakpoints: {
			1024: {
				spaceBetween: 32,
				slidesPerView: 2,
				centeredSlides: true,
				loop: true,
			},
		},
		navigation: {
			nextEl: ".slider-temoignages .slider-navigation.next",
			prevEl: ".slider-temoignages .slider-navigation.prev",
		},
	})
}

export default sliders
