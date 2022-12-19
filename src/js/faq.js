const faq = () => {
	const faq = document.querySelector(".faq")

	if (faq) {
		const items = faq.querySelectorAll(".faq__item")

		items.forEach((item) => {
			const question = item.querySelector(".question")
			const reponse = item.querySelector(".reponse")
			let active = false

			question.addEventListener("click", () => {
				if (!active) {
					reponse.style.maxHeight = `${reponse.scrollHeight}px`
					question.classList.add("active")
					active = true
				} else {
					reponse.style.maxHeight = 0
					question.classList.remove("active")
					active = false
				}
			})
		})
	}
}

export default faq
