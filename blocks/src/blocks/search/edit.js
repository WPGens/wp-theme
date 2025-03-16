/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

/**
 * Internal dependencies
 */
import './editor.scss';

/**
 * The edit function for the Search block.
 *
 * @param {Object} props               Block props.
 * @param {Object} props.attributes    Block attributes.
 * @param {Function} props.setAttributes Function to set block attributes.
 * @return {WPElement} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { showCity } = attributes;
	const blockProps = useBlockProps();

	return (
		<div {...blockProps}>
			<InspectorControls>
				<PanelBody title={__('Search Settings', 'wpgens-blocks')}>
					<ToggleControl label={__('Show City Filter', 'wpgens-blocks')} checked={showCity} onChange={() => setAttributes({ showCity: !showCity })} />
				</PanelBody>
			</InspectorControls>

			<div className='search-bar max-w-screen-xl px-8 lg:px-0 w-full m-auto -mt-12 relative'>
				<div className='bg-[#0C1015] pt-5 pb-0 pl-6 pr-6 lg:pr-0'>
					<div className={`grid grid-cols-1 lg:grid-cols-${showCity ? '5' : '4'} gap-6`}>
						<div className='flex flex-col'>
							<label htmlFor='start_date' className='text-[#969696] uppercase pb-1 text-xs font-medium'>
								From
							</label>
							<input type='date' id='start_date' className='block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light' />
						</div>
						<div className='flex flex-col with-border'>
							<label htmlFor='end_date' className='text-[#969696] uppercase pb-1 text-xs font-medium'>
								To
							</label>
							<input type='date' id='end_date' className='block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light' />
						</div>
						<div className='flex flex-col with-border'>
							<label htmlFor='event_type' className='text-[#969696] uppercase pb-1 text-xs font-medium'>
								Category
							</label>
							<select id='event_type' className='block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light -ml-1'>
								<option value=''>Event Type</option>
							</select>
						</div>
						{showCity && (
							<div className='flex flex-col with-border'>
								<label htmlFor='city' className='text-[#969696] uppercase pb-1 text-xs font-medium'>
									City
								</label>
								<select id='city' className='block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light -ml-1'>
									<option value=''>All</option>
								</select>
							</div>
						)}
						<div className='block -mt-5'>
							<button
								type='button'
								className='bg-primary text-center text-black w-full font-semibold uppercase text-[17px] tracking-[1px] h-16 my-6 lg:my-0 lg:h-20 hover:bg-black hover:text-primary'
							>
								Search
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
}
