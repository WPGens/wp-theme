/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, RichText, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, BaseControl } from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import { plus, trash } from '@wordpress/icons';

/**
 * Internal dependencies
 */
import './editor.scss';

const ALLOWED_MEDIA_TYPES = ['image'];

/**
 * The edit function for the Feature Boxes block.
 *
 * @param {Object} props               Block props.
 * @param {Object} props.attributes    Block attributes.
 * @param {Function} props.setAttributes Function to set block attributes.
 * @return {WPElement} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	console.log('Feature Boxes Edit - Initial render with attributes:', attributes);
	const { columns = [], title, subtitle } = attributes;
	const blockProps = useBlockProps();

	// Track which panel is open
	const [selectedPanel, setSelectedPanel] = useState(null);

	const addNewColumn = () => {
		console.log('Adding new column');
		const newColumns = [
			...columns,
			{
				title: 'New Feature',
				subtitle: 'Feature Description',
				image: '',
				link: '#',
			},
		];
		console.log('New columns array:', newColumns);
		setAttributes({ columns: newColumns });
	};

	const updateColumn = (index, property, value) => {
		console.log(`Updating column ${index}, property ${property}:`, value);
		const newColumns = [...columns];
		newColumns[index] = {
			...newColumns[index],
			[property]: value,
		};
		setAttributes({ columns: newColumns });
	};

	const removeColumn = (index) => {
		console.log(`Removing column ${index}`);
		const newColumns = [...columns];
		newColumns.splice(index, 1);
		setAttributes({ columns: newColumns });
		setSelectedPanel(null);
	};

	// Feature box editor component
	const FeatureBoxEditor = ({ column, index }) => {
		console.log(`Rendering FeatureBoxEditor for index ${index}:`, column);
		if (!column) {
			console.log(`No column data for index ${index}`);
			return null;
		}

		return (
			<div>
				<TextControl label={__('Title', 'wpgens-blocks')} value={column.title || ''} onChange={(value) => updateColumn(index, 'title', value)} />
				<TextControl
					label={__('Subtitle', 'wpgens-blocks')}
					value={column.subtitle || ''}
					onChange={(value) => updateColumn(index, 'subtitle', value)}
				/>
				<TextControl label={__('Link', 'wpgens-blocks')} value={column.link || '#'} onChange={(value) => updateColumn(index, 'link', value)} />
				<BaseControl label={__('Image', 'wpgens-blocks')} className='editor-feature-image'>
					<MediaUploadCheck>
						{column.image ? (
							<div className='image-preview-wrapper'>
								<img src={column.image} alt={column.title || ''} className='image-preview' />
								<div className='image-actions'>
									<Button isDestructive onClick={() => updateColumn(index, 'image', '')}>
										{__('Remove', 'wpgens-blocks')}
									</Button>
									<MediaUpload
										onSelect={(media) => updateColumn(index, 'image', media.url)}
										onClose={() => console.log('Media modal closed')}
										allowedTypes={ALLOWED_MEDIA_TYPES}
										title={__('Select or Upload Image', 'wpgens-blocks')}
										value={column.image}
										render={({ open }) => (
											<Button isPrimary onClick={open}>
												{__('Replace', 'wpgens-blocks')}
											</Button>
										)}
									/>
								</div>
							</div>
						) : (
							<MediaUpload
								onSelect={(media) => updateColumn(index, 'image', media.url)}
								onClose={() => console.log('Media modal closed')}
								allowedTypes={ALLOWED_MEDIA_TYPES}
								title={__('Select or Upload Image', 'wpgens-blocks')}
								value={''}
								render={({ open }) => (
									<Button isPrimary onClick={open}>
										{__('Select Image', 'wpgens-blocks')}
									</Button>
								)}
							/>
						)}
					</MediaUploadCheck>
				</BaseControl>
				<Button isDestructive onClick={() => removeColumn(index)} className='remove-column-button'>
					{__('Remove Feature Box', 'wpgens-blocks')}
				</Button>
			</div>
		);
	};

	return (
		<div {...blockProps}>
			<InspectorControls>
				<PanelBody title={__('Section Settings', 'wpgens-blocks')}>
					<TextControl label={__('Section Title', 'wpgens-blocks')} value={title || ''} onChange={(value) => setAttributes({ title: value })} />
					<TextControl
						label={__('Section Subtitle', 'wpgens-blocks')}
						value={subtitle || ''}
						onChange={(value) => setAttributes({ subtitle: value })}
					/>
				</PanelBody>

				<PanelBody title={__('Feature Boxes', 'wpgens-blocks')}>
					{columns.map((column, index) => (
						<PanelBody
							key={index}
							title={`${__('Feature', 'wpgens-blocks')} ${index + 1}`}
							initialOpen={false}
							opened={selectedPanel === index}
							onToggle={() => {
								console.log(`Toggling panel ${index}, current selectedPanel:`, selectedPanel);
								setSelectedPanel(selectedPanel === index ? null : index);
							}}
						>
							<FeatureBoxEditor column={column} index={index} />
						</PanelBody>
					))}
					<Button isPrimary onClick={addNewColumn} className='add-column-button' icon={plus}>
						{__('Add Feature Box', 'wpgens-blocks')}
					</Button>
				</PanelBody>
			</InspectorControls>

			<div className='feature-boxes-editor'>
				<div className='text-center mb-6 md:mb-12'>
					<RichText
						tagName='h2'
						className='text-3xl md:text-4xl lg:text-5xl text-white uppercase font-light mb-2 leading-none'
						value={title || ''}
						onChange={(value) => setAttributes({ title: value })}
						placeholder={__('Section Title', 'wpgens-blocks')}
					/>
					<RichText
						tagName='p'
						className='uppercase md:tracking-[3px] text-primary-dark'
						value={subtitle || ''}
						onChange={(value) => setAttributes({ subtitle: value })}
						placeholder={__('Section Subtitle', 'wpgens-blocks')}
					/>
				</div>

				<div className={`flex flex-col md:flex-row space-y-8 md:space-x-8 md:space-y-0 text-center ${columns.length > 3 ? 'feature-boxes-grid' : ''}`}>
					{columns.length > 0 ? (
						columns.map((column, index) => (
							<div key={`preview-${index}`} className='relative flex items-end md:items-center justify-center w-full border-black border-[12px]'>
								{column.image ? (
									<img src={column.image} className='w-full object-cover object-center h-64 md:h-auto' alt={column.title || ''} />
								) : (
									<div className='w-full h-64 md:h-[300px] bg-gray-800 flex items-center justify-center'>
										<span className='text-white'>{__('Select an image', 'wpgens-blocks')}</span>
									</div>
								)}
								<div className='absolute bg-black/40 w-full py-2 uppercase'>
									<RichText
										tagName='span'
										className='text-primary tracking-[1.5px] block'
										value={column.subtitle || ''}
										onChange={(value) => updateColumn(index, 'subtitle', value)}
										placeholder={__('Subtitle', 'wpgens-blocks')}
									/>
									<RichText
										tagName='h2'
										className='text-white text-4xl lg:text-[46px] tracking-tighter leading-none'
										value={column.title || ''}
										onChange={(value) => updateColumn(index, 'title', value)}
										placeholder={__('Title', 'wpgens-blocks')}
									/>
								</div>
							</div>
						))
					) : (
						<div className='text-center w-full py-8 text-white'>
							<p>{__('Add feature boxes using the sidebar controls', 'wpgens-blocks')}</p>
							<Button isPrimary onClick={addNewColumn} className='add-column-button mt-4' icon={plus}>
								{__('Add Feature Box', 'wpgens-blocks')}
							</Button>
						</div>
					)}
				</div>
			</div>
		</div>
	);
}
