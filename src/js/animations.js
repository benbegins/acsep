import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"
gsap.registerPlugin(ScrollTrigger)

const animations = () => {
	// Parallax
	const parallaxElements = document.querySelectorAll("[data-parallax]")
	if (parallaxElements) {
		parallaxElements.forEach((element) => {
			let speed

			element.dataset.speed
				? (speed = element.dataset.speed)
				: (speed = 10)

			gsap.to(element, {
				y: `${speed}vh`,
				ease: "none",
				scrollTrigger: {
					trigger: element,
					scrub: true,
				},
			})
		})
	}

	// Fade
	const fadeElements = document.querySelectorAll(".fade")
	if (fadeElements) {
		fadeElements.forEach((element) => {
			let delay
			let translate
			let duration

			element.dataset.delay
				? (delay = element.dataset.delay)
				: (delay = 0)

			element.dataset.translate
				? (translate = element.dataset.translate * 20)
				: (translate = 0)

			element.dataset.duration
				? (duration = element.dataset.duration)
				: (duration = 1)

			gsap.fromTo(
				element,
				{
					oapcity: 0,
					y: translate,
				},
				{
					opacity: 1,
					y: 0,
					duration: duration,
					ease: "power2.out",
					delay: delay,
					scrollTrigger: {
						trigger: element,
						start: "top 90%",
					},
				}
			)
		})
	}
}

export default animations
