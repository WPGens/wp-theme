import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl } from '@wordpress/components';
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { image, trash } from '@wordpress/icons';

export function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps({
		'data-align': attributes.align,
	});
	const { slides, welcomeText } = attributes;

	const addSlide = () => {
		setAttributes({
			slides: [
				...slides,
				{
					desktopImage: { url: '', id: 0, alt: '' },
					mobileImage: { url: '', id: 0, alt: '' },
					title: '',
					date: '',
					place: '',
					buttonText: 'Buy Tickets',
					buttonUrl: '',
				},
			],
		});
	};

	const updateSlide = (index, field, value) => {
		const newSlides = [...slides];
		newSlides[index] = { ...newSlides[index], [field]: value };
		setAttributes({ slides: newSlides });
	};

	const removeSlide = (index) => {
		const newSlides = slides.filter((_, i) => i !== index);
		setAttributes({ slides: newSlides });
	};

	// Get first slide for preview
	const previewSlide = slides[0] || {
		desktopImage: { url: '', id: 0, alt: '' },
		mobileImage: { url: '', id: 0, alt: '' },
		title: '',
		date: '',
		place: '',
		buttonText: 'Buy Tickets',
		buttonUrl: '',
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Hero Slider Settings', 'wpgens-blocks')}>
					<TextControl label={__('Welcome Text', 'wpgens-blocks')} value={welcomeText} onChange={(value) => setAttributes({ welcomeText: value })} />
					<Button isPrimary onClick={addSlide} className='components-button'>
						{__('Add Slide', 'wpgens-blocks')}
					</Button>
				</PanelBody>
				{slides.map((slide, index) => (
					<PanelBody key={index} title={__('Slide', 'wpgens-blocks') + ' ' + (index + 1)} initialOpen={false}>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) => updateSlide(index, 'desktopImage', media)}
								allowedTypes={['image']}
								value={slide.desktopImage.id}
								render={({ open }) => (
									<div className='editor-post-featured-image'>
										{slide.desktopImage.url ? (
											<>
												<img src={slide.desktopImage.url} alt={slide.desktopImage.alt} />
												<div className='wpgens-image-buttons'>
													<Button variant='secondary' onClick={open} icon={image}>
														{__('Replace Desktop Image', 'wpgens-blocks')}
													</Button>
													<Button
														variant='secondary'
														onClick={() => updateSlide(index, 'desktopImage', { url: '', id: 0, alt: '' })}
														icon={trash}
														isDestructive
													>
														{__('Remove Desktop Image', 'wpgens-blocks')}
													</Button>
												</div>
											</>
										) : (
											<Button variant='secondary' className='wpgens-image-upload' onClick={open} icon={image}>
												{__('Set Desktop Image', 'wpgens-blocks')}
											</Button>
										)}
									</div>
								)}
							/>
						</MediaUploadCheck>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) => updateSlide(index, 'mobileImage', media)}
								allowedTypes={['image']}
								value={slide.mobileImage.id}
								render={({ open }) => (
									<div className='editor-post-featured-image'>
										{slide.mobileImage.url ? (
											<>
												<img src={slide.mobileImage.url} alt={slide.mobileImage.alt} />
												<div className='wpgens-image-buttons'>
													<Button variant='secondary' onClick={open} icon={image}>
														{__('Replace Mobile Image', 'wpgens-blocks')}
													</Button>
													<Button
														variant='secondary'
														onClick={() => updateSlide(index, 'mobileImage', { url: '', id: 0, alt: '' })}
														icon={trash}
														isDestructive
													>
														{__('Remove Mobile Image', 'wpgens-blocks')}
													</Button>
												</div>
											</>
										) : (
											<Button variant='secondary' className='wpgens-image-upload' onClick={open} icon={image}>
												{__('Set Mobile Image', 'wpgens-blocks')}
											</Button>
										)}
									</div>
								)}
							/>
						</MediaUploadCheck>
						<TextControl label={__('Title', 'wpgens-blocks')} value={slide.title} onChange={(value) => updateSlide(index, 'title', value)} />
						<TextControl label={__('Date', 'wpgens-blocks')} value={slide.date} onChange={(value) => updateSlide(index, 'date', value)} />
						<TextControl label={__('Place', 'wpgens-blocks')} value={slide.place} onChange={(value) => updateSlide(index, 'place', value)} />
						<TextControl
							label={__('Button Text', 'wpgens-blocks')}
							value={slide.buttonText}
							onChange={(value) => updateSlide(index, 'buttonText', value)}
						/>
						<TextControl
							label={__('Button URL', 'wpgens-blocks')}
							value={slide.buttonUrl}
							onChange={(value) => updateSlide(index, 'buttonUrl', value)}
						/>
						<Button isDestructive onClick={() => removeSlide(index)} className='components-button'>
							{__('Remove Slide', 'wpgens-blocks')}
						</Button>
					</PanelBody>
				))}
			</InspectorControls>
			<div {...blockProps}>
				<div
					className='absolute'
					style={{ background: 'rgba(0,0,0,0.5)', zIndex: 999, top: '80px', width: '100%', padding: '24px', textAlign: 'center' }}
				>
					<span className='inline-block' style={{ maxWidth: '768px' }}>
						{welcomeText}
					</span>
				</div>
				<div className='relative flex items-center justify-center md:h-[800px]'>
					<img
						src={previewSlide.desktopImage.url}
						className='hidden md:block h-[800px] absolute top-0 bg-cover object-cover'
						alt={previewSlide.desktopImage.alt}
					/>
					<img
						src={previewSlide.mobileImage.url}
						className='md:hidden h-[800px] absolute top-0 bg-cover object-cover'
						alt={previewSlide.mobileImage.alt}
					/>
					<div className='px-6 max-w-7xl w-full m-auto z-10 flex md:block h-screen md:h-auto items-end justify-center pb-10 md:pb-0'>
						<div className='text-white text-center md:text-left flex-grow'>
							<span className='md:hidden uppercase font-medium tracking-[2px] mb-12'>{previewSlide.date}</span>
							<h1 className='text-6xl text-primary md:text-[91px] font-black uppercase leading-none'>{previewSlide.title}</h1>
							<p className='hidden md:block uppercase text-primary font-medium tracking-[2px] mb-12'>
								{previewSlide.date} <span className='text-[#8EA3BF]'>&bull;</span> {previewSlide.place}
							</p>
							<p className='md:hidden uppercase text-primary font-medium tracking-[2px] mb-6 md:mb-12'>{previewSlide.place}</p>
							<a href={previewSlide.buttonUrl} className='hero-btn w-full md:w-auto !font-bold md:!font-normal'>
								{previewSlide.buttonText}
							</a>
						</div>
					</div>
				</div>
			</div>
		</>
	);
}
