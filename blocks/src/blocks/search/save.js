/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function for the Search block.
 * This block is rendered dynamically on the server side.
 *
 * @param {Object} props               Block props.
 * @param {Object} props.attributes    Block attributes.
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
	const blockProps = useBlockProps.save();
	return <div {...blockProps}></div>;
}
