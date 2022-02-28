<?php
add_filter('wp_mail_from','yoursite_wp_mail_from');
function yoursite_wp_mail_from($content_type) {
  return 'info@startuplawyer.lk';
}
add_filter('wp_mail_from_name','yoursite_wp_mail_from_name');
function yoursite_wp_mail_from_name($name) {
  return 'Startup Lawyer';
}
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );
if(isset($_REQUEST['email_template']))
{
    
    $order_id = '13536';
    $sub = 'Startup Lawyer Order Payment Due: Invoice #'.$order_id;
    send_email($order_id, $_REQUEST['email_template'],'raheelshehzad188@gmail.com',$sub);
}
function email_param($order_id, $data)
{

    $data['payment_method']= get_post_meta($order_id,'_payment_method_title',true);
    $data['billing_name']= get_post_meta($order_id,'_billing_name',true);
    if($order_id)
    {
        $uid = get_post_meta($order_id,'_customer_user',true);
        $uid = 1;
        $data['Beneficiary_name'] = get_user_meta($uid,'account_title',true);
        $data['bank_ac_no'] = get_user_meta($uid,'account_no',true);
        
    }
    
    $data['billing_email']= get_post_meta($order_id,'_billing_email',true);
    $data['biling_nic']= get_post_meta($order_id,'nic',true);
    $data['reject_reason']= get_post_meta($order_id,'reject_reason',true);
    $data['salutation_option']= get_post_meta($order_id,'_billing_salutation',true);
    $data['billing_address']= get_post_meta($order_id,'_billing_address',true);
    $data['business_name_if_provided']= get_post_meta($order_id,'_billing_business_name',true);
    $data['mobile']= get_post_meta($order_id,'_billing_phone',true);
    $data['order_time']= get_the_time('F d,Y ', $order_id).' at '.get_the_time('H:i:s A', $order_id);
    $data['current_time']= date('F d,Y ').' at '.date('H:i:s A');
    $data['invoice_number']= $order_id;
    $data['order_id']= $order_id;
    $provider = order_to_provider($order_id);
    if($provider)
    {
        $data['provider_name'] = get_user_meta($provider,'first_name',true).' '.get_user_meta($provider,'last_name',true);
    }
    $product = order_to_product($order_id);
    if($product)
    {
 global $wpdb;
 $cats = array();
    $result = $wpdb->get_results ( "
    SELECT * 
    FROM  `wp_term_relationships` where `object_id`='".$product."'");
	$payments = array();
		foreach ($result as $key => $value) {
		    $cats[]= $value->term_taxonomy_id;
		}
        if(in_array('20',$cats))//for service product
        {
            $dead_line = get_post_meta($product,'dead_line',true);
        $data['5b_dilivery'] ='within '.$dead_line.' days of
accepting this order';
        }
        else
        {
                    $data['5b_dilivery'] ='on Booking date & time slot';
        }
    }
    
    ob_start();
    get_product_part('parts/inv_table.php',$order_id);
    $data['inv_table'] = $data['order_table']= $content = ob_get_clean();
    ob_end_clean();

    //accdec_btns
    ob_start();
    get_product_part('parts/accdec_btns.php',$order_id);
    $data['accdec_btns']= $content = ob_get_clean();
    ob_end_clean();

    
    $data['amount_due']= get_post_meta($order_id,'_order_total',true);
    $data['due_date']= $new_time = date("Y-m-d H:i:A", strtotime('+96 hours'));
    // $data['mobile']= 'db mobile';
    return $data;
}
function db_param($order_id, $data)
{
    $ret = array();
    $args = array(
    'post_type'=> 'email_param',
    'post_status' => array( 'draft' ),
    'order'    => 'ASC',
    'posts_per_page' => -1
);              

$the_query = new WP_Query( $args );
foreach($the_query->posts as $k=> $v)
{
    $pid = $v->ID;
    $index = get_post_meta($pid, 'param_index',true);
    $key = get_post_meta($pid, 'param_key',true);
    $def = get_post_meta($pid, 'param_value',true);
    if($index && $key)
    {
        $sing = array(
            'index' =>$index,
            'key' =>$key,
            'def' =>$def,
            );
            $ret[] = $sing;
    }
}
    return $ret;
    
}
function fill_email($str, $order_id, $data = array())
{
    $db_param = db_param($order_id, $data);
    $email_param = email_param($order_id, $data);
    // print_r($db_param);
    // die();
    for($i = 0;$i <=2;$i++)
    {
        foreach($db_param as $k=> $v)
    {
        $rvalue = $v['def'];
        $index = $v['index'];
        if(isset($email_param[$index]))
        {
            $rvalue = $email_param[$index];
        }
        $str = str_replace($v['key'],$rvalue,$str);
    }
    }
    return $str;
    
}
function send_email($order_id, $type,$temail = '',$subject = '', $data = array())
{
    if(empty($temail))
    {
        $temail = get_post_meta($order_id,'_billing_email',true);
    }
    //key to post
    global $wpdb;
    $extra_css = '';
    $sql = "SELECT * FROM $wpdb->postmeta
WHERE meta_key = 'email_key' AND  meta_value = '".$type."' LIMIT 1";
$posts = $wpdb->get_results($sql, ARRAY_A);

$output = '<h1>Not found</h1>';
if(isset($posts[0]['post_id']) && $post = get_post($posts[0]['post_id']))
{
    $post_id = $posts[0]['post_id'];
    //$data
    $subject = fill_email($post->post_title, $order_id, $data);
    $output = fill_email($post->post_content, $order_id, $data);
    $extra_css = get_post_meta($post_id,'extra_css',true);
    
}
    $header = '';
            ob_start();
            $base_path = 'woocommerce/';
            include $base_path.'emails/email-header.php';
$header = ob_get_contents();
ob_end_clean();
    $footer = '';
            ob_start();
            $base_path = 'woocommerce/';
            include $base_path.'emails/email-footer.php';
$footer = ob_get_contents();
ob_end_clean();
// $footer = '';
$output = $header.$output.$footer;
if(isset($data['down']))
return $output;

if(isset($_REQUEST['email_template']))
{
    echo $output;
    die();
}
$headers = array();
$headers[] = 'Cc: info@startuplawyer.lk';

$ret = wp_mail( $temail, $subject, $output,$headers );
}
?>