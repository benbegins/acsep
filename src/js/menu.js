import { gsap } from "gsap"
import lenis from "./lenis"

const menu = () => {
	const body = document.querySelector("body")
	const burger = document.querySelector(".site-header .burger")
	const menuMobile = document.querySelector(".site-header .main-menu")
	const btnClose = document.querySelector(".site-header .btn-close")
	const btnsSub = document.querySelectorAll(".site-header .btn-sub")
	const btnBack = document.querySelector(".site-header .btn-back")
	const overlay = document.querySelector(".site-header .overlay")
	const mainNav = document.querySelector(".site-header .main-nav")

	// Mobile Events
	burger.addEventListener("click", () => {
		menuMobile.classList.toggle("active")
	})

	btnClose.addEventListener("click", () => {
		menuMobile.classList.remove("active")
		closeSubmenus()
	})

	// Submenus Events
	btnsSub.forEach((btn) => {
		btn.addEventListener("click", () => {
			const submenu = btn.nextElementSibling
			// Check if submenu exist and is not already active
			if (
				submenu.classList.contains("submenu") &&
				!submenu.classList.contains("active")
			) {
				openSubmenu(submenu, btn)
			} else {
				closeSubmenus()
			}
		})
	})

	btnBack.addEventListener("click", () => {
		closeSubmenus()
	})

	overlay.addEventListener("mouseover", () => {
		closeSubmenus()
	})

	window.addEventListener("scroll", (e) => {
		if (window.scrollY > 100) {
			mainNavBackground(true)
		} else {
			mainNavBackground(false)
		}
	})

	// Functions
	const closeSubmenus = () => {
		allowScroll(true)
		btnBack.classList.remove("active")
		overlay.classList.remove("active")

		btnsSub.forEach((btn) => {
			btn.classList.remove("active")
		})

		const submenus = document.querySelectorAll(".site-header .submenu")
		submenus.forEach((submenu) => {
			submenu.classList.remove("active")
		})

		if (window.scrollY < 100) {
			mainNavBackground(false)
		}
	}

	const openSubmenu = (submenu, menuActive) => {
		closeSubmenus()
		mainNavBackground(true)
		allowScroll(false)
		submenu.classList.add("active")
		menuActive.classList.add("active")
		btnBack.classList.add("active")
		overlay.classList.add("active")

		// Focus search input
		const input = submenu.querySelector("input[type=text]")
		if (input) {
			input.focus()
		}
	}

	const mainNavBackground = (state) => {
		if (state) {
			mainNav.classList.add("is-scrolling")
		} else {
			mainNav.classList.remove("is-scrolling")
		}
	}

	const allowScroll = (state) => {
		if (state) {
			body.classList.remove("overflow-hidden")
			lenis.start()
		} else {
			body.classList.add("overflow-hidden")
			lenis.stop()
		}
	}
}

export default menu
