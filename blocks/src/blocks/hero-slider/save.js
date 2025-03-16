import { useBlockProps } from '@wordpress/block-editor';

export function Save({ attributes }) {
	const blockProps = useBlockProps.save();
	const { slides, welcomeText } = attributes;

	return (
		<div {...blockProps}>
			<div className='absolute' style={{ background: 'rgba(0,0,0,0.5)', zIndex: 999, top: '80px', width: '100%', padding: '24px', textAlign: 'center' }}>
				<span className='inline-block' style={{ maxWidth: '768px' }}>
					{welcomeText}
				</span>
			</div>
			<div className='swiper mySwiper'>
				<div className='swiper-wrapper'>
					{slides.map((slide, index) => (
						<div key={index} className='swiper-slide flex items-center justify-center md:h-[800px]'>
							<img
								src={slide.desktopImage.url}
								className='hidden md:block h-[800px] absolute top-0 bg-cover object-cover'
								alt={slide.desktopImage.alt}
							/>
							<img src={slide.mobileImage.url} className='md:hidden h-[800px] absolute top-0 bg-cover object-cover' alt={slide.mobileImage.alt} />
							<div className='px-6 max-w-7xl w-full m-auto z-10 flex md:block h-screen md:h-auto items-end justify-center pb-10 md:pb-0'>
								<div className='text-white text-center md:text-left flex-grow'>
									<span className='md:hidden uppercase font-medium tracking-[2px] mb-12'>{slide.date}</span>
									<h1 className='text-6xl text-primary md:text-[91px] font-black uppercase leading-none'>{slide.title}</h1>
									<p className='hidden md:block uppercase text-primary font-medium tracking-[2px] mb-12'>
										{slide.date} <span className='text-[#8EA3BF]'>&bull;</span> {slide.place}
									</p>
									<p className='md:hidden uppercase text-primary font-medium tracking-[2px] mb-6 md:mb-12'>{slide.place}</p>
									<a href={slide.buttonUrl} className='hero-btn w-full md:w-auto !font-bold md:!font-normal'>
										{slide.buttonText}
									</a>
								</div>
							</div>
						</div>
					))}
				</div>
				<div className='swiper-button-next w-12 h-12 text-white rounded-full bg-[#232222]'></div>
				<div className='swiper-button-prev w-12 h-12 text-white rounded-full bg-[#232222]'></div>
			</div>
		</div>
	);
}
