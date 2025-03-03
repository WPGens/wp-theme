<?php
if (get_current_blog_id() == 2) {
	$privacy_page_id = get_page_by_path('zastita-osobnih-podataka')->ID;
	$privacy_url = get_permalink($privacy_page_id);
	$privacy_title = get_the_title($privacy_page_id);
} else {
	$privacy_page_id = get_page_by_path('privacy-policy')->ID;
	$privacy_url = get_permalink($privacy_page_id);
	$privacy_title = get_the_title($privacy_page_id);
}
?>

<footer class="footer">
	<div id="js-accordion" class="footer-menu__container">
		<div class="footer-menu">
			<?php
			$blog_menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-blog-menu']);
			$blog_title = $blog_menu ? $blog_menu->name : __('Blog categories', 'wpgens');
			?>
			<div class="footer-menu__title js-accordion-toggle"><?php echo esc_html($blog_title); ?></div>
			<?php wp_nav_menu(array('theme_location' => 'footer-blog-menu', 'container' => false, 'menu_class' => 'footer-menu__list js-accordion-content')); ?>
		</div>

		<div class="footer-menu">
			<?php
			$magento_menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-magento-menu']);
			$magento_title = $magento_menu ? $magento_menu->name : __('Magento Development', 'wpgens');
			?>
			<div class="footer-menu__title js-accordion-toggle"><?php echo esc_html($magento_title); ?></div>
			<?php wp_nav_menu(array('theme_location' => 'footer-magento-menu', 'container' => false, 'menu_class' => 'footer-menu__list js-accordion-content')); ?>

			<?php
			$audits_menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-audits-menu']);
			$audits_title = $audits_menu ? $audits_menu->name : __('Magento UX/UI Design', 'wpgens');
			?>
			<div class="footer-menu__title js-accordion-toggle"><?php echo esc_html($audits_title); ?></div>
			<?php wp_nav_menu(array('theme_location' => 'footer-audits-menu', 'container' => false, 'menu_class' => 'footer-menu__list js-accordion-content')); ?>

		</div>

		<div class="footer-menu">
			<?php
			$marketing_menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-marketing-menu']);
			$marketing_title = $marketing_menu ? $marketing_menu->name : __('Magento Digital Marketing', 'wpgens');
			?>
			<div class="footer-menu__title js-accordion-toggle"><?php echo esc_html($marketing_title); ?></div>
			<?php wp_nav_menu(array('theme_location' => 'footer-marketing-menu', 'container' => false, 'menu_class' => 'footer-menu__list js-accordion-content')); ?>

			<?php
			$analytics_menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-analytics-menu']);
			$analytics_title = $analytics_menu ? $analytics_menu->name : __('Magento Data Analytics', 'wpgens');
			?>
			<div class="footer-menu__title js-accordion-toggle"><?php echo esc_html($analytics_title); ?></div>
			<?php wp_nav_menu(array('theme_location' => 'footer-analytics-menu', 'container' => false, 'menu_class' => 'footer-menu__list js-accordion-content')); ?>
		</div>

		<div class="footer-menu">
			<?php
			$company_menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-featured-services-menu']);
			$company_title = $company_menu ? $company_menu->name : __('Company', 'wpgens');
			?>
			<div class="footer-menu__title js-accordion-toggle"><?php echo esc_html($company_title); ?></div>
			<?php wp_nav_menu(array('theme_location' => 'footer-featured-services-menu', 'container' => false, 'menu_class' => 'footer-menu__list js-accordion-content')); ?>
		</div>

	</div>
	<div class="footer-hr__container">
		<hr>
	</div>

	<div class="footer-menu__container footer-menu__container--half">
		<div class="footer-menu">
			<div class="footer--certs">
				<picture style="margin-right: 5px;">
					<source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/hyva-tech-partner.svg">
					<source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/hyva-tech-partner.svg">
					<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/hyva-tech-partner.svg" alt="Hyva Tech Partner" width="145" height="44" />
				</picture>
				<picture>
					<source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/mage-os-professional-member-2.svg">
					<source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/mage-os-professional-member-2.svg">
					<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/mage-os-professional-member-2.svg" alt="Mage-OS Silver Partner" width="120" height="44" />
				</picture>
				<picture>
					<source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-profesionaldev.svg">
					<source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-profesionaldev.svg">
					<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-profesionaldev.svg" alt="Magento 2 Certificated" width="56" height="100" />
				</picture>
				<picture>
					<source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-profesionallfrontend.svg">
					<source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-profesionallfrontend.svg">
					<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-profesionallfrontend.svg" alt="Magento 2 Certificated" width="56" height="100" />
				</picture>
				<picture>
					<source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-solutionspecialist.svg">
					<source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-solutionspecialist.svg">
					<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-magento-solutionspecialist.svg" alt="Magento 2 Certificated" width="56" height="100" />
				</picture>
				<picture>
					<source type="image/webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-nng.svg">
					<source type="image/png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-nng.svg">
					<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges/badge-nng.svg" alt="NNG" width="126" height="43" />
				</picture>
			</div>
		</div>
		<div class="footer-menu">
			<?php
			get_template_part('template-parts/footer-newsletter', null, array(
				'privacy_url' => $privacy_url,
				'privacy_title' => $privacy_title
			));
			?>
		</div>
	</div>

	<div class="footer-hr__container">
		<hr>
	</div>
	<ul class="footer-social-list">
		<li>
			<a href="https://twitter.com/wpgens" title="Follow us on Twitter" target="_blank" rel="noopener">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tw.svg" />
			</a>
		</li>
		<li>
			<a href="https://www.linkedin.com/company/638004" title="Find us on LinkedIn" target="_blank" rel="noopener">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lin.svg" />
			</a>
		</li>
		<li>
			<a href="https://www.instagram.com/wpgensnet/" title="Find us on Instagram" target="_blank" rel="noopener">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ig.svg" />
			</a>
		</li>
		<li>
			<a href="https://www.facebook.com/wpgens" title="Find us on Facebook" target="_blank" rel="noopener">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fb.svg" />
			</a>
		</li>
	</ul>
	<div class="footer-contact">
		<a href="mailto:web@wpgens.net" title="web@wpgens.net">
			<i class="icon-mail"></i> web@wpgens.net </a>
		<a href="tel:+38531200729" title="+385 31 200 729">
			<i class="icon-phone"></i> +385 31 200 729 </a>
	</div>
	<a class="footer-back-to-top" href="#header" title="Back to top">
		<i class="icon-chevron-up"></i>
	</a>
	<div class="footer-copyright">
		<?php if (get_current_blog_id() == 2): ?>
			<?php echo date('Y'); ?> &copy; wpgens. Sva prava pridržana.
			<a href="<?php echo esc_url($privacy_url); ?>" title="<?php echo esc_attr($privacy_title); ?>"><?php echo esc_html($privacy_title); ?></a>
		<?php else: ?>
			<?php echo date('Y'); ?> &copy; wpgens. All rights reserved.
			<a href="<?php echo esc_url($privacy_url); ?>" title="<?php echo esc_attr($privacy_title); ?>"><?php echo esc_html($privacy_title); ?></a>
		<?php endif; ?>
	</div>

</footer>

<div id="js-page-overlay" class="page-overlay"></div>

<?php wp_footer(); ?>

</body>

</html>