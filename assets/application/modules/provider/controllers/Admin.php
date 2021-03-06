<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!$_SESSION['knet_login'])
		{
			redirect('/panel/login');
		}
        $data= array();
		$this->load->library('template');
		$this->template->folder = 'provider';
    }
    public function index()
	{
	    
		$data= array();
		$data['assets'] = $assets= base_url('/assets').'/';
// 		die($assets);
		$data['page']= 'Dashboard';
		$data['assets']= base_url('assets/admin/');
		$uid = get_current_user_id();
// 		$user = $this->session->userdata('knet_login');
        $css = array();
        $css[]= $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
        $css[]= $assets.'//app-assets/css/core/colors/palette-gradient.css';
        $css[]= $assets.'/app-assets/css/pages/dashboard-ecommerce.css';
        $css[]= $assets.'/app-assets/css/pages/card-analytics.css';
        $js = array();
		$js[] = $assets.'app-assets/js/scripts/pages/dashboard-ecommerce.js';
		$js[] = $assets.'/app-assets/js/scripts/charts/chart-apex.js';
		$data['css']= $css;
		$data['js']= $js;
		$date = date('Y-m-d H:i:s');
		
		if(false)
		{
			$data= array();
		$data['url']= base_url(); 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Subscriptions';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/pages/app-ecommerce-shop.css';
		$js = array();


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['breed']= $breed;
		$data['data']= array();
		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_posts';
		$this->Common_model->key = 'ID';
		$modal = $this->Common_model;
		$products = $modal->get(array('post_type'=>'subscriptions','post_status'   => 'publish'));
		$data['data']= $products; 
			$this->template->admin('addsubscription',$data);

		}
		else
		{   
			$this->template->admin('index',$data);
		}

	}
    public function ppack()
    {

    	    if(isset($_SESSION['knet_login']->roles))
 	 {
	if(in_array('service_provider', $_SESSION['knet_login']->roles) ||
		
		in_array('draft_provider', $_SESSION['knet_login']->roles) 
	)
	{
		$user_id = $_SESSION['knet_login']->data->ID;
		$ppack = get_user_meta($user_id,'ppack',true);
		if($ppack)
		{
			return true;
			
		}
		else
		{
			return false;
		}
	}
	else
	{
		unset($_SESSION['knet_login']);
		wp_logout();

		wp_redirect(panel_url());

		exit();
		die("Forbidden access");
	}
    }
}//ppack end

	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	public function signup()

	{

header('Access-Control-Allow-Origin: *');

		if($_POST)

		{

			$indata= array(

				"email" =>$_POST['email'],

				"upass" =>base64_encode($_POST['pass']),

				"name" =>$_POST['name'],

			);

			$rdata = array();

				if($this->db->insert('clients',$indata))

				{

					

					$rdata = array(

						"status" => 1

					);

				}

				else

				{

					$rdata = array(

						"status" => 0,

						"text" => "server error"

					);

				}

				echo json_encode($rdata);

		}

		else{

			die("invalid request");

		}

	}

	public function tib()

	{

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = "tib";

		$data['user'] = $this->db->get('patient')->result_array();

		

		$this->load->view('main', $data);

	}

	public function applogin()

	{

	header('Access-Control-Allow-Origin: *');

		if($_POST)

		{

			$email = $_POST['email'];

			$pass = $_POST['pass'];

			$pass = base64_encode($pass);

			$res = $this->db->where('email',$email)->where('upass',$pass)->get('clients')->result_array();

			$rdata = array();

				if(count($res) > 0 )

				{

					

					$rdata = array(

						"status" => 1,

						"data" => $res[0],

					);

				}

				else

				{

					$rdata = array(

						"status" => 0,

						"text" => "No Users Found"

					);

				}

				echo json_encode($rdata);

		}

		else{

			die("invalid request");

		}

	}

	public function logout()

	{

unset($_SESSION['knet_login']);
		wp_logout();

		wp_redirect(panel_url());

		exit();

	}
    public function subscription()
	{
		$data= array();
		$data['url']= base_url(); 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Subscriptions';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/pages/app-ecommerce-shop.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['breed']= $breed;
		$data['data']= array();
		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_posts';
		$this->Common_model->key = 'ID';
		$modal = $this->Common_model;
		$products = $modal->get(array('post_type'=>'subscriptions','post_status'   => 'publish'));

		$products = wc_get_products(array(
    'category' => array('memberships'),
));
		$data['data']= $products;
		if(isset($_REQUEST["type"])  && isset($_REQUEST['user_id']) && isset($_REQUEST['order_id']))
{
    
	$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'PayHere Response';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/pages/app-ecommerce-shop.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';


		$data['page']= $page;
		$data['title']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['breed']= $breed;
	if($_REQUEST["type"] == 's')
	{
		$uid = $_REQUEST['user_id'];
		$pid = $_REQUEST['order_id'];
		//changes

		$days = get_post_meta($pid,'days',true);
		$date = date('Y-m-d');
		$date = date('Y-m-d', strtotime($date. ' + '.$days.' days'));
		update_user_meta($uid,'pack_expire_date',$date);
		update_user_meta($uid,'ppack',$pid);
		global $wpdb;
    $sql = "SELECT *  FROM `wp_terms` join `wp_term_taxonomy` on wp_terms.term_id = wp_term_taxonomy.term_id AND wp_term_taxonomy.taxonomy = 'product_cat' AND wp_term_taxonomy.parent = '0'";
    $myrows = $wpdb->get_results($sql);
    $cts = array();
    foreach($myrows as $cat)
    {
    	$postno = 0;
    	$postno = get_post_meta($pid,$cat->slug, true);

        if($postno)
        {
            $cts[] = $cat->term_id;
            update_user_meta($uid,$cat->slug,$postno);
        }

    }
    $ucats = get_user_meta($uid,'scats',true);
                        $ucats = explode(',',$ucats);
                        foreach($cts as $cid)
                        {
                          if(!in_array($cisd, $ucats))  
                          {
                              $ucats[] = $cid;
                          }
                        }
                        update_user_meta($uid,'scats',implode(",",$ucats));
		//change end
		$tid= add_transections(get_the_title($pid).' Subscription',$pid,$uid,0,get_post_meta($pid, '_price',true));
		$data = array();
		$user_info = get_userdata($uid);
		$data['img'] = 'https://image.flaticon.com/icons/svg/845/845646.svg';
		$data['text'] = 'Payment recived!';
		buy_subscription($uid,$pid,$tid);
        $data['assets'] = $assets= base_url('/assets').'/';
		$this->template->admin('response',$data);
		return 0;

	}
	else
	{
		$data = array();
		$data['img'] = 'https://image.flaticon.com/icons/svg/845/845648.svg';
		$data['text'] = 'Payment faild!';
		$this->template->admin('response',$data);
	}
}
$js = array();

		$this->template->admin('addsubscription',$data);
	}
	public function set_avatar_url($avatar_url, $user_id) {
        global $wpdb;
        $upload_dir = wp_upload_dir();

$image_data = file_get_contents( $avatar_url );

$filename = basename( $avatar_url );

if ( wp_mkdir_p( $upload_dir['path'] ) ) {
  $file = $upload_dir['path'] . '/' . $filename;
}
else {
  $file = $upload_dir['basedir'] . '/' . $filename;
}

file_put_contents( $file, $image_data );

$wp_filetype = wp_check_filetype( $filename, null );

$attachment = array(
  'post_mime_type' => $wp_filetype['type'],
  'post_title' => sanitize_file_name( $filename ),
  'post_content' => '',
  'post_status' => 'inherit'
);

$attach_id = wp_insert_attachment( $attachment, $file );
require_once( ABSPATH . 'wp-admin/includes/image.php' );
        $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
        wp_update_attachment_metadata($attach_id, $attach_data);
        update_user_meta($user_id, 'wp_user_avatar', $attach_id);
    }
    public function profile( $user_id = 0)
	{

		$user = $_SESSION['knet_login'];
		$this->load->model('Product_model');
                $product = $this->Product_model;
		if($user_id)
		{
		    //$user_id
		    $user = $product->getuser($user_id );
		}
		if($_POST)
		{
			//genrel  
			if(isset($_REQUEST['general']))
			{
				
				if(isset($_FILES['pimg']['name']) && !empty($_FILES['pimg']['name']))
		        {
	        	$imgData = $this->template->upload('pimg');
	        	if($imgData['localPath'])
	        	{
	        	    $this->load->model('Common_model');
		$this->Common_model->table = 'wp_users';
		$this->Common_model->key = 'ID';
		$modal = $this->Common_model;
	        		$mediaID = $modal->addMedia($imgData);
	        		if($mediaID)
	        		{
	        		$r = $product->updatemeta('user',$user->ID,'wp_user_avatar',$mediaID);
	        		}
	        	}
	        }

				if(isset($_POST['first_name']))
				{
					$product->updatemeta('user',$user->ID,'first_name',$_POST['first_name']);
				}
				if(isset($_POST['last_name']))
					$product->updatemeta('user',$user->ID,'last_name',$_POST['last_name']);
			}
			elseif(isset($_REQUEST['chpass'])  && isset($_POST['npass'])  && isset($_POST['cpass']))
			{
				if($_POST['cpass'] == $_POST['npass'])
				{
					$up = array(
					    'user_pass' => md5($_POST['npass'])
					    );
					    $this->load->model('Common_model');
		                $modal = $this->Common_model;
					    $modal->table = 'wp_users';
					    $modal->key = 'ID';
					    $modal->update($user->ID, $up);

				}
				else
				{
					 $this->session->set_flashdata('error', 'Password not match!');
			redirect($_SERVER['HTTP_REFERER']);
			exit();
				}
			 

			}
			elseif(isset($_REQUEST['bio']))
			{
				if(isset($_POST['description']))
				{
					$product->updatemeta('user',$user->ID,'description',$_POST['description']);
				}
				if(isset($_POST['lang']) && isset($user->ID))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'lang',implode(",",$_POST['lang']));
				}if(isset($_POST['type']) && isset($user->ID))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'type',implode(",",$_POST['type']));
				}if(isset($_POST['area']) && isset($user->ID))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'area',implode(",",$_POST['area']));
				}
				if(isset($_POST['district']))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'district',$_POST['district']);
				}
				if(isset($_POST['intro_video']))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'intro_video',$_POST['intro_video']);
				}
				if(isset($_POST['first_free_cons']))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'first_free_cons',$_POST['first_free_cons']);
				}
				if(isset($_POST['billing_phone']))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'billing_phone',$_POST['billing_phone']);
				}
				if(isset($_POST['first_free_cons']))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'first_free_cons',$_POST['first_free_cons']);
				}
				if(isset($_POST['refund']))
				{
				    $uid = $user->ID;
				    $product->updatemeta('user',$uid,'refund',$_POST['refund']);
				}
			}
			elseif(isset($_REQUEST['bank']))
			{
				if(isset($_POST['account_title']))
				{
					$product->updatemeta('user',$user->ID,'account_title',$_POST['account_title']);
				}
				if(isset($_POST['account_no']))
				{
					$product->updatemeta('user',$user->ID,'account_no',$_POST['account_no']);
				}
				if(isset($_POST['bank_code']))
				{
					$product->updatemeta('user',$user->ID,'bank_code',$_POST['bank_code']);
				}
				if(isset($_POST['branchh_code']))
				{
					$product->updatemeta('user',$user->ID,'branchh_code',$_POST['branchh_code']);
				}
				
				$product->updatemeta('user',$user->ID,'acc_date',date('Y-m-d H:i:s'));
				$user = $_SESSION['knet_login']->data;
				$product->updatemeta('user',$user->ID,'acc_user',$user->ID);
				
				
			}
			$this->session->set_flashdata('success', 'Profile update successfully!');
			redirect($_SERVER['HTTP_REFERER']);
			exit();
			
			
		}

		$data= array();
		$data['url']= base_url(); 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Profile Setup';
		$breed[$page] = ' ';
		$css = array();
		//vendors
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/pickers/pickadate/pickadate.css';
		//vendors
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/forms/validation/form-validation.css';
		$css[] = $assets.'/assets/css/style.css';
		$js = array();
		$js[] = $assets.'app-assets/js/scripts/pages/account-setting.js';
		$js[] = 'http://cdn.ckeditor.com/4.14.1/full/ckeditor.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['user']= $user;
		// $data['footer']= 'cfooter';
		// $data['header']= 'cheader'; 
		$data['breed']= $breed;
		$data['data']= array();
		$this->template->admin('profile',$data);
	}
    public function chat()
	{
		$data= array();
		$data['url']= base_url(); 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Chat';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$css[] = $assets.'/app-assets/css/pages/app-chat.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/pages/app-chat.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['footer']= 'cfooter';
		// $data['header']= 'cheader'; 
		$data['breed']= $breed;
		$data['data']= array();
// 		$this->load->view('includes/cheader',$data);
		
// 		$this->load->view('includes/cfooter',$data);
		$this->template->admin('chat',$data);
	}
	public function payments()
	{
		$data= array();
		$data['url']= base_url();
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'payments';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$css[] = $assets.'/app-assets/css/pages/app-chat.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/pages/app-chat.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$this->load->model('Common_model');
		$modal = $this->Common_model;
		$modal->table = 'wp_posts';
		$modal->key = 'ID';
		$all  = $modal->get(array('post_type'=>'transection'));
		$payments = array();
		$user_id = $_SESSION['knet_login']->data->ID;
		foreach ($all as $key => $value) {
			$usre = get_post_meta($value['ID'], 'user',true);
			if($usre == $user_id)
			{
				$payments[] = $value;
			}
		}
		$data['data']= $payments;
$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';
		$data['js']= $js;
		$this->template->admin('payments',$data);
	}
	public function myorder()
	{
		$data= array();
		$data['url']= base_url();
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'My Orders';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$css[] = $assets.'/app-assets/css/pages/app-chat.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/pages/app-chat.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['footer']= 'cfooter';
		// $data['header']= 'cheader';
		$data['breed']= $breed;
		$this->load->model('Common_model');
		$modal = $this->Common_model;
		$modal->table = 'wp_woocommerce_order_items';
		$modal->key = 'order_item_id';
		$user_id = $_SESSION['knet_login']->data->ID;
		$all  = $modal->get(array());
		// print_r($all);	
			$payments = array();
		$user_id = $_SESSION['knet_login']->data->ID;
		foreach ($all as $key => $value) {
			$order_item_id = $value['order_item_id'];
			$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
			$modal->table = 'wp_posts';
		$modal->key = 'ID';
		$post  = $modal->getbyid($pid);
		$post_author = 0;
		if(isset($post->post_author))
		{
		$post_author = $post->post_author;
		}
		
		if($user_id == $post_author)
		{
		    
		    $post = get_post($value['order_id']);
		    //check order exist
		    
		    if($post && $post->post_status != 'wc-on-hold' && $post->post_status != 'trash')
		    {
			$payments[] = array(
				'order_id'=> $value['order_id'],
				'order'=> $modal->getbyid($value['order_id']),
				'pid'=> $pid
			);
		    }
		}
		
		}
		if(isset($_REQUEST['status']))
		{
		    $c = array();
		foreach($payments as $v)
		{
		    if($v['order']->post_status == $_REQUEST['status'])
		    {
		        $c[] = $v;
		    }
		}
		$payments = $c;
		}
		if(isset($_REQUEST['cat']))
		{
		    $cat = $_REQUEST['cat'];
		    
		$arr = array();
		    foreach($payments as $v)
    		{
    		        $pid = $v['pid'];
    		        $term_list = wp_get_post_terms($pid,'product_cat',array('fields'=>'ids'));
                    if(in_array($cat,$term_list))
                    {
                        $arr[] = $v;
                    }
    		}
    		$payments = $arr;
		}
		$data['data']= $payments;
// 		$this->load->view('includes/cheader',$data);

// 		$this->load->view('includes/cfooter',$data);
		$this->template->admin('earning',$data);
	}
	
	public function rating()
	{
		$data= array();
		$data['url']= base_url();
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'My Orders';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$css[] = $assets.'/app-assets/css/pages/app-chat.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/pages/app-chat.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['footer']= 'cfooter';
		// $data['header']= 'cheader';
		$data['breed']= $breed;
		$this->load->model('Common_model');
		$modal = $this->Common_model;
		$modal->table = 'wp_woocommerce_order_items';
		$modal->key = 'order_item_id';
		$user_id = $_SESSION['knet_login']->data->ID;
		$all  = $modal->get(array());
		// print_r($all);	
			$payments = array();
		$user_id = $_SESSION['knet_login']->data->ID;
		foreach ($all as $key => $value) {
			$order_item_id = $value['order_item_id'];
			$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
			$modal->table = 'wp_posts';
		$modal->key = 'ID';
		$post  = $modal->getbyid($pid);
		$post_author = $post->post_author;
		if($user_id == $post_author)
		{
			$payments[] = array(
				'order_id'=> $value['order_id'],
				'order'=> $modal->getbyid($value['order_id']),
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
            foreach($latest_books as $rv)
            {
                $rid = $rv->ID;
                if(get_post_meta($rid,'order',true) == $order_id)
                {
                    $rate[] = $rid;
                }
                
            }
		}
		$data['data']= $rate;
// 		$this->load->view('includes/cheader',$data);

// 		$this->load->view('includes/cfooter',$data);
		$this->template->admin('rating',$data);
	}
	public function page($page = "")
	{
		$data= array();
		$data['assets']= base_url('assets/admin/');
		$this->template->admin($page,$data);
	}
	public function userStatus($uid, $status)
	{
		$this->db->where('UserID',$uid)->update('users',array('status'=> $status));
		if($status == 0)
		{
			$this->session->set_flashdata('success', 'User Deactive successfully!');
		}
		else
		{
			$this->session->set_flashdata('success', 'User active successfully!');
		}
		redirect($_SERVER['HTTP_REFERER']);

		
		
	}
	public function apiStatus($uid, $status)
	{
		$this->db->where('UserID',$uid)->update('users',array('api_status'=> $status));
		if($status == 1)
		{
			$this->session->set_flashdata('success', 'Account Go to sandbox successfully!');
		}
		else
		{
			$this->session->set_flashdata('success', 'Accopunt Goes Live successfully!');
		}
		redirect($_SERVER['HTTP_REFERER']);

		
		
	}
	public function users()
	{
		$data= array();
		// $data['users'] = array();
		$page = 1;
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
		}
		$per_page = 10;
		$per_page = $per_page - 1;//9
		$start = ($per_page*$page) - $per_page;//0
		
		$end = $start+ $per_page;
		
		$data['assets']= base_url('assets/admin/');
		$books = $this->db->where('roleID',2)->get('users')->result_array();

		$obooks = array();
		foreach ($books as $key => $value) {
			if($key >= $start &&  $key <= $end)
			{
				$obooks[]=$value;
			}
		}
		$pagination = array(
			"cur"=> $page,
			"per"=> $per_page +1,
			"total"=> count($books),
			"tpage"=> ceil(count($books)/($per_page+1))
		); 
		$data['page'] = $pagination;
		$data['users']= $obooks;
		$data['assets']= base_url('assets/admin/');
		$this->template->admin('users',$data);
	}
	public function clients()
	{
	    $this->load->model('Common_model');
		$this->Common_model->table = 'clients';
		$modal = $this->Common_model;

		$data= array();
		$data['page']= 'My Clients';
		$data['assets']= base_url('assets/admin/');
		$user = $this->session->userdata('knet_login');
		$data['data'] = $modal->get(array('userID'=>$user->UserID));
		//new logic
		$this->db->select('e.*');
$this->db->from('clients e');
$this->db->join('clients_to_user ue', 'ue.cID = e.id', 'left');
$this->db->where('ue.userID', $user->UserID);
$data['data'] = $query = $this->db->get()->result_array();
$data['resaler'] = 0;
if($user->roleID == 4)
{
    $data['resaler'] = 1;
}
		
		$this->template->admin('allclients',$data);
		/*if(!isset($_SESSION['alogin']))

		{

			// redirect('admin/login');



		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'home';

		$data['post']= $this->db->where('ptype',10)->get('posts')->result_array();

		$this->load->view('main1', $data);*/

	}
	public function index1()
	{
		$data= array();
		$data['assets'] = $assets= base_url('/assets').'/';
// 		die($assets);
		$data['page']= 'Dashboard';
		$data['assets']= base_url('assets/admin/');
		$uid = get_current_user_id();
// 		$user = $this->session->userdata('knet_login');
        $css = array();
        $css[]= $assets.'/app-assets/vendors/css/charts/apexcharts.css';
        $js = array();
		$js[] = 'https://cdn.jsdelivr.net/npm/chart.js@2.8.0';
		$data['css']= $css;
		$data['js']= $js;
		if(!$this->ppack())
		{
			$data= array();
		$data['url']= base_url(); 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Subscriptions';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/pages/app-ecommerce-shop.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['breed']= $breed;
		$data['data']= array();
		$products = wc_get_products(array(
    'category' => array('memberships'),
));
		$data['data']= $products;
			$this->template->admin('addsubscription',$data);

		}
		else
		{   
			$this->template->admin('dashboard',$data);
		}
		

		/*if(!isset($_SESSION['alogin']))

		{

			// redirect('admin/login');



		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'home';

		$data['post']= $this->db->where('ptype',10)->get('posts')->result_array();
		

		$this->load->view('main1', $data);*/

	}

	public function addroute()

	{

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = "addroute";

		

		$this->load->view('main', $data);

	}

	public function addcity()

	{

		if($_POST)

		{

			$this->db->insert('cities',$_POST);

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = "addcity";

		

		$this->load->view('main', $data);

	}

	public function route()

	{

		header('Access-Control-Allow-Origin: *');

		$re = array();

		$re[] = array(

		'id '=>1,

		"name"=>'KHB to LHR',

		

		);

		$re[]= array(

		'id '=>2,

		"name"=>'KHB to LHR',

		

		);

		$ret = array("status"=>1,"data"=>$re);

		echo json_encode($ret);

	}

	public function chpass()

	{
		if(!isset($_SESSION['knet_login']))

		{

			redirect('/login');



		}

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'cur_pass','current password', 'required');



                $this->form_validation->set_rules('npass','New password', 'required');

                $this->form_validation->set_rules('con_pass','Confirm password', 'required');



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$cur_pass = $this->input->post('cur_pass');

                	$new_pass = $this->input->post('npass');

                	$con_pass = $this->input->post('con_pass');

                	if($new_pass == $con_pass)

                	{

                		$id = $_SESSION['knet_login']->UserID;

                		$ret = $this->db->where('UserID',$id)->get('Users')->result_array();

                		

                		if(count($ret) > 0)

		                   {

		                   	$ret = $ret[0];



		                   	$upass= $ret['upass'];



		                   	if($upass == md5($cur_pass))

		                   	{

		                   		//die("OI");

		                   		$udata = array(

		                   			"upass"=> base64_decode($cur_pass)

		                   		); 

		                   		$ret = $this->db->where('UserID',$id)->update('Users',$udata);

		                   		

		                   		if($ret)

		                   		{

		                   			$data['success'] = "Password changed successfully";



		                   		}

		                   		else

		                   		{

		                   			$data['error'] = "Server error!";

		                   		}



		                   	}

		                   	else

		                   	{

		                   		$data['error'] = "Password incorrect sorry!";

		                   	}

		                   	

		                   }

		                   else

		                   {

		                   	redirect('login');

		                   }

                	}

                	else

                	{

                		$data['error'] = "password not matched!";     

                	}

                   

                }

			

		}

		$assets = base_url('assets/admin');

		$data['assets'] = $assets;

		$data['page'] = 'Edit Profile';

		$data['assets']= base_url('assets/admin/');
		$this->load->library('template');
		$this->template->admin('chpass',$data);

	}

	public function dashboard()

	{

		$assets = base_url('assets/admin');

		$clients= $this->db->get('clients')->result_array();

		

		$data['clients'] = count($clients);

		$data['assets'] = $assets;

		$data['page'] = "dashboard";

		

		$this->load->view('main', $data);

	}

	public function login()

	{

		if(isset($_SESSION['alogin']))

		{

			redirect('admin');



		}

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'uname','username', 'required');



                $this->form_validation->set_rules('upass','password', 'required');



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = "All fields required";      

                }

                else

                {

                	$uname = $this->input->post('uname');

                	$upass = $this->input->post('upass');



                	$upass = base64_encode($upass);

                   $ret =$this->db->where('email',$uname)->where('upass',$upass)->get('users')->result_array();

                   if(count($ret) > 0)

                   {

                   	if($ret[0]['status'] == '0')

                   	{

                   	$_SESSION['alogin']= $ret[0];

                   	redirect('admin');

                   	

                   }

                   else

                   {

                   	$data['error'] = "Account Blocked";     

                   }

                   }

                   else

                   {

                   	$data['error'] = "username or password invalid!";     

                   }

                   

                }

			

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$this->load->view('login1', $data);

	}



	public function single()

	{

		header('Access-Control-Allow-Origin: *');

		$return  =  array(

			'img'=>'https://i.stack.imgur.com/ddX9U.png"/',

			'rname'=>'Lahore to Khushab',

			'disc'=>'The most popular industrial group ever, and largely

      responsible for bringing the music to a mass audience.',

			'driver'=>'azeem ali',

			'distance'=>'102KM',

			'time'=>'11am - 3am'

		);

		$new = array(

			'data'=>$return,

			'status' => 1

		);

		echo json_encode($new);

	}



	public function update_meta($uid,$ptype,$key, $val)

	{



		$ret= $this->db->where('ptype',$ptype)->where('pid',$uid)->where('meta_key',$key)->get('meta_values')->result_array();

		

                   	if(count($ret) > 0)

                   	{

                   		$id = $ret[0]['id'];

                   		$indata = array(

                		

                		'ptype' => $ptype,

                		'pid' => $uid,

                		'meta_key' => $key,

                		'meta_value' => $val

                	);



                   $ret =$this->db->where('id',$id)->update('meta_values',$indata);

                   if($ret)

                   {

                 	return true;

                   }

                   else

                   {

                   	return false;

                   }

                   	}

                   	else

                   	{

                   		$indata = array(

                		'id' => '',

                		'ptype' => $ptype,

                		'pid' => $uid,

                		'meta_key' => $key,

                		'meta_value' => $val

                	);

                   $ret =$this->db->insert('meta_values',$indata);

                   if($ret)

                   {

                 	return true;

                   }

                   else

                   {

                   	return false;

                   }



                   	}

	}

	//genaric add

	

	public function add($id = 0)

	{
		$data = array();

		$data['pd'] = $this->db->where('id',$_GET['pid'])->get('post_type')->row();

		if($_POST)

		{
			$hasreq= 0;


			 	

                		 	$fields =get_fields($_GET['pid']);

	foreach ($fields as $key => $value) 

	{

		if($value['required'])

		{
			$hasreq= 1;


			$this->form_validation->set_rules( $value['name'],$value['label'], 'required');

		

		}

		if($value['type'] == 'file')

		{

			$up_path = 'uploads/';

			$config = array();

			$config['upload_path']          = './'.$up_path;

                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';

                $config['max_size']             = 5000;

                $config['max_width']            = 1024;

                $config['max_height']           = 768;

			$ret = $this->upload_file($value['name'],$config);

			if($ret['status'] == 'success')

			{

				$path = $up_path.$ret['data'];

			}

		}

	}



                if ($this->form_validation->run() == FALSE && $hasreq == 1)

                {

                   $data['error'] = validation_errors();

                }

                else

                {

                	//$name = $this->input->post('uname');

                	$type = $_GET['pid'];

                	if($id)

                	{

                		$indata = array(

                		'id' => '',

                		'ptype' => $type,

                		'create_at' => date('Y-m-d H:i:s'),

                	);

                		unset($indata['id']);

                   $ret =$this->db->where('id', $id)->update('posts',$indata);

                		//update

                	}

                	else

                	{

                	$indata = array(

                		'id' => '',

                		'ptype' => $type,

                		'create_at' => date('Y-m-d H:i:s'),

                	);

                   $ret =$this->db->insert('posts',$indata);

                   }

                   if($ret)

                   {

                   	$uid = $this->db->insert_id();

                   	$ptype = $_GET['pid'];

                   	$key= "added_by";

                   	$val=1;

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

                   		if($ret)

                   		{

                   			foreach ($fields as $key => $value) 

							{

								if($value['type'] == 'file')

								{

									$up_path = 'uploads/';

									$config = array();

									$config['upload_path']          = './'.$up_path;

						                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';

						                $config['max_size']             = 5000;

						                $config['max_width']            = 1024;

						                $config['max_height']           = 768;

						                $ret = array();

				                if(isset($_FILES[$value['name']]))

				               {

									$ret = $this->upload_file($value['name'],$config);

									if($ret['status'] == 'success')

									{



										$path = $up_path.$ret['data'];

										$ret= $this->update_meta($id,$ptype,$value['name'], $path);

									}

								}

								else

								{

								}

								}

								$name= $value['name'];

								if(isset($_POST[$name]) && !empty($_POST[$name]))

								{

									if($id)

				                	{

				                		$uid = $id;

				                	}

									$ptype = $_GET['pid'];

				                   	$key= $name;

				                   	$val= $_POST[$name];

                   					$ret= $this->update_meta($uid,$ptype,$key, $val);

								}

							}

								if($id)

			                	{

			                		$data['success'] = "Post Edit successfully!";                        	

			                	}

			                	else

			                	{

			                		$data['success'] = "Post Add successfully!";                        	

			                	}

							

                	

						}

						else

						{

							$data['error'] = "meta error!";     

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$assets = base_url('assets/admin');

		if($id)

		{

			$data['post']= $this->db->where('id',$id)->get('posts')->result_array()[0];

			$data['post_id'] = $id;

		}

		$data['assets'] = $assets;

		$data['page'] = 'add';

		

		$this->load->view('main1', $data);

	}

	public function addNewUser($id = 0)

	{

		

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'uname','Username', 'required');

			 	$this->form_validation->set_rules( 'email','Email', 'required');



                $this->form_validation->set_rules('upass','Password', 'required');

                		 	$fields =get_fields(3);

	foreach ($fields as $key => $value) 

	{

		if($value['required'])

		{

			$this->form_validation->set_rules( $value['name'],$value['label'], 'required');

		

		}

	}



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('uname');

                	$email = $this->input->post('email');

                	$upass = $this->input->post('upass');

                	$type = 1;

                	if($id)

                	{

                		$indata = array(

                		'id' => '',

                		'name' => $name,

                		'email' => $email,

                		'upass' => base64_encode($upass),

                		'type' => $type

                	);

                		unset($indata['id']);

                   $ret =$this->db->where('id', $id)->update('users',$indata);

                		//update

                	}

                	else

                	{

                	$indata = array(

                		'id' => '',

                		'name' => $name,

                		'email' => $email,

                		'upass' => base64_encode($upass),

                		'type' => $type

                	);

                   $ret =$this->db->insert('users',$indata);

                   }

                   if($ret)

                   {

                   	$uid = $this->db->insert_id();

                   	$ptype = 1;

                   	$key= "added_by";

                   	$val=$_SESSION['alogin']['id'];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

                   		if($ret)

                   		{

                   			foreach ($fields as $key => $value) 

							{

								$name= $value['name'];

								if(isset($_POST[$name]) && !empty($_POST[$name]))

								{

									if($id)

				                	{

				                		$uid = $id;

				                	}

									$ptype = 1;

				                   	$key= $name;

				                   	$val= $_POST[$name];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

								}

							}

								if($id)

			                	{

			                		$data['success'] = "User Edit successfully!";                        	

			                	}

			                	else

			                	{

			                		$data['success'] = "User Add successfully!";                        	

			                	}

							

                	

						}

						else

						{

							$data['error'] = "meta error!";     

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$assets = base_url('assets/admin');

		if($id)

		{

			$data['user']= $this->db->where('id',$id)->get('users')->result_array()[0];

		}

		$data['assets'] = $assets;

		$data['page'] = 'addnewuser';

		

		$this->load->view('main', $data);

	}

	public function manage($id=0, $status= 1)

	{

		if($id)

		{

			$udata= array(

				'status'=>$status

			);

			$ret= $this->db->where('id', $id)->update('Users',$udata);

			if ($ret) {

				$data['success'] = "User Block Successfully";

			}

			//die("delete");

		}

		$data['fieldsData'] = get_fields($_GET['pid']);

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['users'] = $this->db->where('ptype ',$_GET['pid'])->get('posts')->result_array();

		$data['assets'] = $assets;

		$data['page'] = 'manage';

		$this->load->view('main', $data);

	}

	public function manage1($id=0, $status= 1)

	{

		if($id)

		{

			$udata= array(

				'status'=>$status

			);

			$ret= $this->db->where('id', $id)->update('Users',$udata);

			if ($ret) {

				$data['success'] = "User Block Successfully";

			}

			//die("delete");

		}

		$data['fieldsData'] = get_fields($_GET['pid']);

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['posts'] = $this->db->where('ptype ',$_GET['pid'])->get('posts')->result_array();

        $data['th'] = array();

        $fields = get_fields($_GET['pid']);

        $data['keys'] = $fields;

        $data['pid'] = $_GET['pid'];

        foreach ($fields as $key => $value) {

        	$data['th'][] = $value['label'];

        }

		$data['assets'] = $assets;

		$data['page'] = 'manage';

		$this->load->view('main1', $data);

	}



	public function manageuser($id=0, $status= 1)

	{

		if($id)

		{

			$udata= array(

				'status'=>$status

			);

			$ret= $this->db->where('id', $id)->update('Users',$udata);

			if ($ret) {

				$data['success'] = "User Block Successfully";

			}

			//die("delete");

		}

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['users'] = $this->db->where('id !=',$id)->where('type ',1)->get('users')->result_array();

		$data['assets'] = $assets;

		$data['page'] = 'manageuser';

		$this->load->view('main', $data);

	}



	public function manageproduct($id=0, $status= 1)

	{

		if($id)

		{

			

			$ret= $this->db->where('id', $id)->delete('products',$udata);

			if ($ret) {

				$data['success'] = "product Delete Successfully";

			}

			//die("delete");

		}

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['users'] = $this->db->get('products')->result_array();

		$data['assets'] = $assets;

		$data['page'] = 'manageproduct';

		$this->load->view('main', $data);

	}

	public function meta($id=0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');

			 	$this->form_validation->set_rules( 'is_show','Is show', 'required');

			 	$this->form_validation->set_rules( 'sort','Sort', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                	print_r($_POST);

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$is_show = $this->input->post('is_show');

                	$sort = $this->input->post('sort');

                	$indata = array(

                		'id' => '',

                		'p_type' => $_GET['pid'],

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required,

                		'sort' => $sort,

                		'is_show' => $is_show

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'meta';

		$data['fieldsData'] = $this->db->where('p_type',$_GET['pid'])->get('fields_meta')->result_array();

		$this->load->view('main', $data);

	}

	public function meta1($id=0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');

			 	$this->form_validation->set_rules( 'is_show','Is show', 'required');

			 	$this->form_validation->set_rules( 'sort','Sort', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                	print_r($_POST);

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$is_show = $this->input->post('is_show');

                	$sort = $this->input->post('sort');

                	$indata = array(

                		'id' => '',

                		'p_type' => $_GET['pid'],

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required,

                		'sort' => $sort,

                		'is_show' => $is_show

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'meta';

		$data['fieldsData'] = $this->db->where('p_type',$_GET['pid'])->get('fields_meta')->result_array();

		$th = array(

			"#NO",

			"Name",

			"Label",

			"Type",

			"Required",

			"Is Show",

			"Action",

		);

		$data['th'] = $th;

		$this->load->view('main1', $data);

	}



	public function usermeta($id=0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$indata = array(

                		'id' => '',

                		'p_type' => '3',

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'usermeta';

		$data['fieldsData'] = $this->db->where('p_type',3)->get('fields_meta')->result_array();

		$this->load->view('main', $data);

	}

	public function upload_file($name,$config)

        {

                

                $this->load->library('upload', $config);

                $ret = array();

                if ( ! $this->upload->do_upload($name))

                {

                        $error = array('error' => $this->upload->display_errors());

                        $ret = array(

                        	"status"=>"error",

                        	"msg"=>$error

                        );

                        //$this->load->view('upload_form', $error);

                }

                else

                {

                        if($this->upload->data())

                        {

                        $ret = array(

                        	"status"=>"success",

                        	"data"=> $this->upload->data()['file_name']

                        );

                    	}

                    	else

                    	{

                    		$ret = array(

                        	"status"=>"error",

                        	"msg"=>'db error'

                        );

                    	}





                }

                return $ret;

        }

	 public function do_upload1($name)

        {

                $config['upload_path']          = 'uploads/';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100;

                $config['max_width']            = 1024;

                $config['max_height']           = 768;



                $this->load->library('upload', $config);

$ret = array();

                if ( ! $this->upload->do_upload($name))

                {

                        $error = array('error' => $this->upload->display_errors());

                        $ret = array(

                        	"status"=>"error",

                        	"msg"=>$error

                        );

                        //$this->load->view('upload_form', $error);

                }

                else

                {

                        $data = $this->upload->data();

                        $data['id'] = '';

                        

                        $res= $this->db->insert('files',$data);

                        if($res)

                        {

                        $ret = array(

                        	"status"=>"success",

                        	"data"=>$this->db->insert_id()

                        );

                    	}

                    	else

                    	{

                    		$ret = array(

                        	"status"=>"error",

                        	"msg"=>'db error'

                        );

                    	}





                }

                return $ret;

        }



	public function addNewProduct($id = 0)

	{

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Name', 'required');

			 	$this->form_validation->set_rules( 'price','Price', 'required');



                $this->form_validation->set_rules('discrip','Description', 'required');

                		 	$fields =get_fields(2);

	foreach ($fields as $key => $value) 

	{

		if($value['required'])

		{

			$this->form_validation->set_rules( $value['name'],$value['label'], 'required');

		

		}

	}



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$price = $this->input->post('price');

                	$discrip = $this->input->post('discrip');

                	$type = 1;

                	$indata = array(

                		'id' => '',

                		'name' => $name,

                		'price' => $price,

                		'discription' => $discrip

                	);

                	if($id)

                	{

                		unset($indata['id']);

                   	$ret =$this->db->where('id', $id)->update('products',$indata);

                		//update

                	}

                	else

                	{

                   		$ret =$this->db->insert('products',$indata);

                   	}

                   if($ret)

                   {

                   	$uid = $this->db->insert_id();

                   	$ptype = 2;

                   	$key= "added_by";

                   	$val=$_SESSION['alogin']['id'];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

                   		if($ret)

                   		{

                   			foreach ($fields as $key => $value) 

							{

								$name= $value['name'];

								if(isset($_POST[$name]) && !empty($_POST[$name]))

								{

									if($id)

				                	{

				                		$uid = $id;

				                	}

									$ptype = 2;

				                   	$key= $name;

				                   	$val= $_POST[$name];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

								}

							}

								if($id)

			                	{

			                		$data['success'] = "product Edit successfully!";                        	

			                	}

			                	else

			                	{

			                		$data['success'] = "product Add successfully!";                        	

			                	}

							

                	

						}

						else

						{

							$data['error'] = "meta error!";     

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$data['categories'] =array(); //$this->db->get('product_cat')->result_array();

		if($id)

		{

			$data['product']= $this->db->where('id',$id)->get('products')->result_array()[0];

		}



		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'addNewProduct';

		$this->load->view('main', $data);

	}



	public function productmeta($id =0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');

			 	//$this->form_validation->set_rules( 'cat','Category', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$cat = $this->input->post('cat');

                	$indata = array(

                		'id' => '',

                		'p_type' => '2',

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							//$cat

							$uid = $id;

                   	$ptype = 22;

                   	$key= "product_cat";

                   	$val= $cat;

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$uid = $this->db->insert_id();

                   	$ptype = 22;

                   	$key= "product_cat";

                   	$val= $cat;

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$data['categories'] = array();//$this->db->get('product_cat')->result_array();

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'productmeta';

		$data['fieldsData'] = $this->db->where('p_type',2)->get('fields_meta')->result_array();

		$this->load->view('main', $data);

	}
	public function contact(){

		$data['page'] = 'add_page';
		$pid = $_GET['pid'];
		$data['post_id'] = $pid;
		if($_POST)
		{
			foreach ($_POST as $key => $value) {
				$ret= $this->update_meta($pid,$pid,$key,$_POST[$key] );
			}
		}

		

		$this->load->view('main1', $data);
	}





}

