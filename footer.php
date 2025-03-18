<footer class="tw-bg-black tw-text-white tw-py-12">
	<div class="tw-container tw-mx-auto tw-px-4">
		<div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-4 tw-gap-8">
			<!-- Company Info -->
			<div class="tw-space-y-4">
				<?php if (has_custom_logo()): ?>
				<div class="tw-footer-logo">
					<?php the_custom_logo(); ?>
				</div>
				<?php else: ?>
				<h3 class="tw-text-2xl tw-font-bold"><?php bloginfo('name'); ?></h3>
				<?php endif; ?>
				<p class="tw-text-gray-400">
					<?php echo get_theme_mod('footer_company_info', 'Your company description goes here. Add your company information and contact details.'); ?>
				</p>
			</div>

			<!-- Footer Menu 1 -->
			<div>
				<h4 class="tw-text-lg tw-font-semibold tw-mb-4">
					<?php echo get_theme_mod('footer_menu_1_title', 'Quick Links'); ?></h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-1',
					'container' => false,
					'menu_class' => 'tw-space-y-2',
					'fallback_cb' => false,
				));
				?>
			</div>

			<!-- Footer Menu 2 -->
			<div>
				<h4 class="tw-text-lg tw-font-semibold tw-mb-4">
					<?php echo get_theme_mod('footer_menu_2_title', 'Services'); ?></h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-2',
					'container' => false,
					'menu_class' => 'tw-space-y-2',
					'fallback_cb' => false,
				));
				?>
			</div>

			<!-- Footer Menu 3 -->
			<div>
				<h4 class="tw-text-lg tw-font-semibold tw-mb-4">
					<?php echo get_theme_mod('footer_menu_3_title', 'Support'); ?></h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-3',
					'container' => false,
					'menu_class' => 'tw-space-y-2',
					'fallback_cb' => false,
				));
				?>
			</div>
		</div>

		<!-- Copyright -->
		<div class="tw-border-t tw-border-gray-800 tw-mt-8 tw-pt-8 tw-text-center tw-text-gray-400">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
		</div>
	</div>
</footer>

<div id="js-page-overlay" class="tw-page-overlay"></div>

<?php wp_footer(); ?>

</body>

</html>