<?php 
// if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function wp_data()
{
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://startuplawyer.lk/main/blog/?home_api=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
return json_decode($response,true);

}
function redirect_to($location){
    // die($location);
  header("Location: $location");
  exit();
}
function sanitize_title($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
function get_user_img($id)
{
    $CI =& get_instance();
    return $id;
    $meta = get_user_meta($id, 'wp_user_avatar',true);

    if($meta)

        return wp_get_attachment_url($meta);

    else

        return get_avatar_url($id);

}
function get_option($key,$def = ''){
    $CI =& get_instance();
    $CI->load->model('Common_model');
            // $this->Common_model->table = 'music';
                $product = $CI->Product_model;
     return $product->get_option($key , $def);
}
function get_assets_url(){
     return 'https://startuplawyer.lk/main/assets/front';
}
function get_current_user_id(){
    $r = false;
    if(isset($_SESSION['knet_login']))
    {
        
        $r = $_SESSION['knet_login']->ID;
    }
    return $r;
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

function check_permission($permession){
    $r = false;
    $CI =& get_instance();
    $CI->load->model('Product_model');
    $product = $CI->Product_model;
    
    if(isset($_SESSION['knet_login']->ID))
    {
        $uid = $_SESSION['knet_login']->ID;
        $user = $product->getuser($uid);
        $roles = $user->roles;
        if(in_array('administrator',$roles))
        {
           $r = true; 
        }
        else if(in_array('sub_admin',$roles))
        {
            $uid = $_SESSION['knet_login']->ID;
            $uerpermission = $user->permission;
            if(in_array($permession,$uerpermission))
            {
                $r = true; 
            }
           
        }
    }
    return $r;
}
if ( ! function_exists('after_signup'))
{
    function after_signup($uid,$mail)
    {
        $user = new WP_User( $uid );
        $token = md5($uid);
        $CI =& get_instance();
        $email = $user->data->user_email;
        $em = array(
                    "name"=> $user->display_name,
                    "link"=> base_url('/auth/verify').'?token='.$token,
                    "token"=>$token,
                );
                $msg = $CI->load->view('mail/signup', $em, true);
                $headers = array('Content-Type: text/html; charset=UTF-8');
                if($mail)
                {
                    $ret = wp_mail($email,"Email Activation!",$msg,$headers);
                }
    }   
}
if ( ! function_exists('buy_subscription'))
{
    function buy_subscription($uid,$pid,$rno)
    {
        $user = new WP_User( $uid );
        $product = wc_get_product($pid);

        $CI =& get_instance();
            $items = array();
            $items[] = array(
                'name'=>get_the_title($pid),
                'price'=>$product->price,
                'sku'=>$product->get_sku(),
                'qty'=>1,
                'total'=>$product->price,
                );
                $total = $product->price;
        $email = $user->data->user_email;
                $msg = $CI->load->view('mail/reciept', array('uid'=>$uid,'rno'=>$rno,'items'=>$items,'total'=>$total,'dis'=>'0.00','comm'=>'42.37','tax'=>'44.33','plat'=>'1233.33','paypro'=>'1233.33'), true);
                $headers = array('Content-Type: text/html; charset=UTF-8');
                $ret = wp_mail($email,"Subscription Buy Successfully!",$msg,$headers);
    }   
}