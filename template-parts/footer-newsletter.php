<?php
$privacy_url = isset($args['privacy_url']) ? $args['privacy_url'] : null;
$privacy_title = isset($args['privacy_title']) ? $args['privacy_title'] : null;
?>

<div class="footer-newsletter">
	<div class="footer-newsletter__title">Newsletter</div>
	<?php if (get_current_blog_id() == 2): ?>
		<p class="footer-newsletter__subtitle">Pretplatite se na naš newsletter i budite u toku s najnovijim vijestima iz svijeta online trgovina i wpgensa.</p>
		<form action="https://wpgens.us1.list-manage.com/subscribe/post?u=3c0b1b4a2f5d229e8799c3adf&amp;id=b353f0249a&amp;f_id=0030c8e4f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
			<div class="form-container">
				<input type="email" placeholder="Vaša email adresa" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="">
				<button type="submit" id="mc-embedded-subscribe" class="wpcf7-submit"><i class="icon-mail"></i> Preplatite se</button>
			</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display: none;"></div>
				<div class="response" id="mce-success-response" style="display: none;"></div>
			</div>
			<p class="privacy-text">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_1815_1335)">
						<path d="M5.99976 10.9999C8.76118 10.9999 10.9998 8.7613 10.9998 5.99988C10.9998 3.23845 8.76118 0.999878 5.99976 0.999878C3.23833 0.999878 0.999756 3.23845 0.999756 5.99988C0.999756 8.7613 3.23833 10.9999 5.99976 10.9999Z" stroke="#8C8C8E" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M5.99976 7.99988V5.99988" stroke="#8C8C8E" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M5.99976 3.99988H6.00476" stroke="#8C8C8E" stroke-linecap="round" stroke-linejoin="round" />
					</g>
					<defs>
						<clipPath id="clip0_1815_1335">
							<rect width="12" height="12" fill="white" transform="translate(-0.000244141)" />
						</clipPath>
					</defs>
				</svg>
				<span>Prijavom prihvaćate našu politiku <a href="<?php echo esc_url($privacy_url); ?>" title="<?php echo esc_attr($privacy_title); ?>">zaštite osobnih podataka.</a></span>
			</p>
			<div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_3c0b1b4a2f5d229e8799c3adf_b353f0249a" tabindex="-1" value=""></div>
		</form>
	<?php else: ?>
		<p class="footer-newsletter__subtitle">Sign up for our newsletter to get your dose of useful eCommerce, Magento and wpgens news and events.</p>
		<form action="https://wpgens.us1.list-manage.com/subscribe/post?u=3c0b1b4a2f5d229e8799c3adf&amp;id=737d34b030&amp;f_id=0005c8e4f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
			<div class="form-container">
				<input type="email" placeholder="Your email address" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="">
				<button type="submit" id="mc-embedded-subscribe" class="wpcf7-submit"><i class="icon-mail"></i> Subscribe</button>
			</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display: none;"></div>
				<div class="response" id="mce-success-response" style="display: none;"></div>
			</div>
			<p class="privacy-text">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_1815_1335)">
						<path d="M5.99976 10.9999C8.76118 10.9999 10.9998 8.7613 10.9998 5.99988C10.9998 3.23845 8.76118 0.999878 5.99976 0.999878C3.23833 0.999878 0.999756 3.23845 0.999756 5.99988C0.999756 8.7613 3.23833 10.9999 5.99976 10.9999Z" stroke="#8C8C8E" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M5.99976 7.99988V5.99988" stroke="#8C8C8E" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M5.99976 3.99988H6.00476" stroke="#8C8C8E" stroke-linecap="round" stroke-linejoin="round" />
					</g>
					<defs>
						<clipPath id="clip0_1815_1335">
							<rect width="12" height="12" fill="white" transform="translate(-0.000244141)" />
						</clipPath>
					</defs>
				</svg>
				<span>By signing up, you agree to our <a href="<?php echo esc_url($privacy_url); ?>" title="<?php echo esc_attr($privacy_title); ?>">Privacy Policy.</a></span>
			</p>
			<div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_3c0b1b4a2f5d229e8799c3adf_737d34b030" tabindex="-1" value=""></div>
		</form>
	<?php endif; ?>
</div>