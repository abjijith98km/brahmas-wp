<?php
/* Template Name: My account page */
/* Template Post Type: page */

/**
 * My Account page
 */

defined('ABSPATH') || exit;
?>

<section class="my_account_page_banner">
	<div class="container">
		<div class="banner_content">
			<div class="woocommerce-MyAccount-content">
				<?php
				do_action('woocommerce_account_content');
				?>
			</div>
		</div>
	</div>
</section>