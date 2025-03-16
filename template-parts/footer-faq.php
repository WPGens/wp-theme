<?php

/**
 * Displays footer site info
 *
 */

?>

<section class="md:bg-[#0C1015] md:py-32 px-9 relative overflow-hidden">
	<div class="hidden md:block bg-gradient"></div>
	<div class="max-w-screen-xl mx-auto flex flex-col md:flex-row">
		<div class="text-white max-w-md md:mr-32">
			<h2 class="text-[32px] uppercase font-light mb-3">Frequently <br />Asked Questions</h2>
			<p class="mb-9 leading-7 font-light">
				<?php the_field('faq_subtitle', 'option'); ?>
			</p>
			<div>
				<a class="btn mr-5" href="<?php echo get_page_link(2312); ?>">View FAQS</a>
				<a class="text-primary uppercase text-sm hover:underline" href="<?php echo get_page_link(1281); ?>">Contact</a>
			</div>
		</div>
		<div class="pt-12 md:pt-0">
			<?php
			$rows = get_field('faq_item', 'option');
			foreach ($rows as $row) { ?>
				<div class="border-b text-white border-[#5E5E5E] pb-5 md:pb-10 pt-5 md:pt-10">
					<div class="accordion flex cursor-pointer justify-between">
						<div class="flex">
							<span class="hidden md:inline-block text-secondary">01/</span>
							<div class="max-w-lg">
								<p class="md:text-[17px] md:uppercase tracking-[0.85px] md:leading-6 mr-6 md:mx-6">
									<?php echo $row['question']; ?>
								</p>
							</div>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
							<g clip-path="url(#clip0_838_4210)">
								<path d="M12.1448 -1.99585L12.1469 9.85026L23.9923 9.85165L23.9909 12.1484L12.1469 12.1442L12.1503 23.9889L9.85359 23.9903L9.85221 12.1449L-1.9939 12.1428L-1.99183 9.84681L9.85083 9.84819L9.84875 -1.99377L12.1448 -1.99585Z" fill="#CFA568" />
							</g>
							<defs>
								<clipPath id="clip0_838_4210">
									<rect width="22" height="22" fill="white" />
								</clipPath>
							</defs>
						</svg>
					</div>
					<div class="panel h-0 overflow-hidden transition-all duration-300 ease-in-out">
						<div class="py-6 leading-7 font-light">
							<?php echo $row['answer']; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>