<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form role="search" method="get" class="woocommerce-product-search searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
    <label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'dani' ); ?></label>
    <input type="text" value="" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" />
    <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" />
</form>
