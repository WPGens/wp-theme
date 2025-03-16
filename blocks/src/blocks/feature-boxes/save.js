/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

/**
 * The save function for the Feature Boxes block.
 *
 * @param {Object} props               Block props.
 * @param {Object} props.attributes    Block attributes.
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
	const { columns, title, subtitle } = attributes;
	const blockProps = useBlockProps.save();

	return (
		<section {...blockProps} className='max-w-screen-2xl px-4 md:px-8 2xl:px-0 mx-auto relative'>
			<div className='text-center mb-6 md:mb-12'>
				<h2 className='text-3xl md:text-4xl lg:text-5xl text-white uppercase font-light mb-2 leading-none'>{title}</h2>
				<p className='uppercase md:tracking-[3px] text-primary-dark'>{subtitle}</p>
			</div>
			<div
				className={`flex flex-col md:flex-row space-y-8 md:space-x-8 md:space-y-0 text-center ${
					columns.length > 3 ? 'md:flex-wrap md:space-x-0 md:gap-8' : ''
				}`}
			>
				{columns.map((column, index) => (
					<a key={index} href={column.link} className='relative flex items-end md:items-center justify-center w-full border-black border-[12px]'>
						{column.image && <img src={column.image} className='w-full object-cover object-center h-64 md:h-auto' alt={column.title} />}
						<div className='absolute bg-black/40 w-full py-2 uppercase'>
							<span className='text-primary tracking-[1.5px] block'>{column.subtitle}</span>
							<h2 className='text-white text-4xl lg:text-[46px] tracking-tighter leading-none'>{column.title}</h2>
						</div>
					</a>
				))}
			</div>
		</section>
	);
}
