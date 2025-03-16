/**
 * WordPress dependencies
 */
import { registerBlockType } from "@wordpress/blocks";

/**
 * Internal dependencies
 */
import Edit from "./edit";
import save from "./save";
import "./style.scss";
import "./editor.scss";

/**
 * Register block
 */
import metadata from "./block.json";

registerBlockType(metadata.name, {
	...metadata,
	edit: Edit,
	save,
});
