<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$dani_shop_share = get_option('_sr_shopsingleshare');
?>

<?php if ($dani_shop_share) { ?>
<div class="spacer-medium"></div>
<div id="share" class="shop-share">
    <?php echo dani_Share(get_post_type(),'<strong>'.esc_html__( 'Share', 'dani' ).'</strong>','left'); ?>
</div>
<?php } ?>