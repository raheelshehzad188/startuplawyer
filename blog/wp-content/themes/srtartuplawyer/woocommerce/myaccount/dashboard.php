<?php
function get_customer_total_order() {
    $customer_orders = get_posts( array(
        'numberposts' => - 1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-completed' )
    ) );

    $total = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $total += $order->get_total();
    }

    return $total;
}
function get_order_by_status($status) {
    $customer_orders = get_posts( array(
        'numberposts' => - 1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( $status )
    ) );
    return $customer_orders;

    $total = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $total += $order->get_total();
    }

    return $total;
}
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<style>

.icon_dash {
    float: left;
    margin: 11px;
    font-size: 24px;
    color: #695e5e;
}
.dash_price p:nth-child(1) {
    color: #99cdd6 !important;
    margin: -5px;
}
.dash_price p:nth-child(2) {
    font-size: 17px;
}
.dash_left_li {
    float: left;
    width: 50%;
    border-right: 1px solid #e5e5e5;
}
</style>

<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>

<p>
	<?php
	if(isset($_REQUEST['rate']))
	{
		ob_start();
include "rate.php";
$output = ob_get_contents();
ob_end_clean();
echo $output;

	}
	else if(isset($_REQUEST['bill']))
	{
		ob_start();
include "bill.php";
$output = ob_get_contents();
ob_end_clean();
echo $output;
	}
	else
	{
		printf(
		__( /*'From your account dashboard you can view your <a href="%1$s ">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.',*/ '' ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
	}
	if(!$_GET)
	{
	?>
</p>
<hr>
<div class="dash_li">
    <div class="icon_dash"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
    <div class="dash_price">
        <p>LKR<?= get_customer_total_order(); ?></p>
        <p>Net purchases </p>
    </div>
</div>
<hr>

<hr>
<div class="dash_li">
    <div class="dash_left_li">
        <div class="icon_dash"><i class="fa fa-th-list" style="color:#7dcc38;" aria-hidden="true"></i></div>
        <div class="dash_price">
            <p><?= count(get_order_by_status('wc-completed')) ?> Orders </p>
            <p>Completed</p>
        </div>
    </div>
    <div class="dash_right_li">
        <div class="icon_dash"><i class="fa fa-minus-circle" style="color:#969895;" aria-hidden="true"></i></div>
        <div class="dash_price">
            <p>0 Orders </p>
            <p>Advance Payment Requested</p>
        </div>
    </div>
</div>

<hr>
<div class="dash_li">
    <div class="dash_left_li">
        <div class="icon_dash"><i class="fa fa-exclamation-circle" style="color:#fdb103;" aria-hidden="true"></i></div>
        <div class="dash_price">
            <p><?= count(get_order_by_status('wc-extension-reques')) ?> Prooducts </p>
            <p>Deadline extension Requested </p>
        </div>
    </div>
    <div class="dash_right_li">
        <div class="icon_dash"><i class="fa fa-times-circle" style="color:#aa0304;" aria-hidden="true"></i></div>
        <div class="dash_price">
            <p><?= count(get_order_by_status('wc-refund-paid')) ?> Products </p>
            <p>Refunds</p>
        </div>
    </div>
</div>

<?php
}
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );
// 	echo "come here";

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
