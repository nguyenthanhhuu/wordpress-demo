<?php
/**
 * My Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Addresses', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => __( 'Billing Address', 'woocommerce' ),
		'shipping' => __( 'Shipping Address', 'woocommerce' )
	), $customer_id );
} else {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Address', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  __( 'Billing Address', 'woocommerce' )
	), $customer_id );
}

$col = 1;
?>

<h3><?php echo $page_title; ?></h3>
<div class="stm_colored_separator">
	<div class="triangled_colored_separator left">
		<div class="triangle"></div>
	</div>
</div>

<p class="myaccount_address">
	<?php echo apply_filters( 'woocommerce_my_account_my_address_description', __( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); ?>
</p>

<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '<div class="row addresses">'; ?>

<div class="row">
<?php foreach ( $get_addresses as $name => $title ) : ?>

	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 address">
		<header class="title">
			<h3><?php echo $title; ?></h3>
		</header>
		<address>
			<?php
				$address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
					'first_name'     => array(
						'title' => 'Fist Name',
						'value' => get_user_meta( $customer_id, $name . '_first_name', true )
					),
					'last_name'     => array(
						'title' => 'Last Name',
						'value' => get_user_meta( $customer_id, $name . '_last_name', true )
					),

				), $customer_id, $name );


				if ( ! $address )
					_e( 'You have not set up this type of address yet.', 'woocommerce' );
				else

					$output = '';
					$output .= '<div class="table-responsive">';
					$output .= '<table class="table table-stripped address-table">';
					$output .= '<tbody>';
					foreach($address as $value ) {
						$output .= '<tr><th>'. esc_html( $value['title'] ).'</th><td>'. esc_html( $value['value'] ).'</td></tr>';
					}
					$output .= '</tbody>';
					$output .= '</table>';
					$output .= '</div>';
					echo balanceTags( $output, true );
			?>
		</address>
		<footer>
			<a href="<?php echo wc_get_endpoint_url( 'edit-address', $name ); ?>" class="button edit edit-billing-address"><?php _e( 'Edit', 'woocommerce' ); ?></a>
		</footer>
	</div>

<?php endforeach; ?>
</div> <!-- row -->
<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '</div>'; ?>
