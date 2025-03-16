import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import metadata from './block.json';
import { Edit } from './edit';
import { Save } from './save';
import './editor.scss';
import './style.scss';

registerBlockType(metadata.name, {
	...metadata,
	edit: Edit,
	save: Save,
});
