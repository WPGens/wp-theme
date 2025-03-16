/**
 * WordPress dependencies
 */
import { useBlockProps, RichText } from "@wordpress/block-editor";

/**
 * Save component
 */
export default function save({ attributes }) {
	const {
		backgroundImage,
		height,
		title,
		subtitle,
		buttonText,
		buttonUrl,
		buttonBackgroundColor,
		buttonTextColor,
		textColor,
		overlayColor,
		overlayOpacity,
		openInNewTab,
	} = attributes;

	const blockProps = useBlockProps.save({
		className: `wpgens-hero wpgens-hero-${height}`,
	});

	// Calculate overlay color with opacity
	const getOverlayColorWithOpacity = () => {
		// If the overlay color is in rgba format
		if (overlayColor && overlayColor.includes("rgba")) {
			// Replace the opacity value
			return overlayColor.replace(
				/rgba\((\d+),\s*(\d+),\s*(\d+),\s*[\d.]+\)/,
				`rgba($1, $2, $3, ${overlayOpacity / 100})`
			);
		}
		// If the overlay color is in hex or rgb format
		else if (overlayColor) {
			// Convert hex to rgb if needed
			let r, g, b;

			// Check if it's already rgb format
			const rgbMatch = overlayColor.match(
				/rgb\((\d+),\s*(\d+),\s*(\d+)\)/
			);
			if (rgbMatch) {
				[, r, g, b] = rgbMatch;
			} else {
				// Assume hex format
				const hex = overlayColor.replace("#", "");
				r = parseInt(hex.substring(0, 2), 16);
				g = parseInt(hex.substring(2, 4), 16);
				b = parseInt(hex.substring(4, 6), 16);
			}

			return `rgba(${r}, ${g}, ${b}, ${overlayOpacity / 100})`;
		}

		return "rgba(0, 0, 0, 0.4)"; // Default
	};

	const relAttributes = openInNewTab ? "noopener noreferrer" : undefined;
	const target = openInNewTab ? "_blank" : undefined;

	return (
		<div {...blockProps}>
			{backgroundImage.url && (
				<div
					className="wpgens-hero-background"
					style={{ backgroundImage: `url(${backgroundImage.url})` }}
				></div>
			)}

			<div
				className="wpgens-hero-overlay"
				style={{ backgroundColor: getOverlayColorWithOpacity() }}
			></div>

			<div className="wpgens-hero-content" style={{ color: textColor }}>
				<RichText.Content
					tagName="h2"
					className="wpgens-hero-title"
					value={title}
				/>

				<RichText.Content
					tagName="p"
					className="wpgens-hero-subtitle"
					value={subtitle}
				/>

				{buttonText && buttonUrl && (
					<div className="wpgens-hero-button-container">
						<a
							href={buttonUrl}
							target={target}
							rel={relAttributes}
							className="wpgens-hero-button"
							style={{
								backgroundColor: buttonBackgroundColor,
								color: buttonTextColor,
							}}
						>
							<RichText.Content
								tagName="span"
								value={buttonText}
							/>
						</a>
					</div>
				)}
			</div>
		</div>
	);
}
