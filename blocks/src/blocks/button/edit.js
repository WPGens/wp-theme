/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import {
	PanelBody,
	TextControl,
	RangeControl,
	SelectControl,
	ToggleControl,
} from "@wordpress/components";
import {
	useBlockProps,
	InspectorControls,
	RichText,
	PanelColorSettings,
} from "@wordpress/block-editor";

/**
 * Edit component
 */
export default function Edit({ attributes, setAttributes }) {
	const {
		text,
		url,
		backgroundColor,
		textColor,
		borderRadius,
		size,
		openInNewTab,
	} = attributes;

	const blockProps = useBlockProps({
		className: `wpgens-button wpgens-button-${size}`,
		style: {
			"--wpgens-button-bg-color": backgroundColor,
			"--wpgens-button-text-color": textColor,
			borderRadius: borderRadius + "px",
		},
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Button Settings", "wpgens-blocks")}>
					<TextControl
						label={__("URL", "wpgens-blocks")}
						value={url}
						onChange={(value) => setAttributes({ url: value })}
					/>
					<SelectControl
						label={__("Size", "wpgens-blocks")}
						value={size}
						options={[
							{
								label: __("Small", "wpgens-blocks"),
								value: "small",
							},
							{
								label: __("Medium", "wpgens-blocks"),
								value: "medium",
							},
							{
								label: __("Large", "wpgens-blocks"),
								value: "large",
							},
						]}
						onChange={(value) => setAttributes({ size: value })}
					/>
					<RangeControl
						label={__("Border Radius", "wpgens-blocks")}
						value={borderRadius}
						onChange={(value) =>
							setAttributes({ borderRadius: value })
						}
						min={0}
						max={50}
					/>
					<ToggleControl
						label={__("Open in new tab", "wpgens-blocks")}
						checked={openInNewTab}
						onChange={(value) =>
							setAttributes({ openInNewTab: value })
						}
					/>
				</PanelBody>
				<PanelColorSettings
					title={__("Color Settings", "wpgens-blocks")}
					initialOpen={false}
					colorSettings={[
						{
							value: backgroundColor,
							onChange: (value) =>
								setAttributes({ backgroundColor: value }),
							label: __("Background Color", "wpgens-blocks"),
						},
						{
							value: textColor,
							onChange: (value) =>
								setAttributes({ textColor: value }),
							label: __("Text Color", "wpgens-blocks"),
						},
					]}
				/>
			</InspectorControls>
			<div {...blockProps}>
				<RichText
					tagName="span"
					placeholder={__("Add text…", "wpgens-blocks")}
					value={text}
					onChange={(value) => setAttributes({ text: value })}
					keepPlaceholderOnFocus
				/>
			</div>
		</>
	);
}
