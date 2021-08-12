<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
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
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}

$pagination = get_option('_sr_shopgridpagination');
if (!$pagination) { $pagination = 'pagination'; }
?>

<?php if ($pagination == 'pagination') { ?>
<div id="page-pagination">
<?php echo dani_pagination('shop',esc_html__( 'Previous Page', 'dani' ), esc_html__( 'Next Page', 'dani' ),$wp_query); ?>
</div>
<?php } else if ($pagination == 'loadonclick' || $pagination == 'infiniteload') { ?>
<div class="load-isotope align-center">
    <a 	href="<?php echo esc_url(next_posts( 0, false )); ?>" class="sr-button" 
    	data-method="<?php echo esc_attr($pagination); ?>"
        data-related-grid="main-shop-grid" 
        ><?php echo esc_html__( 'Load More', 'dani' ); ?></a>
    <span class="load-message"><?php echo esc_html__( 'No more items to show', 'dani' ); ?></span>
</div>
<?php } ?>
