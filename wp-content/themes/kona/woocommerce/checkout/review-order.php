<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
 * @version     3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name"><?php _e( 'Product', 'kona' ); ?></th>
			<th class="product-total"><?php _e( 'Total', 'kona' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product  	= apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<td class="product-name">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('kona-thumb-mini'), $cart_item, $cart_item_key );
						echo '<span class="product-image">'.$thumbnail.'</span>';
						?>
						<div class="product-info">
							<?php
							$titlesize = get_option('_sr_shopitemtitlesize');
							echo '<h6 class="product-title '.esc_attr($titlesize).'">'.apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
							echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <span class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key );
							echo '</h6>';

								// Meta data
							echo wc_get_formatted_cart_item_data( $cart_item );

								// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'kona' ) . '</p>';
							}
							?>
						</div>

					</td>
					<td class="product-total">
						<?php 
						if (qtranxf_getLanguage() == 'en') { ?>
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						<?php } elseif (qtranxf_getLanguage() == 'jp') { ?>
							<?php 
							$subs = $cart_item['data']->price * $cart_item['quantity'];
							$convt = convert_to_jpy($subs);
							echo '<b>'.apply_filters('woocommerce_cart_item_subtotal', $convt, $cart_item, $cart_item_key).'</b>';
							?>
						<?php } ?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th><?php _e( '[:jp]小計[:en]Subtotal', 'kona' ); ?></th>
			<?php 
			if (qtranxf_getLanguage() == 'en') { ?>
				<td><?php wc_cart_totals_subtotal_html(); ?></td>
			<?php } elseif (qtranxf_getLanguage() == 'jp') { ?>
				<td><?php echo convert_to_jpy(WC()->cart->subtotal);?></td>
			<?php } ?>	
		</tr>

		<?php
		$discount_excl_tax_total = WC()->cart->get_cart_discount_total();
		$discount_tax_total = WC()->cart->get_cart_discount_tax_total();
		$discount_total = $discount_excl_tax_total + $discount_tax_total;
		if( ! empty($discount_total) ): ?>
			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php _e('[:jp]クーポン：[:en]Coupon :','woocommerce'); ?> <?= $code ;?></th>
				<?php 
				if (qtranxf_getLanguage() == 'en') { ?>
					<td><?php echo wc_price(-$discount_total) ?> <a href="<?= site_url();?>/checkout/?remove_coupon=<?= $code;?>" class="woocommerce-remove-coupon" data-coupon="alldebora">[Remove]</a></td>
				<?php } elseif (qtranxf_getLanguage() == 'jp') { ?>
					<td><?php echo '-'.convert_to_jpy($discount_total); ?> <a href="<?= site_url();?>/checkout/?remove_coupon=<?= $code;?>" class="woocommerce-remove-coupon" data-coupon="alldebora">[削除する]</a></td>
				<?php } ?>	
				
			</tr>
		<?php endforeach;?>
	<?php endif; ?>


	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

	<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
	<?php 
	if (WC()->customer->get_shipping_country() === 'SG') {
		wc_cart_totals_shipping_html();
	} else if (WC()->customer->get_shipping_country() === 'JP') {
		foreach (WC()->session->get('shipping_for_package_0')['rates'] as $key => $value) {
			if (WC()->session->get('chosen_shipping_methods')[0] == $key) {
				$label = $value->label;
				$cost = $value->cost;
				$tax = 0;
				foreach ($value->taxes as $taxes) {
					$tax += floatval($taxes);
				}
				$rate_cost_tax = $cost + $tax;
				echo '<tr class="shipping">';
				_e('<th>[:jp]配送[:en]Shipping</th>');
				echo '<td data-title="Shipping">';
				echo $label.' - ';
				if (qtranxf_getLanguage() == 'en') {
					echo '<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>'.$rate_cost_tax.'</span> <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="'.$key.'" class="shipping_method"></td></tr>';
				} else {
					echo '<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>'.convert_to_jpy($rate_cost_tax).'</span> <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="'.$key.'" class="shipping_method"></td></tr>';
				}
				break;
			}
		}
	}

	?>
	<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

<?php endif; ?>

<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
<tr class="fee">
	<th><?php echo esc_html( $fee->name ); ?></th>
	<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
</tr>
<?php endforeach; ?>

<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
	<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
	<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
		<th><?php echo esc_html( $tax->label ); ?></th>
		<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr class="tax-total">
		<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
		<td><?php wc_cart_totals_taxes_total_html(); ?></td>
	</tr>
<?php endif; ?>
<?php endif; ?>

<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

<tr class="order-total">
	<th><?php _e( '[:jp]合計[:en]Total', 'kona' ); ?></th>
	<?php 
	if ( ! WC()->cart->prices_include_tax ) {
		$amount = WC()->cart->total;
	} else {
		$amount = WC()->cart->total + WC()->cart->tax_total;
	}?>

	<?php 
	if (qtranxf_getLanguage() == 'en') { ?>
		<td><?php echo WC()->cart->get_total(); ;?></td>
	<?php } elseif (qtranxf_getLanguage() == 'jp') { ?>
		<td><div style="font-weight: 300;"><?php echo convert_to_jpy($amount);?> <small style="font-weight: 500;">(<?php wc_cart_totals_order_total_html(); ?>)</small></div><div style="font-size: 12px;" ><i><?php _e('[:jp]支払いはSGDで行われます[:en]Payment will be charged in SGD');?></i></div></td>
	<?php } ?>	
</tr>

<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

</tfoot>
</table>
