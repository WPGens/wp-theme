/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

/**
 * The save function for the FAQ block.
 *
 * @param {Object} props               Block props.
 * @param {Object} props.attributes    Block attributes.
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
	const { faqs, title, subtitle } = attributes;
	const blockProps = useBlockProps.save();

	return (
		<section {...blockProps} className='md:bg-[#0C1015] md:py-32 px-9 relative overflow-hidden'>
			<div className='hidden md:block bg-gradient'></div>
			<div className='max-w-screen-xl mx-auto flex flex-col md:flex-row'>
				<div className='text-white max-w-md md:mr-32'>
					<RichText.Content tagName='h2' className='text-[32px] uppercase font-light mb-3' value={title} />
					<RichText.Content tagName='p' className='mb-9 leading-7 font-light' value={subtitle} />
				</div>
				<div className='pt-12 md:pt-0'>
					{faqs.map((faq, index) => (
						<div key={index} className='border-b text-white border-[#5E5E5E] pb-5 md:pb-10 pt-5 md:pt-10'>
							<div className='accordion flex cursor-pointer justify-between'>
								<div className='flex'>
									<span className='hidden md:inline-block text-secondary'>0{index + 1}/</span>
									<div className='max-w-lg'>
										<RichText.Content
											tagName='p'
											className='md:text-[17px] md:uppercase tracking-[0.85px] md:leading-6 mr-6 md:mx-6'
											value={faq.question}
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
							<div className='panel h-0 overflow-hidden transition-all duration-300 ease-in-out'>
								<div className='py-6 leading-7 font-light'>
									<RichText.Content tagName='div' value={faq.answer} />
								</div>
							</div>
						</div>
					))}
				</div>
			</div>
		</section>
	);
}
