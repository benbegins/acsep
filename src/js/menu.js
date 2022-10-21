const menu = () => {
	const burger = document.querySelector(".site-header .burger")
	const menuMobile = document.querySelector(".site-header .main-menu")
	const btnClose = document.querySelector(".site-header .btn-close")
	const btnsSub = document.querySelectorAll(".site-header .btn-sub")
	const btnBack = document.querySelector(".site-header .btn-back")
	const overlay = document.querySelector(".site-header .overlay")

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

	// Functions
	const closeSubmenus = () => {
		btnBack.classList.remove("active")
		overlay.classList.remove("active")

		btnsSub.forEach((btn) => {
			btn.classList.remove("active")
		})

		const submenus = document.querySelectorAll(".site-header .submenu")
		submenus.forEach((submenu) => {
			submenu.classList.remove("active")
		})
	}
	const openSubmenu = (submenu, menuActive) => {
		closeSubmenus()
		submenu.classList.add("active")
		menuActive.classList.add("active")
		btnBack.classList.add("active")
		overlay.classList.add("active")
	}
}

export default menu
