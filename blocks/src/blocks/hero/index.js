/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
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
// Import metadata from block.json
import metadata from "./block.json";

// Register the block
registerBlockType(metadata.name, {
	...metadata,
	edit: Edit,
	save,
});
