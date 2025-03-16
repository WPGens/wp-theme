/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, FormTokenField, Spinner } from '@wordpress/components';
import { useEffect, useState } from '@wordpress/element';
import { useSelect } from '@wordpress/data';
import { store as coreStore } from '@wordpress/core-data';
import { decodeEntities } from '@wordpress/html-entities';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();

	// Initialize selectedVenues as empty array if undefined
	const { selectedVenues = [], title = 'Popular Venues', subtitle = '' } = attributes;
	const [isLoading, setIsLoading] = useState(true);
	const [searchTerm, setSearchTerm] = useState('');
	const [suggestions, setSuggestions] = useState([]);
	const [selectedTokens, setSelectedTokens] = useState([]);

	// Get selected venues data and search suggestions
	const { venues, allVenues } = useSelect(
		(select) => {
			// Get selected venues
			let selectedVenuesData = [];
			if (selectedVenues.length > 0) {
				const selectedRecords = select(coreStore).getEntityRecords('postType', 'places', {
					include: selectedVenues,
					per_page: selectedVenues.length,
					_embed: true,
				});

				if (selectedRecords) {
					selectedVenuesData = selectedRecords;
				}
			}

			// Get venues for search
			const query = {
				per_page: 100,
				status: 'publish',
				orderby: 'title',
				order: 'asc',
			};

			if (searchTerm) {
				query.search = searchTerm;
			}

			const records = select(coreStore).getEntityRecords('postType', 'places', query);

			return {
				venues: selectedVenuesData,
				allVenues: records || [],
			};
		},
		[selectedVenues, searchTerm],
	);

	// Update suggestions when search term or all venues change
	useEffect(() => {
		if (allVenues && allVenues.length > 0) {
			const venueSuggestions = allVenues
				.filter((venue) => !selectedVenues.includes(venue.id.toString()))
				.map((venue) => ({
					id: venue.id.toString(),
					name: decodeEntities(venue.title.rendered),
				}));
			setSuggestions(venueSuggestions);
			setIsLoading(false);
		} else if (allVenues) {
			setSuggestions([]);
			setIsLoading(false);
		}
	}, [allVenues, selectedVenues]);

	// Update selected tokens when venues change
	useEffect(() => {
		if (venues) {
			const tokens = venues.map((venue) => decodeEntities(venue.title.rendered));
			setSelectedTokens(tokens);
		}
	}, [venues]);

	// Get featured image URL from embedded media
	const getFeaturedImageUrl = (venue) => {
		if (
			venue._embedded &&
			venue._embedded['wp:featuredmedia'] &&
			venue._embedded['wp:featuredmedia'][0] &&
			venue._embedded['wp:featuredmedia'][0].source_url
		) {
			return venue._embedded['wp:featuredmedia'][0].source_url;
		}
		return '';
	};

	// Handle token selection
	const handleTokenChange = (tokens) => {
		// Find removed tokens
		const removedTokens = selectedTokens.filter((token) => !tokens.includes(token));

		if (removedTokens.length > 0) {
			// Find the venue ID for the removed token
			const removedToken = removedTokens[0];
			const venueToRemove = venues.find((venue) => decodeEntities(venue.title.rendered) === removedToken);

			if (venueToRemove) {
				// Remove the venue ID from selectedVenues
				const newSelectedVenues = selectedVenues.filter((id) => id !== venueToRemove.id.toString());
				setAttributes({ selectedVenues: newSelectedVenues });
			}
		} else if (tokens.length > selectedTokens.length) {
			// A new token was added
			const newToken = tokens.find((token) => !selectedTokens.includes(token));
			const matchingVenue = suggestions.find((venue) => venue.name === newToken);

			if (matchingVenue) {
				// Add the venue ID to selectedVenues
				setAttributes({
					selectedVenues: [...selectedVenues, matchingVenue.id],
				});
			}
		}
	};

	// Handle search input change
	const handleSearchChange = (value) => {
		setSearchTerm(value);
		setIsLoading(true);
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Venues Settings', 'wpgens-blocks')}>
					<TextControl label={__('Section Title', 'wpgens-blocks')} value={title} onChange={(value) => setAttributes({ title: value })} />
					<TextControl label={__('Section Subtitle', 'wpgens-blocks')} value={subtitle} onChange={(value) => setAttributes({ subtitle: value })} />
					<FormTokenField
						label={__('Search and Select Venues', 'wpgens-blocks')}
						value={selectedTokens}
						suggestions={suggestions.map((venue) => venue.name)}
						onChange={handleTokenChange}
						onInputChange={handleSearchChange}
						maxSuggestions={10}
						placeholder={__('Type to search venues...', 'wpgens-blocks')}
					/>
					{isLoading && (
						<div style={{ textAlign: 'center', padding: '10px' }}>
							<Spinner />
						</div>
					)}
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<section className='max-w-screen-2xl px-4 md:px-8 2xl:px-0 my-16 md:my-32 mx-auto relative'>
					<div className='text-center mb-6 md:mb-12'>
						<h2 className='text-3xl md:text-4xl lg:text-5xl text-white uppercase font-light mb-2 leading-none'>{title}</h2>
						{subtitle && <p className='uppercase md:tracking-[3px] text-primary-dark'>{subtitle}</p>}
					</div>

					<div className='grid grid-cols-2 md:grid-cols-5 gap-x-4 md:gap-x-6 gap-y-6 md:gap-y-12'>
						{isLoading && !venues?.length ? (
							<div className='col-span-2 md:col-span-5 text-center py-8'>
								<Spinner />
								{__('Loading venues...', 'wpgens-blocks')}
							</div>
						) : venues && venues.length > 0 ? (
							venues.map((venue) => {
								const title = decodeEntities(venue.title.rendered);
								const image = getFeaturedImageUrl(venue);
								const city = venue.meta?.city || '';
								const state = venue.meta?.state || '';

								return (
									<a key={venue.id} href='#' className='relative group flex flex-col w-full uppercase overflow-hidden'>
										<div className='h-48 overflow-hidden'>
											<img
												src={image || '/wp-content/themes/bottleservices/assets/images/artist-placeholder.jpeg'}
												className='h-48 object-cover w-full group-hover:scale-110 transition-all'
												alt={title}
											/>
										</div>
										<span className='text-secondary tracking-[1px] text-xs leading-none py-3'>
											{city && state ? `${city}, ${state}` : ''}
										</span>
										<h2 className='text-white text-sm md:text-lg font-medium tracking-[1.5px] leading-none group-hover:text-primary'>
											{title}
										</h2>
									</a>
								);
							})
						) : (
							<div className='col-span-2 md:col-span-5 text-center py-8 text-white'>
								{__('Add venues using the sidebar controls', 'wpgens-blocks')}
							</div>
						)}
					</div>
				</section>
			</div>
		</>
	);
}
