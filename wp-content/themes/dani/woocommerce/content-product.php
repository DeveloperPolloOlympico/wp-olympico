<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


// remove default link open
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
// remove default product thumb
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
// remove rating stars
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// remove default link close
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// GET options when not comming from pagebuilder
if (!isset($layoutcustom) || $layoutcustom == 'inherit') {
$itemlayout = get_option('_sr_shopitemlayout');
$showinfos = get_option('_sr_shopitemshowinfos');
$itemhover = get_option('_sr_shopitemhover');
$itemhovercustom = get_option('_sr_shopitemhovercustom');
$hover = get_option('_sr_shopitemhover');
$titlesize = get_option('_sr_shopitemtitlesize');
$showprice = get_option('_sr_shopgridshowprice');
$showaddtocart = get_option('_sr_shopgridshowaddtocart');
$showsale = get_option('_sr_shopgridshowsale');	
}
if (!isset($gridtype)) { $gridtype = 'isotope'; }
if (!isset($titlesize)) { $titlesize = 'h5'; }

if (!$showprice) { remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); }
if (!$showaddtocart) { remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); }
if (!$showsale) { remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); }

?>
<div <?php post_class($gridtype.'-item shop-item'); ?>>
	
	<?php
	
	/**
	 * woocommerce_before_shop_loop_item hook.
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
    
    <div class="image-block">
    
    	<?php 
		$anchorClass = '';
		$captionClass = '';
		if ($itemhover) { if ($itemhover == 'custom') { $itemhover = 'text-light custom'; } $anchorClass .= ' overlay-effect '.$itemhover; }
		if ($itemlayout == 'across-bottom') { $anchorClass .= ' caption-bottom'; $captionClass .= ' align-left bottom'; }
		else if ($itemlayout == 'across-top') { $anchorClass .= ' caption-top'; $captionClass .= ' align-left top'; }
		else if ($itemlayout == 'across-center') { $anchorClass .= ' caption-center'; $captionClass .= ' align-center center';  }
		if ($showinfos == 'onhover') { $captionClass .= ' hidden'; } 
		?>
    
        <a href="<?php echo esc_url(get_permalink()); ?>" class="imagelink thumb-hover <?php echo esc_attr($anchorClass); ?>">
            <?php echo  woocommerce_get_product_thumbnail(); ?>
            
            <?php if ($itemlayout !== 'below') { ?>
            <div class="overlay-caption caption-dark <?php echo esc_attr($captionClass); ?>">
                <?php echo '<'.$titlesize.' class="caption-name product-name">'.get_the_title().'</'.$titlesize.'>'; ?>
                <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
            </div>
            <?php } ?> 
            
        </a>
        
		<?php
        /**
         * woocommerce_after_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action( 'woocommerce_after_shop_loop_item' );
        ?>
    </div>
    
	<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	?>
    
    <?php if ($itemlayout == 'below') { ?>
    <div class="item-infos">	
    <?php echo '<'.$titlesize.' class="product-name"><a href="'.get_the_permalink().'">'.get_the_title().'</a></'.$titlesize.'>'; ?>
    <?php
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	?>
    </div>
    <?php } // END if itemlayout not across ?>
    
</div> <!-- END .shop-item -->
