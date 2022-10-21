module.exports = {
	content: ["./**/*.php", "./**/*.twig"],
	theme: {
		colors: {
			dark: "#182630",
			light: "#ffffff",
			pink: "#CB2A6E",
			gray: "#D0D5D9",
		},
		container: {
			padding: {
				DEFAULT: "1.5rem",
				sm: "3rem",
				lg: "4vw",
			},
			center: true,
		},
		fontSize: {
			sm: ["0.75rem", "1.5"],
			base: ["1rem", "1.5"],
			lg: ["1.25rem", "1.5"],
			xl: ["1.675rem", "1.25"],
			"2xl": ["2.625rem", "1.14"],
			"3xl": ["4.25rem", "1.14"],
			"4xl": ["5.5rem", "1"],
		},
		screens: {
			sm: "640px",
			md: "768px",
			lg: "1024px",
			xl: "1280px",
			xxl: "1480px",
		},

		// Extend
		extend: {
			padding: {
				section: "104px",
				"section-mobile": "80px",
			},
		},
	},
	variants: {},
	plugins: [],
}
