/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import {
	PanelBody,
	TextControl,
	SelectControl,
	ToggleControl,
	RangeControl,
	Button,
} from "@wordpress/components";
import {
	useBlockProps,
	InspectorControls,
	RichText,
	MediaUpload,
	MediaUploadCheck,
	PanelColorSettings,
} from "@wordpress/block-editor";
import { image, trash } from "@wordpress/icons";

/**
 * Edit component
 */
export default function Edit({ attributes, setAttributes }) {
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

	const onSelectImage = (media) => {
		setAttributes({
			backgroundImage: {
				url: media.url,
				id: media.id,
				alt: media.alt || "",
			},
		});
	};

	const onRemoveImage = () => {
		setAttributes({
			backgroundImage: {
				url: "",
				id: 0,
				alt: "",
			},
		});
	};

	const blockProps = useBlockProps({
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

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Hero Settings", "wpgens-blocks")}>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={onSelectImage}
							allowedTypes={["image"]}
							value={backgroundImage.id}
							render={({ open }) => (
								<div className="editor-post-featured-image">
									{backgroundImage.url ? (
										<>
											<img
												src={backgroundImage.url}
												alt={backgroundImage.alt}
											/>
											<div className="wpgens-image-buttons">
												<Button
													variant="secondary"
													onClick={open}
													icon={image}
												>
													{__(
														"Replace Image",
														"wpgens-blocks"
													)}
												</Button>
												<Button
													variant="secondary"
													onClick={onRemoveImage}
													icon={trash}
													isDestructive
												>
													{__(
														"Remove Image",
														"wpgens-blocks"
													)}
												</Button>
											</div>
										</>
									) : (
										<Button
											variant="secondary"
											className="wpgens-image-upload"
											onClick={open}
											icon={image}
										>
											{__(
												"Set Background Image",
												"wpgens-blocks"
											)}
										</Button>
									)}
								</div>
							)}
						/>
					</MediaUploadCheck>

					<SelectControl
						label={__("Height", "wpgens-blocks")}
						value={height}
						options={[
							{
								label: __("Full height", "wpgens-blocks"),
								value: "full",
							},
							{
								label: __("2/3 height", "wpgens-blocks"),
								value: "two-thirds",
							},
						]}
						onChange={(value) => setAttributes({ height: value })}
					/>

					<TextControl
						label={__("Button URL", "wpgens-blocks")}
						value={buttonUrl}
						onChange={(value) =>
							setAttributes({ buttonUrl: value })
						}
					/>

					<ToggleControl
						label={__("Open in new tab", "wpgens-blocks")}
						checked={openInNewTab}
						onChange={(value) =>
							setAttributes({ openInNewTab: value })
						}
					/>

					<RangeControl
						label={__("Overlay Opacity", "wpgens-blocks")}
						value={overlayOpacity}
						onChange={(value) =>
							setAttributes({ overlayOpacity: value })
						}
						min={0}
						max={100}
					/>
				</PanelBody>

				<PanelColorSettings
					title={__("Color Settings", "wpgens-blocks")}
					initialOpen={false}
					colorSettings={[
						{
							value: textColor,
							onChange: (value) =>
								setAttributes({ textColor: value }),
							label: __("Text Color", "wpgens-blocks"),
						},
						{
							value: overlayColor,
							onChange: (value) =>
								setAttributes({ overlayColor: value }),
							label: __("Overlay Color", "wpgens-blocks"),
						},
						{
							value: buttonBackgroundColor,
							onChange: (value) =>
								setAttributes({ buttonBackgroundColor: value }),
							label: __(
								"Button Background Color",
								"wpgens-blocks"
							),
						},
						{
							value: buttonTextColor,
							onChange: (value) =>
								setAttributes({ buttonTextColor: value }),
							label: __("Button Text Color", "wpgens-blocks"),
						},
					]}
				/>
			</InspectorControls>

			<div {...blockProps}>
				{backgroundImage.url && (
					<div
						className="wpgens-hero-background"
						style={{
							backgroundImage: `url(${backgroundImage.url})`,
						}}
					></div>
				)}

				<div
					className="wpgens-hero-overlay"
					style={{ backgroundColor: getOverlayColorWithOpacity() }}
				></div>

				<div
					className="wpgens-hero-content"
					style={{ color: textColor }}
				>
					<RichText
						tagName="h2"
						className="wpgens-hero-title"
						placeholder={__("Add title…", "wpgens-blocks")}
						value={title}
						onChange={(value) => setAttributes({ title: value })}
						keepPlaceholderOnFocus
					/>

					<RichText
						tagName="p"
						className="wpgens-hero-subtitle"
						placeholder={__("Add subtitle…", "wpgens-blocks")}
						value={subtitle}
						onChange={(value) => setAttributes({ subtitle: value })}
						keepPlaceholderOnFocus
					/>

					<div className="wpgens-hero-button-container">
						<div
							className="wpgens-hero-button"
							style={{
								backgroundColor: buttonBackgroundColor,
								color: buttonTextColor,
							}}
						>
							<RichText
								tagName="span"
								placeholder={__(
									"Add button text…",
									"wpgens-blocks"
								)}
								value={buttonText}
								onChange={(value) =>
									setAttributes({ buttonText: value })
								}
								keepPlaceholderOnFocus
							/>
						</div>
					</div>
				</div>
			</div>
		</>
	);
}
