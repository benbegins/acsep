const formJob = () => {
	const formSection = document.querySelector(".form-job")

	if (formSection) {
		const jobInput = formSection.querySelector(".form-job-offre input")
		const jobTitle = document.querySelector(".job-title")

		if (jobTitle) {
			jobInput.value = jobTitle.innerText
		} else {
			jobInput.value = "Candidature spontanée"
		}
	}
}

export default formJob
