/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { PanelBody, Button, SelectControl } from "@wordpress/components";
import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
	useInnerBlocksProps,
} from "@wordpress/block-editor";
import { image } from "@wordpress/icons";

const ALLOWED_BLOCKS = ["core/heading", "core/paragraph", "wpgens/button"];
const TEMPLATE = [
	["core/heading", { level: 2, placeholder: "Add a heading..." }],
	["core/paragraph", { placeholder: "Add content..." }],
];

/**
 * Edit component
 */
export default function Edit({ attributes, setAttributes }) {
	const { mediaId, mediaUrl, mediaAlt, imagePosition, verticalAlignment } =
		attributes;

	const blockProps = useBlockProps({
		className: `wpgens-image-text align-${imagePosition} valign-${verticalAlignment}`,
	});

	const innerBlocksProps = useInnerBlocksProps(
		{ className: "wpgens-image-text-content" },
		{
			allowedBlocks: ALLOWED_BLOCKS,
			template: TEMPLATE,
		}
	);

	const onSelectImage = (media) => {
		setAttributes({
			mediaId: media.id,
			mediaUrl: media.url,
			mediaAlt: media.alt || "",
		});
	};

	const onRemoveImage = () => {
		setAttributes({
			mediaId: undefined,
			mediaUrl: "",
			mediaAlt: "",
		});
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Layout Settings", "wpgens-blocks")}>
					<SelectControl
						label={__("Image Position", "wpgens-blocks")}
						value={imagePosition}
						options={[
							{
								label: __("Left", "wpgens-blocks"),
								value: "left",
							},
							{
								label: __("Right", "wpgens-blocks"),
								value: "right",
							},
						]}
						onChange={(value) =>
							setAttributes({ imagePosition: value })
						}
					/>
					<SelectControl
						label={__("Vertical Alignment", "wpgens-blocks")}
						value={verticalAlignment}
						options={[
							{ label: __("Top", "wpgens-blocks"), value: "top" },
							{
								label: __("Center", "wpgens-blocks"),
								value: "center",
							},
							{
								label: __("Bottom", "wpgens-blocks"),
								value: "bottom",
							},
						]}
						onChange={(value) =>
							setAttributes({ verticalAlignment: value })
						}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<div className="wpgens-image-text-media">
					<MediaUploadCheck>
						<MediaUpload
							onSelect={onSelectImage}
							allowedTypes={["image"]}
							value={mediaId}
							render={({ open }) => (
								<div className="wpgens-image-text-upload">
									{mediaUrl ? (
										<>
											<img
												src={mediaUrl}
												alt={mediaAlt}
											/>
											<div className="wpgens-image-text-buttons">
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
											onClick={open}
											icon={image}
											className="wpgens-image-text-button"
										>
											{__("Add Image", "wpgens-blocks")}
										</Button>
									)}
								</div>
							)}
						/>
					</MediaUploadCheck>
				</div>
				<div {...innerBlocksProps} />
			</div>
		</>
	);
}
