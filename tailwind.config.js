module.exports = {
	content: ["./**/*.php", "./**/*.html"],
	prefix: "tw-",
	theme: {
		extend: {
			colors: {
				primary: {
					DEFAULT: "#F1E7E8",
					100: "#f2f7eb",
					200: "#aad475",
					300: "#5e862a",
					400: "#435f1e",
				},
				secondary: {
					DEFAULT: "#E8F5E5",
					100: "#f3f3f3",
					200: "#c0c0c0",
					300: "#8c8c8e",
					400: "#59595b",
					500: "#272727",
				},
			},
			boxShadow: {
				neon: "0px 4px 5px 0px rgba(95, 94, 94, 0.19)",
			},
			fontFamily: {
				"open-sans": ['"Open Sans"', "sans-serif"],
			},
			maxWidth: {
				screen: "1496px",
				site: "1224px",
				"site-small": "816px",
			},
			fontSize: {
				"display-1": ["56px", "60px"],
				"display-2": ["48px", "54px"],
				"display-3": ["42px", "48px"],
				h1: ["37px", "42px"],
				h2: ["32px", "36px"],
				h3: ["27px", "30px"],
				h4: ["24px", "30px"],
				h5: ["21px", "24px"],
				h6: ["18px", "24px"],
				base: ["16px", "24px"],
				// Mobile variants
				"mobile-display-1": ["40px", "48px"],
				"mobile-display-2": ["37px", "42px"],
				"mobile-display-3": ["35px", "36px"],
				"mobile-h1": ["32px", "36px"],
				"mobile-h2": ["27px", "30px"],
				"mobile-h3": ["24px", "30px"],
				"mobile-h4": ["21px", "24px"],
				"mobile-h5": ["18px", "24px"],
				"mobile-h6": ["16px", "18px"],
			},
		},
	},
	variants: {
		backgroundColor: ["responsive", "hover", "focus", "group-hover"],
		textColor: ["responsive", "hover", "focus", "group-hover"],
	},
};
