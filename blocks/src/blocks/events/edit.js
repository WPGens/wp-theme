import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, FormTokenField, Spinner } from '@wordpress/components';
import { useEffect, useState } from '@wordpress/element';
import { useSelect, select } from '@wordpress/data';
import { store as coreStore } from '@wordpress/core-data';
import { decodeEntities } from '@wordpress/html-entities';

export function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps({
		'data-align': attributes.align,
	});

	// Initialize selectedEvents as empty array if undefined
	const { selectedEvents = [], viewAllUrl } = attributes;
	const [isLoading, setIsLoading] = useState(true);
	const [searchTerm, setSearchTerm] = useState('');
	const [suggestions, setSuggestions] = useState([]);
	const [selectedTokens, setSelectedTokens] = useState([]);

	// Get selected events data and search suggestions
	const { events, allEvents } = useSelect(
		(select) => {
			// Get selected events
			let selectedEventsData = [];
			if (selectedEvents.length > 0) {
				const selectedRecords = select(coreStore).getEntityRecords('postType', 'events', {
					include: selectedEvents,
					per_page: selectedEvents.length,
					_embed: true, // Include featured media
				});

				if (selectedRecords) {
					selectedEventsData = selectedRecords;
				}
			}

			// Get events for search
			const query = {
				per_page: 100,
				status: 'publish',
				orderby: 'date',
				order: 'desc',
			};

			if (searchTerm) {
				query.search = searchTerm;
			}

			const records = select(coreStore).getEntityRecords('postType', 'events', query);

			return {
				events: selectedEventsData,
				allEvents: records || [],
			};
		},
		[selectedEvents, searchTerm],
	);

	// Update suggestions when search term or all events change
	useEffect(() => {
		if (allEvents && allEvents.length > 0) {
			const eventSuggestions = allEvents
				.filter((event) => !selectedEvents.includes(event.id.toString()))
				.map((event) => ({
					id: event.id.toString(),
					name: decodeEntities(event.title.rendered),
				}));
			setSuggestions(eventSuggestions);
			setIsLoading(false);
		} else if (allEvents) {
			setSuggestions([]);
			setIsLoading(false);
		}
	}, [allEvents, selectedEvents]);

	// Update selected tokens when events change
	useEffect(() => {
		if (events) {
			const tokens = events.map((event) => decodeEntities(event.title.rendered));
			setSelectedTokens(tokens);
		}
	}, [events]);

	// Get featured image URL from embedded media
	const getFeaturedImageUrl = (event) => {
		if (
			event._embedded &&
			event._embedded['wp:featuredmedia'] &&
			event._embedded['wp:featuredmedia'][0] &&
			event._embedded['wp:featuredmedia'][0].source_url
		) {
			return event._embedded['wp:featuredmedia'][0].source_url;
		}
		return '';
	};

	// Format date for display
	const formatEventDate = (dateString) => {
		if (!dateString) return { day: '', month: '', date: '' };

		const date = new Date(dateString);
		const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
		const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

		return {
			day: days[date.getDay()],
			month: months[date.getMonth()],
			date: date.getDate(),
		};
	};

	// Truncate text with ellipsis
	const truncateText = (text, maxLength) => {
		if (!text) return '';
		if (text.length <= maxLength) return text;
		return text.substring(0, maxLength) + '...';
	};

	// Handle token selection
	const handleTokenChange = (tokens) => {
		// Find removed tokens
		const removedTokens = selectedTokens.filter((token) => !tokens.includes(token));

		if (removedTokens.length > 0) {
			// Find the event ID for the removed token
			const removedToken = removedTokens[0];
			const eventToRemove = events.find((event) => decodeEntities(event.title.rendered) === removedToken);

			if (eventToRemove) {
				// Remove the event ID from selectedEvents
				const newSelectedEvents = selectedEvents.filter((id) => id !== eventToRemove.id.toString());
				setAttributes({ selectedEvents: newSelectedEvents });
			}
		} else if (tokens.length > selectedTokens.length) {
			// A new token was added
			const newToken = tokens.find((token) => !selectedTokens.includes(token));
			const matchingEvent = suggestions.find((event) => event.name === newToken);

			if (matchingEvent) {
				// Add the event ID to selectedEvents
				setAttributes({
					selectedEvents: [...selectedEvents, matchingEvent.id],
				});
			}
		}
	};

	// Handle search input change
	const handleSearchChange = (value) => {
		setSearchTerm(value);
		setIsLoading(true);
	};

	// Handle refresh button
	const handleRefresh = () => {
		setIsLoading(true);
		setSearchTerm('');
		select(coreStore).invalidateResolution('getEntityRecords', ['postType', 'events']);
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Events Slider Settings', 'wpgens-blocks')}>
					<FormTokenField
						label={__('Search and Select Events', 'wpgens-blocks')}
						value={selectedTokens}
						suggestions={suggestions.map((event) => event.name)}
						onChange={handleTokenChange}
						onInputChange={handleSearchChange}
						maxSuggestions={10}
						placeholder={__('Type to search events...', 'wpgens-blocks')}
					/>

					{isLoading && (
						<div style={{ textAlign: 'center', padding: '10px' }}>
							<Spinner />
						</div>
					)}

					<TextControl label={__('View All URL', 'wpgens-blocks')} value={viewAllUrl} onChange={(value) => setAttributes({ viewAllUrl: value })} />

					<Button isPrimary onClick={handleRefresh} className='components-button'>
						{__('Refresh Events', 'wpgens-blocks')}
					</Button>
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				<section className='max-w-screen-2xl px-4 md:px-8 2xl:px-0 my-16 md:my-32 mx-auto relative'>
					<button
						aria-label='slide backward'
						className='hidden md:inline-block rounded-full text-center absolute z-30 ml-5 2xl:-ml-5 w-10 h-10 bg-primary cursor-pointer'
						style={{ top: '40%', transform: 'translateY(-50%)' }}
						id='prev'
					>
						<svg className='text-black inline' width='8' height='14' viewBox='0 0 8 14' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M7 1L1 7L7 13' stroke='currentColor' strokeWidth='2' strokeLinecap='round' strokeLinejoin='round' />
						</svg>
					</button>
					<div className='w-full h-full mx-auto overflow-x-hidden overflow-y-hidden'>
						<div id='slider' className='grid grid-cols-2 gap-4 md:flex md:space-x-4 transition ease-out duration-700'>
							{isLoading && !events?.length ? (
								<div className='col-span-2 text-center py-8'>
									<Spinner />
									{__('Loading events...', 'wpgens-blocks')}
								</div>
							) : events && events.length > 0 ? (
								events.map((event) => {
									const eventDate = formatEventDate(event.meta?.start_date);
									const venue = event.meta?.venue || '';
									const title = decodeEntities(event.title.rendered);

									return (
										<a key={event.id} href='#' className='flex flex-col flex-shrink-0 bg-black md:w-[280px] border-b-[3px] border-primary'>
											{event.featured_media ? (
												<img src={getFeaturedImageUrl(event)} alt={title} className='w-full' />
											) : (
												<div className='w-full h-48 bg-gray-800'></div>
											)}
											<div className='flex items-center text-white relative pr-4'>
												<div className='absolute -top-8 h-8 w-full bg-gradient-to-t from-black to-transparent'></div>
												<div className='flex flex-col w-16 md:w-16 flex-shrink-0 py-2 text-center text-[12px] font-semibold tracking-[1px] uppercase'>
													<span>{eventDate.day}</span>
													<span className='text-primary'>{eventDate.month}</span>
													<span className='text-primary text-xl md:text-[27px]'>{eventDate.date}</span>
												</div>
												<div className='w-[1px] bg-[#424242] h-16 mr-2 md:mr-4'></div>
												<div className='flex flex-col uppercase font-semibold justify-center'>
													<span className='text-[11px] mb-1 first-letter:tracking-[0.55px] text-gray-400 font-normal'>
														{truncateText(venue, 30)}
													</span>
													<span className='text-xs md:text-base !leading-4'>{truncateText(title, 25)}</span>
												</div>
											</div>
										</a>
									);
								})
							) : (
								<div className='col-span-2 text-center py-8'>No events selected</div>
							)}
						</div>
					</div>
					<button
						aria-label='slide forward'
						className='hidden md:inline-block rounded-full right-0 text-center absolute z-30 mr-5 2xl:-mr-5 w-10 h-10 bg-primary cursor-pointer'
						style={{ top: '40%', transform: 'translateY(-50%)' }}
						id='next'
					>
						<svg className='text-black inline' width='8' height='14' viewBox='0 0 8 14' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M1 1L7 7L1 13' stroke='currentColor' strokeWidth='2' strokeLinecap='round' strokeLinejoin='round' />
						</svg>
					</button>
					<div className='text-center mt-16'>
						<a href={viewAllUrl} className='primary-btn'>
							{__('View all events', 'wpgens-blocks')}
						</a>
					</div>
				</section>
			</div>
		</>
	);
}
