<?php
function base_url($str = ''){
 return 'https://startuplawyer.lk/main/'.$str;   
}
if(isset($_REQUEST['home_api']))
{
    $ret = array();
    $vid = array();
    $args = array(
    'post_type'=> 'video',
    'posts_per_page'    => '-1'
);              
$the_query = new WP_Query( $args );
foreach($the_query->posts as $k=> $v)
{
    $pid = $v;
    if(get_post_meta($v->ID,'is_feature',true))
    {
    $youtubeURL = get_post_meta($v->ID,'youtube_video_url',true);
$obj = get_youtube($youtubeURL);
    $vid[] = array(
        'title'=>$obj['title'],
        'html'=>$obj['html'],
        'url'=>$youtubeURL,
        'img'=>$obj['thumbnail_url']
        );
    }
}
$ret['videos']= $vid;
    ob_start();
wp_nav_menu( array(

    'theme_location' => 'main-menu'

) );
$output = ob_get_contents();
ob_end_clean();
$ret['menu'] = $output;
    ob_start();
wp_nav_menu( array(

    'theme_location' => 'foot-menu'

) );
$foutput = ob_get_contents();
ob_end_clean();
$ret['footer_menu'] = $foutput;
echo json_encode($ret);
exit();
}
function load_script_to_remove_arrow(){
    $pid = get_the_ID();
    $ptype = get_post_type($pid);
    if($ptype == 'product')
{
    $wcat = ot_get_option( 'webinaar_cat_id','' );

    $terms = wc_get_product_term_ids( $pid, 'product_cat' );
    if(in_array($wcat,$terms))
    {
?>
<script>
$(document).ready(function() {
    jQuery('input[name="quantity"]').attr('type','number');
});
</script>
<?php
}
else
{
    ?>
<script>
$(document).ready(function() {
    jQuery('input[name="quantity"]').attr('type','hidden');
});
</script>
<?php 
}
}
}
add_action( 'wp_footer', 'load_script_to_remove_arrow' );
add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){

  wp_redirect( home_url() );
  exit();

}
function get_product_img($pid)
{
    $url = '';
    if(get_post_meta($pid,'product_img',true))
    {
       $url = site_url(get_post_meta($pid,'product_img',true)); 
    }
    else
    {
        $url = site_url('/default.jpg');
    }
    return $url;
}
function dashboard_url($uid)
{
    $url = '';
    if($uid)
    {
        $user = get_user_by( 'id', $uid );
    
                if(in_array('service_provider',$user->roles)|| in_array('draft_provider',$user->roles))
                	    {
                	        
                	    $url = panel_url('provider/admin');
                	    
                	    }
                	    elseif(in_array('customer',$user->roles))
                	    {
                	        
                	    $url = site_url('my-account');
                	    
                	    }
                	    else
                	    {
                	    $url = panel_url('admin/admin');
                	    }
    }
    else
    {
        $url = site_url('login');
    }
    return $url;
}
/*function so_27023433_disable_checkout_script(){
    wp_dequeue_script( 'wc-checkout' );
}
add_action( 'wp_enqueue_scripts', 'so_27023433_disable_checkout_script' );*/
if(isset($_REQUEST['wc-ajax']) &&  $_REQUEST['wc-ajax'] == 'checkout')
{
    if(!empty($_REQUEST['billing_email']))
	    {
	        $em = $_REQUEST['billing_email'];
	        $user = get_user_by( 'email', $em );
	        $cuser = get_current_user_id();
	        if($user && !$cuser)
	        {
	            
	           $arr = array(
	               'result' =>'success',
	               "redirect" => site_url('/my-account/').'?checkout_login=1'
	               );
	               echo json_encode($arr);
	            exit();
	        }
	        else
	        {
	            
	        }
	    }
	    else
	    {
	        echo "1";
	    }
}
function payment_statuses()
{
    $pstatuses = array();
                                $pstatuses['client_paid'] = 'Client Paid';
                                $pstatuses['client_failed'] = 'Client Failed';
                                $pstatuses['fully_paid'] = 'Fully Paid';
                                $pstatuses['advance_earn'] = 'Advance Earned';
                                $pstatuses['disbursement_requested'] = 'Disbursement Requested';
                                $pstatuses['disbursement_paid'] = 'Disbursement Paid';
                                $pstatuses['paid'] = 'Paid';
				$pstatuses['refund_approved'] = 'Refund Approved';
				$pstatuses['refunded'] = 'Refunded';
				return $pstatuses;
}
//transection fee
add_action('woocommerce_cart_calculate_fees', function() {
if (is_admin() && !defined('DOING_AJAX')) {
return;
}
WC()->cart->add_fee(__('Transection Fee', 'txtdomain'), 10);
});
include "email_process.php";
if(isset($_REQUEST['ocstomer']))
{
    $uid = order_to_customer($_REQUEST['ocstomer']);
    var_dump($uid);
    die();
}
function order_to_provider($order_id)
{
    global $wpdb;
    $result = $wpdb->get_results ( "
    SELECT * 
    FROM  `wp_woocommerce_order_items` where `order_id`= '$order_id'" );
    foreach ($result as $key => $value) {
		    $value = (array)$value;
			$order_item_id = $value['order_item_id'];
    		$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
    		if($pid)
    		{
    		    return $post_author =  get_post_field ('post_author', $pid);
    		}
    		
		}
		return 0;
}
function order_to_product($order_id)
{
    global $wpdb;
    $result = $wpdb->get_results ( "
    SELECT * 
    FROM  `wp_woocommerce_order_items` where `order_id`= '$order_id'" );
    foreach ($result as $key => $value) {
		    $value = (array)$value;
			$order_item_id = $value['order_item_id'];
    		$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
    		if($pid)
    		{
    		    return $pid;
    		}
    		
		}
		return 0;
}
function order_to_customer($order_id)
{
    if(get_post_meta($order_id,'_customer_user',true))
    {
       return get_post_meta($order_id,'_customer_user',true); 
    }
    else
    {
        $name = get_post_meta($order_id,'_billing_name',true);
        $oemail = get_post_meta($order_id,'_billing_email',true);
        $user = get_user_by( 'email', $oemail );
        if($user)
        {
$userId = $user->ID;
 update_post_meta($order_id,'_customer_user',$userId);
 return $userId;
}
        $password = time();
        $user_data = array(
            'user_login' => strstr($oemail, '@', true),
            'user_email' => $oemail,
            'user_pass' => $password,
        );
        $user_id = wp_insert_user($user_data);
        if ($user_id) {
            if($name)
        	{
        		$ret = update_user_meta($user_id,'first_name',$name);
        	}
        	update_user_meta($user_id,$_REQUEST['user_id_custom'],'cnic_number',get_post_meta($order_id,'nic',true));
    update_user_meta($user_id,'billing_address_1',get_post_meta($order_id,'billing_address',true));
    update_user_meta($user_id,'billing_phone',get_post_meta($order_id,'_billing_phone',true));
        	$email_data = array(
        	    'acc_pass' => $password,
        	    'acc_email' => $oemail,
        	    );
        	    send_email($order_id, '1b',$oemail,'New account email',$email_data);
        	update_post_meta($order_id,'_customer_user',$user_id);
 return $user_id;
        }
    }
}
function wpa_sideload_file( $file, $post_id = 0, $desc = null ) {
	if( empty( $file ) ) {
		return new \WP_Error( 'error', 'File is empty' );
	}

	$file_array = array();

	// Get filename and store it into $file_array
	// Add more file types if necessary
	preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png|pdf)\b/i', $file, $matches );
	$file_array['name'] = basename( $matches[0] );

	// Download file into temp location.
	require_once (ABSPATH.'wp-admin/includes/admin.php');
	$file_array['tmp_name'] = download_url( $file );

	// If error storing temporarily, return the error.
	if ( is_wp_error( $file_array['tmp_name'] ) ) {
		return new \WP_Error( 'error', 'Error while storing file temporarily' );
	}

	// Store and validate
	$id = media_handle_sideload( $file_array, $post_id, $desc );

	// Unlink if couldn't store permanently
	if ( is_wp_error( $id ) ) {
		unlink( $file_array['tmp_name'] );
		return new \WP_Error( 'error', "Couldn't store upload permanently" );
	}

	if ( empty( $id ) ) {
		return new \WP_Error( 'error', "Upload ID is empty" );
	}

	return $id;
}
// add fields
add_action( 'woocommerce_after_checkout_billing_form', 'misha_select_field' );
add_action( 'woocommerce_after_order_notes', 'misha_subscribe_checkbox' );
 
// save fields to order meta
add_action( 'woocommerce_checkout_update_order_meta', 'misha_save_what_we_added' );
 
// select
function misha_select_field( $checkout ){
 
	// you can also add some custom HTML here
	$nic = '';
	if(get_current_user_id())
	{
	    $nic = get_user_meta(get_current_user_id(),'cnic_number',true);
	}
 
	woocommerce_form_field( 'nic', array(
		'type'          => 'text', // text, textarea, select, radio, checkbox, password, about custom validation a little later
		'required'	=> true, // actually this parameter just adds "*" to the field
		'class'         => array('misha-field', 'form-row-wide'), // array only, read more about classes and styling in the previous step
		'label'         => 'Client NIC or Company Registration number',
		'default' => $nic
			
		), $checkout->get_value( 'nic' ) );
 
	// you can also add some custom HTML here
 
}
 
// checkbox
function misha_subscribe_checkbox( $checkout ) {
 
	woocommerce_form_field( 'subscribed', array(
		'type'	=> 'checkbox',
		'class'	=> array('misha-field form-row-wide'),
		'label'	=> ' Subscribe to our newsletter.',
		), $checkout->get_value( 'subscribed' ) );
 
}
 
// save field values
function misha_save_what_we_added( $order_id ){
 
	if( !empty( $_POST['nic'] ) )
		update_post_meta( $order_id, 'nic', sanitize_text_field( $_POST['nic'] ) );
 
 
	if( !empty( $_POST['subscribed'] ) && $_POST['subscribed'] == 1 )
		update_post_meta( $order_id, 'subscribed', 1 );
 
}

include "order_process.php";
// die("Here");
if(isset($_REQUEST['cnic_number']) && isset($_REQUEST['user_id_custom']))
{
    update_user_meta($_REQUEST['user_id_custom'],'cnic_number',$_REQUEST['cnic_number']);
    if(isset($_REQUEST['billing_address_1']))
    update_user_meta($_REQUEST['user_id_custom'],'billing_address_1',$_REQUEST['billing_address_1']);
    if(isset($_REQUEST['billing_phone']))
    update_user_meta($_REQUEST['user_id_custom'],'billing_phone',$_REQUEST['billing_phone']);
        if(isset($_REQUEST['bank_code']))
     update_user_meta($_REQUEST['user_id_custom'],'bank_code',$_REQUEST['bank_code']);
        if(isset($_REQUEST['bank_account_no']))
     update_user_meta($_REQUEST['user_id_custom'],'bank_account_no',$_REQUEST['bank_account_no']);
             if(isset($_REQUEST['branch_code']))
     update_user_meta($_REQUEST['user_id_custom'],'branch_code',$_REQUEST['branch_code']);
       if(isset($_REQUEST['beneficiary_name']))
     update_user_meta($_REQUEST['user_id_custom'],'beneficiary_name',$_REQUEST['beneficiary_name']);
}
function show_title_with_price()
{
    global $product;
    $title = $product->get_title();
    $price = $product->get_regular_price();
    $symbol = get_woocommerce_currency_symbol();

    //You may change <p> tag or add any inline CSS here.
    echo " ";
}

add_action( 'woocommerce_single_product_summary', 'show_title_with_price', 5 );
if(isset($_REQUEST['parent_search_child']))
{
    ?>
    <option value="">All Service Providers</option>
    <?php
    $id = $_REQUEST['parent_search_child'];
    $recent_posts = wp_get_recent_posts(array(

			"numberposts" => -1, // Number of recent posts thumbnails to display

			"post_status" => 'publish', //Show only the published posts
			'orderby' => 'ID',
            'order' => 'ASC',

			"post_type"=>'search_from'

		));
		foreach($recent_posts as $k=>$v)
		{
		    		$parent = get_post_meta($v['ID'],'parent_search',true);
		    if(in_array($id,$parent))
		    {
		        ?>
		        <option value="<?= $v['ID'] ?>" ><?= $v['post_title'] ?></option>
		        <?php
		    }
		}
    exit();
}

//change currency symbol
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'LKR': $currency_symbol = 'LKR'; break;
     }
     return $currency_symbol;
}

// add_filter( 'woocommerce_currencies', 'add_cw_currency' );
// function add_cw_currency( $cw_currency ) {
//      $cw_currency['CLOUDWAYS'] = __( 'Lanka Currency', 'woocommerce' );
//      return $cw_currency;
// }
add_filter('woocommerce_currency_symbol', 'add_cw_currency_symbol', 10, 2);
function add_cw_currency_symbol( $custom_currency_symbol, $custom_currency ) {
     switch( $custom_currency ) {
         case 'CLOUDWAYS': $custom_currency_symbol = 'LKR'; break;
     }
     return $custom_currency_symbol;
}
//for login redirection
function get_user_rate($user_id)
{
    global $wpdb;
    $result = $wpdb->get_results ( "
    SELECT * 
    FROM  `wp_woocommerce_order_items`" );
	$payments = array();
		foreach ($result as $key => $value) {
		    $value = (array)$value;
			$order_item_id = $value['order_item_id'];
    		$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
    		$post_author =  get_post_field ('post_author', $pid);
    		if($user_id == $post_author)
    		{
    			$payments[] = array(
    				'order_id'=> $value['order_id'],
    				'pid'=> $pid
    			);
    		}
		}
$rate = array();
		foreach($payments as $V)
		{
		    $order_id = $V['order_id'];
		    $args = array(
              'numberposts' => -1,
              'post_type'   => 'rating'
            );
             
            $latest_books = get_posts( $args );
            // print_r($payments);
            foreach($latest_books as $rv)
            {
                $rid = $rv->ID;
                if(get_post_meta($rid,'order',true) == $order_id)
                {
                    $rate[] = $rid;
                }
                
            }
		}
            return $rate;
}
//Productt rate
function get_product_rate($pro_id)
{
    global $wpdb;
    $result = $wpdb->get_results ( "
    SELECT * 
    FROM  `wp_woocommerce_order_items`" );
	$payments = array();
		foreach ($result as $key => $value) {
		    $value = (array)$value;
			$order_item_id = $value['order_item_id'];
    		$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
    		if($pro_id == $pid)
    		{
    			$payments[] = array(
    				'order_id'=> $value['order_id'],
    				'pid'=> $pid
    			);
    		}
		}
// 		print_r($payments);
$rate = array();
		foreach($payments as $V)
		{
		    $order_id = $V['order_id'];
		    $args = array(
              'numberposts' => -1,
              'post_type'   => 'rating'
            );
             
            $latest_books = get_posts( $args );
            // print_r($payments);
            foreach($latest_books as $rv)
            {
                $rid = $rv->ID;
                if(get_post_meta($rid,'order',true) == $order_id)
                {
                    $rate[] = $rid;
                }
                
            }
		}
            return $rate;
}
if(isset($_REQUEST['order_rate']))
{
    $user = wp_get_current_user();
    $uid = ( isset( $user->ID ) ? (int) $user->ID : 0 );
    $my_post = array(
  'post_title'    => $_REQUEST['order'],
  'post_content'  => json_encode($_REQUEST),
  'post_status'   => 'publish',
  'post_author'   => $uid,
  'post_type'   => 'rating',
);
 
// Insert the post into the database
 $pid = wp_insert_post( $my_post );
 if($pid && isset($_REQUEST['order']))
 {
     update_post_meta($pid,'order',$_REQUEST['order']);
 }
 if($pid && isset($_REQUEST['msg']))
 {
     update_post_meta($pid,'msg',$_REQUEST['msg']);
 }
 if($pid && isset($_REQUEST['rate']))
 {
     update_post_meta($pid,'rate',$_REQUEST['rate']);
 }
 if($pid)
 {
     echo json_encode(array("status"=>1,'msg'=>"Review submit successfully!"));
     die();
     
 }
}

add_action('wp_login','auto_redirect_after_login');
function auto_redirect_after_login(){
    $user = wp_get_current_user();
    $uid = ( isset( $user->ID ) ? (int) $user->ID : 0 );
    $user_meta=get_userdata($uid);
if(isset($user_meta->roles))
$user_roles=$user_meta->roles;
$url = site_url().'/my-account/';
if(in_array('administrator',$user_roles))
{
    $url = site_url().'/wp-admin';
}
wp_redirect($url);
exit();
}
function get_product_part($file,$pid)
{
    include($file);
}
header('Access-Control-Allow-Origin: *');

//extra param to order

/**



 * Add engraving text to order.



 *



 * @param WC_Order_Item_Product $item



 * @param string                $cart_item_key



 * @param array                 $values



 * @param WC_Order              $order



 */

/**

 * Unhook and remove WooCommerce default emails.

 */



if(isset($_POST['user_id']))

{

    $uid = $_REQUEST['user_id'];



global $wpdb;

    $sql = "SELECT *  FROM `wp_terms` join `wp_term_taxonomy` on wp_terms.term_id = wp_term_taxonomy.term_id AND wp_term_taxonomy.taxonomy = 'product_cat' AND wp_term_taxonomy.parent = '0'";

    $myrows = $wpdb->get_results($sql);

    

    foreach($myrows as $cat)

    {

        if(isset($_REQUEST[$cat->slug]))

        {

            update_user_meta($uid,$cat->slug,$_REQUEST[$cat->slug]);

        }



    }

}

function all_cats()

{

    $taxonomy     = 'product_cat';

  $orderby      = 'name';  

  $show_count   = 0;      // 1 for yes, 0 for no

  $pad_counts   = 0;      // 1 for yes, 0 for no

  $hierarchical = 1;      // 1 for yes, 0 for no  

  $title        = '';  

  $empty        = 0;



  $args = array(

         'taxonomy'     => $taxonomy,

         'orderby'      => $orderby,

         'show_count'   => $show_count,

         'pad_counts'   => $pad_counts,

         'hierarchical' => $hierarchical,

         'title_li'     => $title,

         'hide_empty'   => $empty

  );

 return $all_categories = get_categories( $args );

}

add_filter ( 'woocommerce_account_menu_items', 'misha_one_more_link' );

function misha_one_more_link( $menu_links ){

 

    // we will hook "anyuniquetext123" later

    $new = array( 'rate' => 'Rates and reviews','chat' => 'Messages', 'bill' => 'Billing'  );

 

    // or in case you need 2 links

    // $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2' );

 

    // array_slice() is good when you want to add an element between the other ones

    $menu_links = array_slice( $menu_links, 0, 1, true ) 

    + $new 

    + array_slice( $menu_links, 1, NULL, true );

 

 

    return $menu_links;

 

 

}

 

add_filter( 'woocommerce_get_endpoint_url', 'misha_hook_endpoint', 10, 4 );

function misha_hook_endpoint( $url, $endpoint, $value, $permalink ){

 

    if( $endpoint === 'rate' ) {

 

        // ok, here is the place for your custom URL, it could be external

        $url = site_url('/my-account?rate=1');

 

    }
    elseif( $endpoint === 'chat' ) {

 

        // ok, here is the place for your custom URL, it could be external

        $url = site_url('/my-account?chat=1');

 

    }
    elseif( $endpoint === 'bill' ) {

 

        // ok, here is the place for your custom URL, it could be external

        $url = site_url('/my-account?bill=1');

 

    }

    return $url;

 

}

add_action('woocommerce_before_account_navigation', 'misha_some_content_before');

function misha_some_content_before(){

    // echo 'blah blah blah before';

}

 

add_action('woocommerce_after_account_navigation', 'misha_some_content_after');
function add_payment_transection($order_value = '', $narration = '', $user = '', $deduction = '', $earned = '', $taken_forward = '', $paid = '', $order_no = '')
{
    $tno = time();
    $args = array(
        'post_title'    => $tno,
        'post_content'  => json_encode($_REQUEST),
        'post_status'   => 'publish',
        'post_author'   => get_current_user_id(),
        'post_type' => 'transection',
    );
    $post_id = wp_insert_post($args);
    update_post_meta($post_id,'transection_no',$tno);
    update_post_meta($post_id,'order_value',$order_value);
    update_post_meta($post_id,'deduction',$deduction);
    update_post_meta($post_id,'earned',$earned);
    update_post_meta($post_id,'taken_forward',$taken_forward);
    update_post_meta($post_id,'paid',$paid);
    update_post_meta($post_id,'order_no',$order_no);
    update_post_meta($post_id,'narration',$narration);
    update_post_meta($post_id,'user',$user);
    return $tno;
    
}
function misha_some_content_after(){

}

add_action( 'woocommerce_order_status_changed', 'woocommerce_order_status_changed_action', 10, 3 );

function woocommerce_order_status_changed_action( $order_id, $old_status, $new_status ) {
    
order_to_customer($order_id);

    $order = new WC_Order( $order_id );

    $order_data = $order->get_data();

    $order_billing_first_name = $order_data['billing']['first_name'];

$order_billing_last_name = $order_data['billing']['last_name'];
if($new_status == 'processing')
{

$ret = order_process($order_id);
}
elseif($new_status == 'on-hold')
{
// die($new_status);
$tid = add_payment_transection(get_post_meta($order_id,'_order_total',true),'pinvoice', get_post_meta($order_id,'_customer_user',true),0,   get_post_meta($order_id,'_order_total',true), 0,0, $order_id);
$sub = 'Startup Lawyer Order Payment Due: Invoice #'.$order_id;
$email_data = array(
    'invoice_number' => $tid
    );
    send_email($order_id, '1','','On hold email',$email_data);
}
}//end function status changed

add_action( 'woocommerce_email', 'unhook_those_pesky_emails' );



function unhook_those_pesky_emails( $email_class ) {



        /**

         * Hooks for sending emails during store events

         **/

        

        // New order emails

        remove_action( 'woocommerce_order_status_pending_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );

        remove_action( 'woocommerce_order_status_pending_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );

        remove_action( 'woocommerce_order_status_pending_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );

        remove_action( 'woocommerce_order_status_failed_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );

        remove_action( 'woocommerce_order_status_failed_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );

        remove_action( 'woocommerce_order_status_failed_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );

        

}

/*----custom booking page admin-----*/

function get_user_img($id)

{

    $meta = get_user_meta($id, 'wp_user_avatar',true);

    if($meta)

        return wp_get_attachment_url($meta);

    else

        return get_avatar_url($id);

}

function panel_url($path = '')

{

    return get_option('siteurl').'/panel/'.$path;

}



if(isset($_POST['spcats']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'scats',implode(",",$_POST['spcats']));

}

if(isset($_POST['lang']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'lang',implode(",",$_POST['lang']));

}

if(isset($_POST['district']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'district',$_POST['district']);

}

if(isset($_POST['intro_video']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'intro_video',$_POST['intro_video']);

}

if(isset($_POST['first_free_cons']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'first_free_cons',$_POST['first_free_cons']);

}

if(isset($_POST['refund']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'refund',$_POST['refund']);

}

if(isset($_POST['whaatsapp']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'whaatsapp',$_POST['whaatsapp']);

}





if(isset($_POST['type']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'type',implode(",",$_POST['type']));

}



if(isset($_POST['area']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'area',implode(",",$_POST['area']));

}



if(isset($_POST['pack_expire_date']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'pack_expire_date',$_POST['pack_expire_date']);

}





if(isset($_POST['ppack']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'ppack',$_POST['ppack']);

}

if(isset($_POST['balance']) && isset($_REQUEST['user_id']))

{

    $uid = $_REQUEST['user_id'];

    update_user_meta($uid,'balance',$_POST['balance']);

}

add_action( 'show_user_profile', 'crf_show_extra_profile_fields' );

add_action( 'edit_user_profile', 'crf_show_extra_profile_fields' );



function crf_show_extra_profile_fields( $user ) {

    $html ='';

    ob_start();

    include "user-profile.php";

    $html = ob_get_contents();

    ob_end_clean();

    echo $html;

    ?>



    <?php

}

function iconic_add_engraving_text_to_order_items( $item, $cart_item_key, $values, $order ) {
    





    if ( empty( $values['wslot'] ) &&  empty( $values['bslot'] )  &&  empty( $values['cmt'] ) ) {





        return '';





    }

    $text = '';
    $tit = '';

    if(!empty( $values['wslot'] ))

    {
        $tit = 'Slot';
        $old = get_post_meta($values['wslot'],'status',true) + 1;
        $ret = update_post_meta($values['wslot'],'status',$old);

        $text = get_the_title( $values['wslot'] );

    }

    elseif(!empty( $values['bslot'] ))

    {
        $tit = 'Slot';
    $ret = update_post_meta($values['bslot'],'status',1);
        $text = get_post_meta($values['bslot'],'date',true).'('.get_the_title($values['bslot'] ).')';

    }

    else{
        
    }
    if(!empty( $values['cmt'] ))

    {
        $tit1 = 'Comment';
        
        $text1 = $values['cmt'];
        $item->add_meta_data( __( $tit1, 'iconic' ), $text1 );

    }









    $item->add_meta_data( __( $tit, 'iconic' ), $text );



}









add_action( 'woocommerce_checkout_create_order_line_item', 'iconic_add_engraving_text_to_order_items', 10, 4 );

//add to cart item extra

/**



 * Display engraving text in the cart.



 *



 * @param array $item_data



 * @param array $cart_item



 *



 * @return array



 */





function iconic_display_engraving_text_cart( $item_data, $cart_item ) {

$head = 'Slot';
// print_r($cart_item);

    if ( empty( $cart_item['wslot'] ) &&  empty( $cart_item['bslot'] ) &&  empty( $cart_item['cmt'] ) ) {





        return $item_data;





    }

    $text = '';

    if(!empty( $cart_item['location'] ))

    {
        $head =  'Location & Slot';

        $text = get_the_title( $cart_item['location'] );

    }

    if(!empty( $cart_item['wslot'] ))

    {

        $text = get_the_title( $cart_item['wslot'] );

    }

    elseif(!empty( $cart_item['bslot'] ))

    {

        $text = get_post_meta($cart_item['bslot'],'date',true).'('.get_the_title($cart_item['bslot'] ).') ';
        if(!empty( $cart_item['location'] ))

        {
         $text = get_post_meta($cart_item['bslot'],'date',true).'('.get_the_title($cart_item['bslot'] ).') via '.get_the_title( $cart_item['location'] );   
        }

    }







if(!empty($text))
{

    $item_data[] = array(





        'key'     => $head,





        'value'   => wc_clean($text),





        'display' => '',





    );
}
    if(!empty( $cart_item['cmt'] ))
    {
    $item_data[] = array(





        'key'     => 'Comment',





        'value'   => wc_clean($cart_item['cmt']),





        'display' => '',





    );
    }









    return $item_data;



}









add_filter( 'woocommerce_get_item_data', 'iconic_display_engraving_text_cart', 10, 2 );





////end

///////////////////////////custom fields on add to cart

/**

 * Output custom field.

 */

//add custom data in cart session

/**

 * Add engraving text to cart item.

 *

 * @param array $cart_item_data

 * @param int   $product_id

 * @param int   $variation_id

 *

 * @return array

 */

function iconic_add_engraving_text_to_cart_item( $cart_item_data, $product_id, $variation_id ) {

    $engraving_text = filter_input( INPUT_POST, 'iconic-engraving' );

// var_dump($product_id);

    $bcat = ot_get_option( 'booking_ca_id','' );

    $wcat = ot_get_option( 'webinaar_cat_id','' );

    $terms = wc_get_product_term_ids( $product_id, 'product_cat' );

    $product = wc_get_product( $product_id );

    if(in_array($bcat, $terms))

    {

        $slot = $_REQUEST['bslot'];
        $location = $_REQUEST['location'];



        if (  !$_REQUEST['bslot'] ) {

            return $cart_item_data;

        }



        $cart_item_data['bslot'] = $slot;
        $cart_item_data['location'] = $location;

    }

    elseif(in_array($wcat, $terms))

    {

        $slot = $_POST['wslot'];



        if (  !$_POST['wslot'] ) {

            return $cart_item_data;

        }



        $cart_item_data['wslot'] = $slot;

    }

    else

    {

        echo '';

    }
    if(isset($_REQUEST['cmt']))
    {
        $cart_item_data['cmt'] = $_REQUEST['cmt'];
    }




    return $cart_item_data;

}



add_filter( 'woocommerce_add_cart_item_data', 'iconic_add_engraving_text_to_cart_item', 10, 3 );

//ebd session

function get_slots($pid, $vdate)

{

    $slots = array();

     /*$slots['100'] = array(

                 "id" => $pid,

                 "value" => $vdate

                 );*/

     $args = array( 

    'post_parent' => $pid,

    'post_type' => 'bslot',

    'posts_per_page'   => -1,

);



 $posts = get_posts( $args );



if (is_array($posts) && count($posts) > 0) {

    // Delete all the Children of the Parent Page

    foreach($posts as $post){

        if($vdate == get_post_meta($post->ID,'date',true))

        {

            $slots[] = array(

                "id" => $post->ID,

                "value" => get_the_title($post->ID),

                "date" => get_post_meta($post->ID,'date',true),
                "block" => get_post_meta($post->ID,'status',true)

                );

        }

        

        // $slots[$post->ID] = get_post_meta($post->ID,'date',true);



    }



}

    

    return bubble_sort($slots);

}

function bubble_sort($arr) {

    $size = count($arr)-1;

    for ($i=0; $i<$size; $i++) {

        for ($j=0; $j<$size-$i; $j++) {

            $k = $j+1;

            if ($arr[$k]['id'] < $arr[$j]['id']) {

                // Swap elements at indices: $j, $k

                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);

            }

        }

    }

    return $arr;

}

function myscript() {

?>

<script type="text/javascript">

 var AJAX_URL  = "<?= get_site_url(); ?>/wp-ajax/";

 var BASE_URL  = "<?= get_site_url(); ?>";

 var ASSET_URL  = "<?= get_assets_url(); ?>";

</script>

<?php

}

add_action('wp_footer', 'myscript');

function output_add_to_cart_custom_fields() {
die("POK");
    $product_id = get_the_id();

    $bcat = ot_get_option( 'booking_ca_id','' );

    $wcat = ot_get_option( 'webinaar_cat_id','' );

    $terms = wc_get_product_term_ids( $product_id, 'product_cat' );

    $product = wc_get_product( $product_id );
    var_dump($bcat);
    die("OK");

    if(in_array($bcat, $terms))

    {
        $locations = get_post_meta($product_id,'locations',true);
        $slot = isset($_REQUEST['bslotn'])?$_REQUEST['bslotn']:0;
        if($slot)
        {
            $sdate = get_post_meta($slot,'date',true);
        }
        else
        {
            $sdate = date('Y-m-d');
        }
        

        ?>

            <input type="hidden" id="datepicker_field_new" value="<?= (isset($sdate)?$sdate:'') ?>">
            <input type="text" id="datepicker_field" value="3/9/2021">

            <div id="DatePicker"></div>

            <input type="hidden" name="bslot" value="<?= $slot ?>">

            <input type="hidden" name="product_id" value="<?= $product_id; ?>">
            <select class="location" name="location">
                <option value="0">Select Location</option>
                <?php
                foreach($locations as $k=> $v)
                {
                    ?>
                    <option value="<?= $v; ?>"><?= get_the_title($v); ?></option>
                    <?php
                }
                ?>
                
            </select>

            <div class="dropdown time" style="display:block;">

            <a href="#" data-toggle="dropdown">Slot <span id="selected_time1"><?= ($slot)?get_the_title($slot):""; ?></span></a>

            <div class="dropdown-menu" id="drop_show">

            <div class="dropdown-menu-content" >





            <div class="radio_select add_bottom_15">

            <ul>

            <?php

            $slots = get_slots($product_id, $sdate);

            foreach ($slots as $key => $value) {

             ?>

            <li onclick="select_slot('<?= $value['id']; ?>');">

            <input type="radio" slot="<?= $value['id']; ?>" id="time_<?= $value['id']; ?>" class="bslot_cls"  name="btime" value="<?= $value['value']; ?>" <?= ($value['id'] == $slot)?"checked":"No"; ?>>

            <label for="time_<?= $value['id']; ?>"><?= $value['value']; ?></label>

            </li>

             <?php   

            }

            ?>

            

            </ul>

            </div>

            <!-- /time_select -->

            <!-- <h4>Dinner</h4>

            <div class="radio_select">

            <ul>

            <li>

            <input type="radio" id="time_5" name="time" value="08.00pm">

            <label for="time_1">20.00<em>-40%</em></label>

            </li>

            <li>

            <input type="radio" id="time_6" name="time" value="08.30pm">

            <label for="time_2">20.30<em>-40%</em></label>

            </li>

            <li>

            <input type="radio" id="time_7" name="time" value="09.00pm">

            <label for="time_3">21.00<em>-40%</em></label>

            </li>

            <li>

            <input type="radio" id="time_8" name="time" value="09.30pm">

            <label for="time_4">21.30<em>-40%</em></label>

            </li>

            </ul>

            </div> -->

            <!-- /time_select -->



            </div>



            </div>



            </div>

        <?php

    }

    elseif(in_array($wcat, $terms))

    {

        $args = array(

            'post_parent' => $product_id,

            'post_type' => 'wslot'

        );



        $posts_array = get_posts($args);

        //print_r($posts_array);

        ?>
        <label>Date and time:</label>
        <select name="wslot">

            <?php

            foreach($posts_array as $post)

            {

                ?>

                <option value="<?= $post->ID?>"><?= $post->post_title?></option>

                <?php

            }

            //post_title

            ?>

        </select>
        <label>Tickets:</label>

        <?php

    }
    elseif(in_array(17, $terms))
    {
        $pros = get_post_meta($product_id,'products',true);
        // print_r($pros);
        ?>
        <div class="pack_products">
            <ul>
                <?php
                foreach($pros as $k=>$v)
                {
			        ECHO get_product_part('parts/pack_li.php',$v);
                }
                ?>
            </ul>
        </div>
        <?php
        // echo "package";
    }

    else

    {

        //  echo 'OK';

    }
    if(!in_array($bcat, $terms) && !in_array($wcat, $terms))
    {
    ?>
    <div class="sp_instr">
    <label>Special Instructions:</label>
    <textarea name="cmt" class="form-control"></textarea>
    </div>
    <?php
    }
     echo "I m here";

}



add_action( 'woocommerce_before_add_to_cart_button', 'output_add_to_cart_custom_fields', 10 );

///////////////////////////custom fields on add to cart

if(isset($_REQUEST['bslot']))

{



    bslots($_REQUEST['bslot']);

}

function get_day_id($dname)

{

    $days = array();

    $days[] = array(

        "name" => "Mon"

    );

    $days[] = array(

        "name" => "Tue"

    );

    $days[] = array(

        "name" => "Wed"

    );

    $days[] = array(

        "name" => "Thu"

    );

    $days[] = array(

        "name" => "Fri"

    );

    $days[] = array(

        "name" => "Sat"

    );

    $days[] = array(

        "name" => "Sun"

    );

    foreach($days as $k=> $n)

    {

        if($n['name'] == $dname)

        {

            return $k+1;

        }

    }

    return 0;

}

function bslots($product_id)

{

    $args = array(

        'post_parent' => $product_id,

        'post_type' => 'bslot',

        'posts_per_page'   => -1,

        'orderby'          => 'date',

        'order'            => 'ASC',

    );



    $posts = get_posts( $args );



    if (is_array($posts) && count($posts) > 0) {



        // Delete all the Children of the Parent Page

        foreach($posts as $post){



            wp_delete_post($post->ID, true);



        }



    }
    



// Delete the Parent Page

// wp_delete_post($product_id, true);

    $json = get_post_meta( $product_id,'booking_data',true);

    $edit= json_decode($json,true );
    $slot_day = $edit['slot_day'];
    
    $slot_ed =$edit['slot_ed'];
    foreach($edit['slot_sd'] as $sd_k => $sd_v)
    {
      $ndate = $start_date = $sd_v;

    $end_date = $slot_ed[$sd_k];
    

    while ($ndate <= $end_date) {

        $day = $nameOfDay = date('D', strtotime($ndate));

        $did = get_day_id($day);

        //  echo $day.'<br>';



        //create db slot logic



        if(isset($slot_day[$sd_k])&& $slot_day[$sd_k] == $did)

        {

            create_slot($edit, $day,$product_id,$ndate);

        }

        //create db slot logic

        $ndate = date('Y-m-d', strtotime($ndate. ' + 1 day'));

    }//while   
    }//foreach

    $slot_st = $edit['slot_st'];

    $slot_ed = $edit['slot_ed'];

    $slot_et = $edit['slot_et'];

    foreach($edit['slot_st'] as $k=>$st)

    {

        if(!empty($slot_st[$k]) && !empty($slot_sd[$k]))

        {

            $time = date("h:i A", strtotime($slot_st[$k]));

            $title = $slot_sd[$k].' '. $time;

            $my_post = array(

                'post_title'    => $title,

                'post_content'  => json_encode($edit),

                'post_status'   => 'publish',

                'post_parent'   => $product_id,

                'post_type'   => 'wslot'

            );

            $postid = wp_insert_post( $my_post );

            if(isset($slot_sd[$k]) && $postid)

                update_post_meta( $postid, 'from_date', $slot_sd[$k]);

            if(isset($slot_st[$k]) && $postid)

                update_post_meta( $postid, 'from_time', $slot_st[$k]);

            if(isset($slot_ed[$k]) && $postid)

                update_post_meta( $postid, 'to_date', $slot_ed[$k]);

            if(isset($slot_et[$k]) && $postid)

                update_post_meta( $postid, 'to_time', $slot_et[$k]);

            update_post_meta( $postid, 'status', 0);

        }

    }

}

function create_slot($edit, $day,$product_id, $date)

{

    $slot_et = $edit['slot_et'];

    $slot_du = $edit['slot_du'];

    $slot_re = $edit['slot_re'];

    // print_r($slot_et);

    foreach($edit['slot_st'] as $k=>$st)

    {

        if(!empty($st) && !empty($slot_du[$k]))

        {



            $et = $slot_et[$k];

            $minutes = abs(strtotime($st) -strtotime($et)) / 60;//total avalible time

            $tdur = $slot_du[$k]+$slot_re[$k];//total slot including rest and duration

            $num_slots = $minutes/$tdur;

            $stime =  $st;

            for($i = 1;$i<= $num_slots;$i++)

            {



                $title = date("h:i A", strtotime($stime));//slot title

                $my_post = array(

                    'post_title'    => $title,

                    'post_content'  => json_encode($edit),

                    'post_status'   => 'publish',

                    'post_parent'   => $product_id,

                    'post_type'   => 'bslot'

                );

                $postid = wp_insert_post( $my_post );

                if(isset($stime) && $postid)

                    update_post_meta( $postid, 'from_time', $stime);

//get end time of slot

//to_time



                $time = strtotime($stime);

                $ttime = date("H:i", strtotime('+'.$slot_du[$k].' minutes', $time));

                if(isset($ttime) && $postid)

                    update_post_meta( $postid, 'to_time', $ttime);

                if(isset($date) && $postid)

                    update_post_meta( $postid, 'date', $date);

                if(isset($slot_re[$k]) && $postid)

                    update_post_meta( $postid, 'rest', $slot_re[$k]);

                if(isset($slot_du[$k]) && $postid)

                    update_post_meta( $postid, 'duration', $slot_du[$k]);

//date



                $stime = date("H:i", strtotime('+'.$tdur.' minutes', $time));



            }

        }

    }

}

if(isset($_REQUEST['wslot']))

{

    wslots($_REQUEST['wslot']);

}

function wslots($product_id)

{

    $args = array(

        'post_parent' => $product_id,

        'post_type' => 'wslot'

    );



    $posts = get_posts( $args );



    if (is_array($posts) && count($posts) > 0) {



        // Delete all the Children of the Parent Page

        foreach($posts as $post){



            wp_delete_post($post->ID, true);



        }



    }



// Delete the Parent Page

// wp_delete_post($product_id, true);

    $json = get_post_meta( $product_id,'booking_data',true);

    $edit= json_decode($json,true );

    $slot_sd = $edit['slot_sd'];

    $slot_st = $edit['slot_st'];

    $slot_ed = $edit['slot_ed'];

    $slot_et = $edit['slot_et'];

    foreach($edit['slot_st'] as $k=>$st)

    {

        if(!empty($slot_st[$k]) && !empty($slot_sd[$k]))

        {

            $time = date("h:i A", strtotime($slot_st[$k]));

            $title = $slot_sd[$k].' '. $time;

            $my_post = array(

                'post_title'    => $title,

                'post_content'  => json_encode($edit),

                'post_status'   => 'publish',

                'post_parent'   => $product_id,

                'post_type'   => 'wslot'

            );

            $postid = wp_insert_post( $my_post );

            if(isset($slot_sd[$k]) && $postid)

                update_post_meta( $postid, 'from_date', $slot_sd[$k]);

            if(isset($slot_st[$k]) && $postid)

                update_post_meta( $postid, 'from_time', $slot_st[$k]);

            if(isset($slot_ed[$k]) && $postid)

                update_post_meta( $postid, 'to_date', $slot_ed[$k]);

            if(isset($slot_et[$k]) && $postid)

                update_post_meta( $postid, 'to_time', $slot_et[$k]);

            update_post_meta( $postid, 'status', 0);

        }

    }

}

function wpse_add_custom_meta_box_2() {

    add_meta_box(

        'custom_meta_box-2',       // $id

        'Service Provider',                  // $title

        'show_custom_meta_box_2',  // $callback

        'product',                 // $page

        'side',                  // $context

        'high'                     // $priority

    );

}

add_action('add_meta_boxes', 'wpse_add_custom_meta_box_2');

//showing custom form fields

function show_custom_meta_box_2() {

    global $post;



    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );

    // print_r($post->post_author);



    ?>



    <select name="user_id" >

        <option>Select Provider</option>

        <?php



        $args = array(

            'role'    => 'service_provider',

            'orderby' => 'user_nicename',

            'order'   => 'ASC'

        );

        $users = get_users( $args );

        // var_dump($users);



        // echo '<ul>';

        foreach ( $users as $user ) {

            ?>

            <option value="<?= $user->data->ID; ?>" <?= (isset($post->post_author) && $post->post_author == $user->data->ID)?"selected":""; ?> <?= (isset($edit['user_id']) && $edit['user_id'] == $user->data->ID)?"selected":'' ?>><?= esc_html( $user->display_name ) ?></option>

            <?php

        }

        ?>

    </select>



    <?php

}

add_action('save_post', 'functiontocall');



function functiontocall ($post_id) {

    if ( ! wp_is_post_revision( $post_id ) && isset($_POST['user_id']) && $_POST['user_id'] && get_post_type($post_id) == 'product'){



        $my_post = array(

            'ID'            => $post_id,

            'post_author'   => $_POST['user_id'],

        );

        global $wpdb;

        $sql = "UPDATE `wp_posts` SET `post_author` = ".$_POST['user_id']." WHERE `wp_posts`.`ID` = ".$post_id;







        // unhook this function so it doesn't loop infinitely

        remove_action('save_post', 'functiontocall');



        // update the post, which calls save_post again

        // wp_update_post( $my_post );

        $ret = $wpdb->query($sql);







        // re-hook this function

        // add_action('save_post', 'functiontocall');



    }



}

/*----custom booking page admin-----*/

add_filter( 'manage_edit-product_columns', 'bbloomer_admin_products_visibility_column' );



function bbloomer_admin_products_visibility_column( $columns ){

    unset($columns['product_tag']);

    $columns['visibility'] = 'Manage';

    return $columns;

}



add_action( 'manage_product_posts_custom_column', 'bbloomer_admin_products_visibility_column_content', 10, 2 );



function bbloomer_admin_products_visibility_column_content( $column, $product_id ){

    if ( $column == 'visibility' ) {

        //booking_ca_id

        $bcat = ot_get_option( 'booking_ca_id','' );

        $wcat = ot_get_option( 'webinaar_cat_id','' );

        $terms = wc_get_product_term_ids( $product_id, 'product_cat' );

        $product = wc_get_product( $product_id );

        if(in_array($bcat, $terms))

            echo '<a href="?page=my-menu&product_id='.$product_id.'&type=add">Add Booking</a>';

        else if(in_array($wcat, $terms))

            echo '<a href="?page=my-menu&product_id='.$product_id.'&type=wadd">Add Booking</a>';

        else

        {

            echo '';

        }

        ;

    }

}

//save bookings

if(isset($_POST['save_booking']))

{

    $user_id = 0;

    if(isset($_REQUEST['user_id']))

        $user_id = $_REQUEST['user_id'];

    $postid = 0;

    if(isset($_REQUEST['edit_id']))

    {

        $postid = $_REQUEST['edit_id'];

        //booking_data

        $ret = update_post_meta( $postid, 'booking_data', json_encode($_REQUEST));

        $arg = array(

            'ID' => $postid,

            'post_author' => $user_id,

        );

        if($user_id)

            wp_update_post( $arg );

        if(isset($_REQUEST['start_date']) && $postid)

            update_post_meta( $postid, 'start_date', $_REQUEST['start_date'] );

        if(isset($_REQUEST['end_date']) && $postid)

            update_post_meta( $postid, 'end_date', $_REQUEST['end_date'] );

        if(isset($_REQUEST['booking_type']) && $postid)

            update_post_meta( $postid, 'booking_type', $_REQUEST['booking_type'] );

        if(isset($_REQUEST['user_id']) && $postid)

            update_post_meta( $postid, 'user_id', $_REQUEST['user_id'] );
        if(isset($_REQUEST['locations']) && $postid)
        {

            update_post_meta( $postid, 'locations', $_REQUEST['locations'] );
        }

        if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'wadd')

            wslots($postid);

        else if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'add')

        {

            bslots($postid);

        }

        function my_update_notice() {

            ?>

            <div class="updated notice">

                <p><?php

                    _e( 'Booking updated successfully!!', 'my_plugin_textdomain' );

                    ?></p>

            </div>

            <?php

        }

        add_action( 'admin_notices', 'my_update_notice' );

    }

}







// update_field( 'field_5f0caaa3cf53c', $_REQUEST['start_date'], $postid );





add_action('admin_menu', 'my_menu_pages');

 //add_action('admin_menu', 'my_menu_pages3');

function my_menu_pages(){
// die("OK");
    add_menu_page('Booking', 'Bookings', 'manage_options', 'my-menu', 'my_admin_page_contents','dashicons-schedule', 3);

    add_submenu_page('my-menu', 'All Booking', 'All Booking', 'manage_options', 'my-menu?type=products', 'all_book');

    add_submenu_page('my-menu', 'Booked Slots', 'All webinars', 'manage_options', 'my-menu?type=wproducts', 'all_web');

}

function my_menu_pages3(){

    add_menu_page('Booking', 'Bookings Products', 'manage_options', 'my-menu1', 'my_admin_page_contents1','dashicons-schedule', 3);

    add_submenu_page('my-menu', 'Add Booking', 'Add Booking', 'manage_options', 'my-menu?type=add', 'add_book');

    add_submenu_page('my-menu', 'Booked Slots', 'Booked Slots', 'manage_options', 'my-menu?type=booked', 'my_admin_page_contents');

}

function my_admin_menu() {

    $menu =	add_menu_page(

        __( 'Booking', 'lawyer_booking' ),

        __( 'Booking', 'lawyer_booking' ),

        'manage_options',

        'bookings',

        'my_admin_page_contents',



        3

    );

    add_action( 'admin_print_scripts-' . $menu, get_template_directory_uri()

        .'/bookings/admin.js' );



 		add_submenu_page( 'lawyer_booking', 'My Custom Page', 'My Custom Page',

     'manage_options', 'lawyer_booking');

}




 	add_action( 'admin_menu', 'my_admin_menu' );

function get_cat_slug($cat_id) {

    $cat_id = (int)$cat_id;

    $category = &get_category($cat_id); return $category->slug;

}

function add_book(){

    my_admin_page_contents('add');

}

function all_book(){

    my_admin_page_contents('products');

}

function all_web(){

    my_admin_page_contents('wproducts');

}



function my_admin_page_contents($type = 'users') {

    if(empty($type))

    {

        $type = 'products';

    }

    if(isset($_GET['type']))

        $type=$_GET['type'];

    $file = 'bookings/'.$type.'.php';



    ob_start();

    include $file;

    $output = ob_get_contents();

    ob_end_clean();

    echo $output;

}

function my_admin_page_contents1($type = 'users') {

    if(empty($type))

    {

        $type = 'products';

    }

    if(isset($_GET['type']))

        $type=$_GET['type'];

    $file = 'bookings/'.$type.'.php';



    ob_start();

    include $file;

    $output = ob_get_contents();

    ob_end_clean();

    echo $output;

}

/*----custom booking page admin-----*/

add_action( 'after_setup_theme', 'blankslate_setup' );

function blankslate_setup() {

    load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'html5', array( 'search-form' ) );

    global $content_width;

    if ( ! isset( $content_width ) ) { $content_width = 1920; }

    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );

}

add_action( 'wp_footer', 'blankslate_footer_scripts' );

function blankslate_footer_scripts() {

    ?>

    <script>

        jQuery(document).ready(function ($) {

            var deviceAgent = navigator.userAgent.toLowerCase();

            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {

                $("html").addClass("ios");

                $("html").addClass("mobile");

            }

            if (navigator.userAgent.search("MSIE") >= 0) {

                $("html").addClass("ie");

            }

            else if (navigator.userAgent.search("Chrome") >= 0) {

                $("html").addClass("chrome");

            }

            else if (navigator.userAgent.search("Firefox") >= 0) {

                $("html").addClass("firefox");

            }

            else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {

                $("html").addClass("safari");

            }

            else if (navigator.userAgent.search("Opera") >= 0) {

                $("html").addClass("opera");

            }

        });

    </script>

    <?php

}

add_filter( 'document_title_separator', 'blankslate_document_title_separator' );

function blankslate_document_title_separator( $sep ) {

    $sep = '|';

    return $sep;

}

add_filter( 'the_title', 'blankslate_title' );

function blankslate_title( $title ) {

    if ( $title == '' ) {

        return '...';

    } else {

        return $title;

    }

}

add_filter( 'the_content_more_link', 'blankslate_read_more_link' );

function blankslate_read_more_link() {

    if ( ! is_admin() ) {

        return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';

    }

}

add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );

function blankslate_excerpt_read_more_link( $more ) {

    if ( ! is_admin() ) {

        global $post;

        return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';

    }

}

add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );

function blankslate_image_insert_override( $sizes ) {

    unset( $sizes['medium_large'] );

    return $sizes;

}

add_action( 'widgets_init', 'blankslate_widgets_init' );

function blankslate_widgets_init() {

    register_sidebar( array(

        'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),

        'id' => 'primary-widget-area',

 //       'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

 //       'after_widget' => '</li>',

        'before_title' => '<h3 class="widget-title">',

        'after_title' => '</h3>',

    ) );

}

add_action( 'wp_head', 'blankslate_pingback_header' );

function blankslate_pingback_header() {

    if ( is_singular() && pings_open() ) {

        printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );

    }

}

function blankslate_custom_pings( $comment ) {

    ?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>

    <?php

}

add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );

function blankslate_comment_count( $count ) {

    if ( ! is_admin() ) {

        global $id;

        $get_comments = get_comments( 'status=approve&post_id=' . $id );

        $comments_by_type = separate_comments( $get_comments );

        return count( $comments_by_type['comment'] );

    } else {

        return $count;

    }

}

function get_assets_url()

{

    $root = get_site_url();

    return $root = get_template_directory_uri().'/assets/';

}

//woocommerce aTTACH

function customtheme_add_woocommerce_support()

{

    add_theme_support( 'woocommerce' );

}

add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );

function woocommmerce_style() {

    wp_enqueue_style('woocommerce_stylesheet', WP_PLUGIN_URL. '/woocommerce/assets/css/woocommerce.css',false,'1.0',"all");

}
/*
add_action( 'wp_head', 'woocommmerce_style' );

//woocommerce aTTACH

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .type_box.hidden{
    display:block !important;
	   margin-left: 216px !important;
    }
  </style>';
}*/

 function get_youtube($url){

 $youtube = "https://www.youtube.com/oembed?url=". $url ."&format=json";

 $curl = curl_init($youtube);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 $return = curl_exec($curl);
 curl_close($curl);
 return json_decode($return, true);

 }

// $url = 'https://www.youtube.com/watch?v=YWZLw6Mo8X8';// youtube video url 

// Display Data 
//	print_r(get_youtube($url));
/*if(isset($_REQUEST['vid']))
{
	print_r(get_youtube($url));
	die();

}*/

