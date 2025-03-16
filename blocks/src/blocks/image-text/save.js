/**
 * WordPress dependencies
 */
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

/**
 * Save component
 */
export default function save({ attributes }) {
	const { mediaUrl, mediaAlt, imagePosition, verticalAlignment } = attributes;

	const blockProps = useBlockProps.save({
		className: `wpgens-image-text align-${imagePosition} valign-${verticalAlignment}`,
	});

	const innerBlocksProps = useInnerBlocksProps.save({
		className: "wpgens-image-text-content",
	});

	return (
		<div {...blockProps}>
			<div className="wpgens-image-text-media">
				{mediaUrl && <img src={mediaUrl} alt={mediaAlt} />}
			</div>
			<div {...innerBlocksProps} />
		</div>
	);
}
