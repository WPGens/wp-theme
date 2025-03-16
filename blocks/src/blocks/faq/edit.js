/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, RichText } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl } from '@wordpress/components';
import { plus, trash } from '@wordpress/icons';

/**
 * Internal dependencies
 */
import './editor.scss';

/**
 * The edit function for the FAQ block.
 *
 * @param {Object} props               Block props.
 * @param {Object} props.attributes    Block attributes.
 * @param {Function} props.setAttributes Function to set block attributes.
 * @return {WPElement} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { faqs = [], title, subtitle } = attributes;
	const blockProps = useBlockProps();

	const addNewFaq = () => {
		const newFaqs = [
			...faqs,
			{
				question: 'New Question',
				answer: 'Answer goes here',
			},
		];
		setAttributes({ faqs: newFaqs });
	};

	const updateFaq = (index, property, value) => {
		const newFaqs = [...faqs];
		newFaqs[index] = {
			...newFaqs[index],
			[property]: value,
		};
		setAttributes({ faqs: newFaqs });
	};

	const removeFaq = (index) => {
		const newFaqs = [...faqs];
		newFaqs.splice(index, 1);
		setAttributes({ faqs: newFaqs });
	};

	return (
		<div {...blockProps}>
			<InspectorControls>
				<PanelBody title={__('FAQ Settings', 'wpgens-blocks')}>
					<TextControl label={__('Section Title', 'wpgens-blocks')} value={title || ''} onChange={(value) => setAttributes({ title: value })} />
					<TextControl
						label={__('Section Subtitle', 'wpgens-blocks')}
						value={subtitle || ''}
						onChange={(value) => setAttributes({ subtitle: value })}
					/>
				</PanelBody>

				<PanelBody title={__('FAQ Items', 'wpgens-blocks')}>
					{faqs.map((faq, index) => (
						<div key={index} className='faq-item-editor'>
							<TextControl
								label={__('Question', 'wpgens-blocks')}
								value={faq.question || ''}
								onChange={(value) => updateFaq(index, 'question', value)}
							/>
							<TextControl
								label={__('Answer', 'wpgens-blocks')}
								value={faq.answer || ''}
								onChange={(value) => updateFaq(index, 'answer', value)}
							/>
							<Button isDestructive onClick={() => removeFaq(index)} icon={trash}>
								{__('Remove FAQ', 'wpgens-blocks')}
							</Button>
						</div>
					))}
					<Button isPrimary onClick={addNewFaq} className='add-faq-button' icon={plus}>
						{__('Add FAQ', 'wpgens-blocks')}
					</Button>
				</PanelBody>
			</InspectorControls>

			<section className='md:bg-[#0C1015] md:py-32 px-9 relative overflow-hidden'>
				<div className='hidden md:block bg-gradient'></div>
				<div className='max-w-screen-xl mx-auto flex flex-col md:flex-row'>
					<div className='text-white max-w-md md:mr-32'>
						<RichText
							tagName='h2'
							className='text-[32px] uppercase font-light mb-3'
							value={title || ''}
							onChange={(value) => setAttributes({ title: value })}
							placeholder={__('Section Title', 'wpgens-blocks')}
						/>
						<RichText
							tagName='p'
							className='mb-9 leading-7 font-light'
							value={subtitle || ''}
							onChange={(value) => setAttributes({ subtitle: value })}
							placeholder={__('Section Subtitle', 'wpgens-blocks')}
						/>
					</div>
					<div className='pt-12 md:pt-0'>
						{faqs.map((faq, index) => (
							<div key={index} className='border-b text-white border-[#5E5E5E] pb-5 md:pb-10 pt-5 md:pt-10'>
								<div className='accordion flex cursor-pointer justify-between'>
									<div className='flex'>
										<span className='hidden md:inline-block text-secondary'>0{index + 1}/</span>
										<div className='max-w-lg'>
											<RichText
												tagName='p'
												className='md:text-[17px] md:uppercase tracking-[0.85px] md:leading-6 mr-6 md:mx-6'
												value={faq.question || ''}
												onChange={(value) => updateFaq(index, 'question', value)}
												placeholder={__('Question', 'wpgens-blocks')}
											/>
										</div>
									</div>
									<svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 22 22' fill='none'>
										<g clipPath='url(#clip0_838_4210)'>
											<path
												d='M12.1448 -1.99585L12.1469 9.85026L23.9923 9.85165L23.9909 12.1484L12.1469 12.1442L12.1503 23.9889L9.85359 23.9903L9.85221 12.1449L-1.9939 12.1428L-1.99183 9.84681L9.85083 9.84819L9.84875 -1.99377L12.1448 -1.99585Z'
												fill='#CFA568'
											/>
										</g>
										<defs>
											<clipPath id='clip0_838_4210'>
												<rect width='22' height='22' fill='white' />
											</clipPath>
										</defs>
									</svg>
								</div>
								<div className='panel'>
									<div className='py-6 leading-7 font-light'>
										<RichText
											tagName='div'
											value={faq.answer || ''}
											onChange={(value) => updateFaq(index, 'answer', value)}
											placeholder={__('Answer', 'wpgens-blocks')}
										/>
									</div>
								</div>
							</div>
						))}
						{faqs.length === 0 && (
							<div className='text-center py-8 text-white'>
								<p>{__('Add FAQ items using the sidebar controls', 'wpgens-blocks')}</p>
								<Button isPrimary onClick={addNewFaq} className='add-faq-button mt-4' icon={plus}>
									{__('Add FAQ', 'wpgens-blocks')}
								</Button>
							</div>
						)}
					</div>
				</div>
			</section>
		</div>
	);
}
