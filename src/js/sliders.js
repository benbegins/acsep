// import Swiper JS
import Swiper from "swiper"
// import Swiper styles
import "/node_modules/swiper/swiper.min.css"

const sliders = () => {
	const sliderServices = new Swiper(".slider-services", {
		spaceBetween: 24,
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
}

export default sliders
