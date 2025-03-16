/**
 * WordPress dependencies
 */
import { useBlockProps, RichText } from "@wordpress/block-editor";

/**
 * Save component
 */
export default function save({ attributes }) {
	const {
		text,
		url,
		backgroundColor,
		textColor,
		borderRadius,
		size,
		openInNewTab,
	} = attributes;

	const blockProps = useBlockProps.save({
		className: `wpgens-button wpgens-button-${size}`,
		style: {
			"--wpgens-button-bg-color": backgroundColor,
			"--wpgens-button-text-color": textColor,
			borderRadius: borderRadius + "px",
		},
	});

	const relAttributes = openInNewTab ? "noopener noreferrer" : undefined;
	const target = openInNewTab ? "_blank" : undefined;

	return (
		<div {...blockProps}>
			<a href={url} target={target} rel={relAttributes}>
				<RichText.Content tagName="span" value={text} />
			</a>
		</div>
	);
}
