module.exports = {
	content: ['./**/*.php', './**/*.html'],
	prefix: 'tw-',
	theme: {
		extend: {
			colors: {
				primary: '#F1E7E8',
				green: '#E8F5E5',
				gray: '#F6F6F6',
				black: '#393939',
			},
			boxShadow: {
				neon: '0px 4px 5px 0px rgba(95, 94, 94, 0.19)',
			},
			fontFamily: {
				Raleway: ['Raleway'],
				Assistant: ['Assistant'],
			},
			maxWidth: {
				screen: '1496px',
			},
			fontSize: {
				'4xl': [
					'36px',
					{
						lineHeight: '1',
					},
				],
				'5xl': [
					'46px',
					{
						lineHeight: '1',
					},
				],
			},
		},
	},
	variants: {
		backgroundColor: ['responsive', 'hover', 'focus', 'group-hover'],
		textColor: ['responsive', 'hover', 'focus', 'group-hover'],
	},
};
