import "../scss/style.scss"
import menu from "./menu"
import sliderServices from "./sliders"
import faq from "./faq"
import animations from "./animations"
import lenis from "./lenis"

const init = () => {
	menu()
	sliderServices()
	faq()
	animations()
}

window.addEventListener("pageshow", init)
window.addEventListener("resize", animations)

// Smooth Scroll
function raf(time) {
	lenis.raf(time)
	requestAnimationFrame(raf)
}
requestAnimationFrame(raf)
