<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	function __construct() { 
        parent::__construct();
    }
    public function blog()
	{
		$data= array();
		$data['assets']= base_url('assets/books/');
		$data['hclass']= 'header_in clearfix';
		$url = base_url('assets/design/');
		$css = array();
		$css[] = $url.'css/bootstrap_customized.min.css';
		$css[] = $url.'css/blog.css';
		$data['css'] = $css;
		$this->load->library('template');
		$this->template->foogra('blog',$data);
	}
    public function corder()
	{
		
		$oid = 0;
		if(isset($_SESSION['knet_login']))
		{
			$tot = 0;
			$cart = $_SESSION['addcart'];
			$this->load->model('Product_model');
			$product = $this->Product_model;
			foreach($cart as $k=> $v)
			{
													  $pro = $product->getproduct( $v['pid'] );
$terms = $product->getcat( $pro->catID);
 $recent_author = $product->getuser($pro->uid);
				$tot = $tot +($pro->price * $v['qty']);
			}
			$uid = $_SESSION['knet_login']->ID;
			$in = array(
			'order_no' => time(),
			'uid' => $uid,
			'total' => $tot
			);
			$this->db->insert('orders',$in);
			$oid = $this->db->insert_id();
			foreach($cart as $k=> $v)
			{
			    $tot = ($pro->price * $v['qty']);
			    $pro = $product->getproduct( $v['pid'] );
			    $in = array(
    			'oid' => $oid,
    			'provider' => $pro->uid,
    			'pid' => $v['pid'],
    			'qty' => $v['qty'],
    			'price' => $tot,
    			'raw' => json_encode($v)
    			);
    			$this->db->insert('order_items',$in);
			}
			//orders
		}
		return $oid;
	}
    public function payhere($status)
	{
		echo $status;
		var_dump($_REQUEST);
	}
    public function checkout()
	{
		$data= array();
		if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'payment')
		{
			$cart = $_SESSION['addcart'];
			foreach($cart as $k=> $v)
			{
				if(isset($_REQUEST['inst'][$k]['inst']))
				$cart[$k]['cmt'] =  $_REQUEST['inst'][$k]['inst'];
			}
			$_SESSION['addcart'] = $cart;
			//create order here
			$data['order_id'] = $this->corder();
// 			var_dump($data['order_id']);
			
		}
		$data['assets']= base_url('assets/books/');
		$data['hclass']= 'header_in clearfix';
		$url = base_url('assets/design/');
		$css = array();
		$css[] = $url.'css/bootstrap_customized.min.css';
		$css[] = $url.'css/blog.css';
		$data['css'] = $css;
		$this->load->library('template');
		$this->template->foogra('checkout',$data);
	}
    public function deadline()
    {
        if(isset($_REQUEST['hash']) && isset($_REQUEST['type']))
        {
		        $modal = $this->Common_model;
		        $modal->table = 'wp_postmeta';
		        $modal->key = 'meta_id';
		        $row = $modal->get(array('meta_key'=>'hash','meta_value'=>$_REQUEST['hash']));
		        if(isset($row[0]) && $_REQUEST['type'] == 'rejected' && !empty(get_post($row[0]['post_id'])))
		        {
		            $row = $row[0];
		            
		            $order_id = $row['post_id'];
		            $provider = order_to_provider($order_id);
		            $order = new WC_Order($order_id);
		            $data = array();
                    $data['order_id'] = $order_id;
                    $data['action'] = $_REQUEST['type'];
                    $data['txt'] = 'Order Accepted successfully';
                    $this->template->full('modal_page',$data);
                    exit();
		        }
		        elseif(isset($row[0]) && $_REQUEST['type'] == 'accepted' && !empty(get_post($row[0]['post_id'])))
		        {
		            $row = $row[0];
		            
		            $order_id = $row['post_id'];
		            $provider = order_to_provider($order_id);
		            $order = new WC_Order($order_id);
		            $data = array();
                    $data['order_id'] = $order_id;
                    $data['action'] = $_REQUEST['type'];
                    $data['txt'] = 'Order Accepted successfully';
                    $this->template->full('modal_page',$data);
                    exit();
		        }
		        else if(isset($row[0]) && $_REQUEST['type'] == 'approve')
		        {
		            $row = $row[0];
		            $ret = update_post_meta(get_post_meta($row['post_id'],'order_id',true),'deadline',get_post_meta($row['post_id'],'days',true));
		            $order = new WC_Order(get_post_meta($row['post_id'],'order_id',true));
        if (!empty($order)) {
            $order = new WC_Order( get_post_meta($row['post_id'],'order_id',true) );
            $order->update_status( 'eextension-approv' );
        }
		            $data = array();
                    $data['type'] = 1;
                    $data['txt'] = 'Extension Approve successfully';
		        }
		        else if(isset($row[0]) && $_REQUEST['type'] == 'refund')
		        {
		            $row = $row[0];
		            $order = new WC_Order(get_post_meta($row['post_id'],'order_id',true));
        if (!empty($order)) {
            $order = new WC_Order( get_post_meta($row['post_id'],'order_id',true) );
            $ret = $order->update_status( 'refund-requested' );
        }
		            $data = array();
                    $data['type'] = 1;
                    $data['txt'] = 'Refund Request send to admin successfully!';
		        }
		        else
		        {
		            $data = array();
            $data['type'] = 0;
            $data['txt'] = 'Invalid link!';
		        }
		        
            
        
        }
        else
        {
            die("OK");
            $data = array();
            $data['type'] = 0;
            $data['txt'] = 'Invalid link!';
        }
        $this->template->full('success',$data);
        
    }
    public function notify($id = 0)
    {
        /*
        $merchant_id            = $_POST['merchant_id'];
        $order_id               = $_POST['order_id'];
        $payhere_amount         = $_POST['payhere_amount'];
        $payhere_currency       = $_POST['payhere_currency'];
        $status_code            = $_POST['status_code'];
        $md5sig                 = $_POST['md5sig'];
        $subscription_id        = $_POST['subscription_id'];

        $merchant_secret = 'XXXXXXXXXXXXX'; // Use your PayHere Merchant ID

        $local_md5sig = strtoupper (
            md5 ( 
                $merchant_id . 
                $order_id . 
                $payhere_amount . 
                $payhere_currency . 
                $status_code . 
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            // Update database
        }
        else{
            // Log the error
        }*/

        $sl_timezone = 'Asia/Colombo';
        $sl_time = new DateTime("now", new DateTimeZone($sl_timezone));
        $sl_time->setTimestamp(time());

        $log_msg = sprintf(
            "PayHere Notify Received at %s\nParameters:\n%s",
            $sl_time->format('Y-m-d H:i:s'),
            json_encode($_POST, JSON_PRETTY_PRINT)
        );  
        file_put_contents(__DIR__ . '/log.txt', $log_msg);
        die($log_msg);

    }
    public function profile($id = 0)
    {
        $data = array();
        $css = array();
        $data['assets']= $url = base_url('assets/design/orignal/');
		$data['hclass']= 'header_in clearfix';
		$css[] = $url.'css/detail-page.css'; 
		$js = array();
		$js[] = 'https://code.jquery.com/jquery-2.2.4.min.js';
		$js[] = $url.'js/sticky_sidebar.min.js';
		$js[] = $url.'js/specific_detail.js';
		$js[] = $url.'js/datepicker.min.js';
		$js[] = base_url().'assets/design/js/datepicker_func_3.js';
		$data['js']= $js; 
		$data['css']= $css;
        $this->load->model('Common_model');
        $this->load->model('Product_model');
		$this->Common_model->table = 'wp_users';
		$this->Common_model->key = 'ID';
		$modal = $this->Common_model;
		$db= $modal->get(array('user_login'=>$id));
		$user = array();
		if($db)
		{
		    $db = $db[0];
		    if(isset($db['ID']))
		    {
		        //get min price
		        $this->db->where('uid',$db['ID']);
		        $this->db->where('price >',0);
		        $this->db->order_by("price", "asc");
		        $min = $this->db->get('products')->row();
		        $data['min'] = $min->price;
		        //get max price
		        $this->db->where('uid',$db['ID']);
		        $this->db->where('price >',0);
		        $this->db->order_by("price", "desc");
		        $max = $this->db->get('products')->row();
		        $data['max'] = $max->price;
		        //get booking product
		        $this->db->where('uid',$db['ID']);
		        $this->db->where('catID',1);
		        $this->db->where('publish',0);
		        $this->db->order_by("create_at", "desc");
		        $max = $this->db->get('products')->row();
		        $data['book_pro'] = $max;
		        
		        $user = $this->Product_model->getuser($db['ID']);
		    }
		}
        if(!isset($user->roles) || !in_array('service_provider',$user->roles))
        {
            die("Forbidden access");
        }
        $this->Common_model->table = 'wp_posts';
        // var_dump($user);
        
        $data['user'] = $user;
		$data['products'] = $products = $modal->get(array('post_author'=>$user->ID,'post_type'=>'product'));
        $this->load->library('template');
		$this->template->foogra('profile',$data);
    }
    public function coupon($id = 0)
    {
        if(isset($_REQUEST['pass']))
        {
            $num = $_REQUEST['pass'];
            $this->load->model('Common_model');
                    $modal = $this->Common_model;
                     $modal->table = 'clients';
                     $user =  $modal->get(array("phone"=>$num));
                     if(isset($user[0]) && isset($user[0]['id']))
                     {
                         $id = $user[0]['id'];
                     }
            
        }
        if($id)
        {     
            $data = array();
            $coupons = array();
                 if(true)
                {
                    $this->load->model('Common_model');
                    $modal = $this->Common_model;
                     $modal->table = 'coupon_item';
                     $coupons =  $modal->get(array("user"=>$id));
                     $data['coupons'] = $coupons;
                }
                if(isset($_REQUEST['pass']))
                {
                    $data= array();
// 		$data['url']= $this->url; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$page = 'User coupon';
		$breed['url'] = Base_url('/index/coupon');
		$breed['Home'] = Base_url('/admin/admin');
		// $page = 'Manage Workout Categories';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';


		$data['page']= $page;
		$data['c ss']= $css;
		$data['js']= $js;
		$data['breed']= $breed;
                    $data['data'] = $coupons;
                    $this->template->admin('user_coupon',$data);
                }
                else
                {
                $this->template->full('coupon',$data);
                
                }
        }
        else
        {
            die("invalid link");
        }

    }
    public function single($id = 0)
    {
    	if($_POST)
    	{
    		if(isset($_SESSION['user_login']))
            {
            	$user = $_SESSION['user_login'];
            	$uid = $user->UserID;
            	$rate = $_POST['rate'];
            	$ar = array(
            		'id'=> '',
            		'uid'=> $uid,
            		'bookID'=> $id,
            		'rate'=> $rate,
            	);
            	$this->db->insert('book_to_rate', $ar);
            	redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
            	redirect(base_url().'/auth/login');
            }
    		
    	}
        if($id)
        {
            $data= array();
            $data['assets']= base_url('assets/books/');
            $data['user'] = $user=$_SESSION['user_login'];  
            $book= $this->Book_model->get(array('bookID'=>$id,'status'=>0));
            if($book[0])
            {
                $book = $book[0];
            }
            else
            {
                redirect('/');
            }

            $data['book'] = $book;
            $coverImg = $this->Book_model->getMediaByID($book['coverImg']);
            $data['book']['img'] = $coverImg->public_id;
            if(isset($book['authorID']))
            {

                $authorID = $this->Book_model->getAuthorByID($book['authorID']);
                
                $data['book']['author'] = $authorID->name;
            }
            $data['book']['lang'] = $lang = $this->Book_model->getLangByBookID($book['bookID']);
            $data['book']['genres'] = $genres = $this->Book_model->getGenreByBookID($book['bookID']);
            $data['book']['tags'] = $tags = $this->Book_model->getTagsByBookID($book['bookID']);
            $data['book']['isborrow'] = $borrow=$this->Book_model->getcheckBookIsBorrow($book['bookID']);
            if($_SESSION['user_login'])
            {
            $user=$_SESSION['user_login'];    
            $data['book']['isRequested']=$this->Book_model->getcheckBookIsRequested($book['bookID'],$user->UserID);
            }else
            $data['book']['isRequested']=$this->Book_model->getcheckBookIsRequested($book['bookID']);
            $data['css'] = array('https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css');
            $data['scripts'] = array('https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js',
                base_url('assets/books/js/detail.js')
        );

           
            $this->template->front('detail',$data);
        }
        
    }
    public function borrow($book)
    {
         if(!isset($_SESSION['user_login']))
        {
            redirect(base_url().'Auth/login');
            exit();
            
        }
        $data = array();
        $data['user']= $_SESSION['user_login'];
        $data['data']= $this->Book_model->bookinfo($book);
        $data['assets']= base_url('assets/books/');
        $this->template->front('borrowBook',$data);   
    }

    public function home()
    {

        $data= array();
        $data['assets']= base_url('assets/books/');

        
        $this->load->library('pagination');
        // load URL helper
        $this->load->helper('url');
        $this->load->model('Book_model');
        $data['assets']= base_url('assets/books/');
        $limit_per_page = 12;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Book_model->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $data["books"] =  $this->Book_model->getHomeProducts($limit_per_page, $start_index);
            $config['base_url'] = base_url() . 'index/home';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                    <ul class="pagination">';
            $config['full_tag_close'] = '</ul>
                </nav>';
             
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
            $config['cur_tag_close'] = '</a></li>';
 
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $this->load->library('template');
        
        
        $this->template->front('home',$data);

        
    }
    public function aSearch()
	{
		$resp = array();
		echo (isset($_REQUEST['callback']))?$_REQUEST['callback'].'(':'';
		if($_REQUEST['term'])
		{
			
			$txt = $_REQUEST['term'];
			$list = $this->Book_model->searchAuthor($txt);
			foreach ($list as $key => $value) {
				$resp[] = array(
					"id"=>$value['authorID'],
					"value"=>$value['name'],
				);
			}
		}
		echo json_encode($resp);
		echo ');';
	}
	
	public function wishlist()
	{
		$data= array();
		$data['assets']= base_url('assets/books/');
// 		$data['footer']= 'footer-home';
		$this->load->library('template');
		$this->template->foogra('wishlist',$data);

		
	}
	public function index()
	{
		$data= array();
		$data['assets']= base_url('assets/books/');
// 		$data['footer']= 'new_footer';
		$this->load->library('template');
		$this->template->full('home',$data);

		
	}
	
	public function product($slug)
	{
		$data= array();
		$this->load->model('Common_model');
		        $modal = $this->Common_model;
		        $modal->table = 'products';
		        $modal->key = 'id';
		        $pid = 0;
		        $p = $modal->get(array('slug'=>$slug));
		        $breed = array();
		        $breed['Home'] = base_url();
		        if($p)
		        {
		            $p = $p[0];
		          //  var_dump($p);
		          //  die();
		            $pid = $p['id'];
		            $cat = $p['catID'];
		            $modal->table = 'category';
		            $carr = array(1,5,4);
		            if(true)
		            {
		                $data['sp_detail'] = 1;
		            }
		            $cat = $modal->getbyid($cat);
		            if(isset($cat->name))
		            $breed[$cat->name] = base_url();
		            $breed[$p['name']] = ' ';
		            

		        }
		        else
		        {
		            redirect(base_url());
		            exit();
		        }
		$data['breed']= $breed;
		$data['assets']= $url = base_url('assets/design/orignal/');
// 		$data['footer']= 'footer-home';
		$css = array();
		$data['hclass']= 'header_in clearfix';
		$css[] = $url.'css/detail-page.css'; 
		$js = array();
// 		$js[] = 'https://code.jquery.com/jquery-2.2.4.min.js';
		$js[] = $url.'js/sticky_sidebar.min.js';
		$js[] = $url.'js/specific_detail.js';
		$js[] = $url.'js/datepicker.min.js';
		$js[] = base_url().'assets/design/js/datepicker_func_3.js';
		$data['js']= $js; 
		$data['css']= $css; 
		$data['product_id']= $pid;
// 		$data['footer']= 'product_footer';
// 		$data['header']= 'product_header'; 
		// die($data['assets']);
		$this->load->library('template');
		$this->template->foogra('detail/index',$data); 

		
	}
	public function profile1($slug)
	{
		$data= array();
		$css = array();
		$data['hclass']= 'header_in clearfix';
		$css[] = $url.'css/detail-page.css'; 
		$js = array();
		$js[] = 'https://code.jquery.com/jquery-2.2.4.min.js';
		$js[] = $url.'js/sticky_sidebar.min.js';
		$js[] = $url.'js/specific_detail.js';
		$js[] = $url.'js/datepicker.min.js';
		$js[] = base_url().'assets/design/js/datepicker_func_3.js';
		$data['js']= $js; 
		$data['css']= $css; 
		$this->load->model('Common_model');
		        $modal = $this->Common_model;
		        $modal->table = 'products';
		        $modal->key = 'id';
		        $pid = 0;
		        $p = $modal->get(array('slug'=>$slug));
		        $breed = array();
		        $breed['Home'] = base_url();
		        if($p)
		        {
		            $p = $p[0];
		            $pid = $p['id'];
		            $cat = $p['catID'];
		            $modal->table = 'category';
		            $carr = array(1,5);
		            if(in_array($cat, $carr))
		            {
		                $data['sp_detail'] = 1;
		            }
		            $cat = $modal->getbyid($cat);
		            if(isset($cat->name))
		            $breed[$cat->name] = base_url();
		            $breed[$p['name']] = ' ';
		            

		        }
		$data['breed']= $breed;
		$data['assets']= $url = base_url('assets/design/orignal/');
// 		$data['footer']= 'footer-home';
		$css = array();
		$data['hclass']= 'header_in clearfix';
		$css[] = $url.'css/detail-page.css'; 
		$js = array();
		$js[] = 'https://code.jquery.com/jquery-2.2.4.min.js';
		$js[] = $url.'js/sticky_sidebar.min.js';
		$js[] = $url.'js/specific_detail.js';
		$js[] = $url.'js/datepicker.min.js';
		$js[] = base_url().'assets/design/js/datepicker_func_3.js';
		$data['js']= $js; 
		$data['css']= $css; 
		$data['product_id']= $pid;
// 		$data['footer']= 'product_footer';
// 		$data['header']= 'product_header'; 
		// die($data['assets']);
		$this->load->library('template');
		$this->template->foogra('profile',$data); 

		
	}
	
	public function search($cpage = 0)
	{
		$data= array();
		$this->load->model('Common_model');
		        $modal = $this->Common_model;
		        $modal->table = 'wp_posts';
		        $modal->key = 'ID';
		$data['assets']= base_url('assets/books/');
		
		$data['footer']= 'footer-search';
		// die($data['assets']);
		$this->load->library('template');
		$data['hclass']= 'header_in clearfix';
		if(isset($_REQUEST['parent_search']) && $_REQUEST['parent_search'] == 150)
		{
		    $url = base_url().'/index/page/search_ajax?'.http_build_query($_REQUEST);
		  //  die($url);
        $output = file_get_contents($url);
		    $modal->table = 'products';
		        $modal->key = 'ID';
		    $pro = json_decode($output, true);
		  //  $pro = $modal->get(array('catID'=>1));
		  //  var_dump($pro);
		  //  die("PL");
		    //apply filter here
		    $arr = array();
		    /*foreach($pro as $k=> $v)
		    {
		        $arr[] = $v['id'];
		    }*/
		    $arr = array();
		    foreach($pro as $k=> $v)
		    {
		        $arr[] = $v;
		    }
		    $pro = $arr;
		    $per_page = 3;
		    $tot = count($arr)/$per_page;
		    $cp = $cpage * $per_page;
		    $e = $cp + $per_page;
		    $arr = array();
		    foreach($pro as $k=> $v)
		    {
		        $i= $k+1;
		        if($i >= $cp && $i <= $e)
		        {
		          $arr[] = $v;  
		        }
		    }
		  //  var_dump($arr);
		  //  var_dump($cp);
		  //  var_dump($e);
		  //  die();
		    $data['products'] = $arr;
		    $data['cpage'] = $cpage;
		    $data['tpage'] = $tot;
		    $js = array();
		$js[] = 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js';
		
		
		$data['js']= $js;
		    $this->template->full('advance2',$data);
		}
		else
		{
		        $js = array();
		$js[] = 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js';
		
		$data['js']= $js;
		    $this->template->front('search',$data);
		}

		
	}
    public function addbook($id=0)
    {
         if(!isset($_SESSION['user_login']))
        {
             //die('Hrere');
            redirect(base_url().'auth/login');
            
        }
        $user = $this->session->userdata('user_login');
        $data= array();
        $this->load->model('Book_model');
        $this->load->model('Group_model');
        if($id > 0)
        {
             $data['edit']= $this->Book_model->get(array('bookID'=>$id));
            if(isset($data['edit'][0]))
                $data['edit']  = $data['edit'][0];
        }
        
        $data['generes']= $this->Book_model->getGenere(array('status'=>0));

        $data['tags']= $this->Book_model->getTag(array('status'=>0));
        $data['list']= $this->Book_model->getList(array());
        $data['group']=$this->Group_model->get_user_group($user->UserID);
        $data['scripts']= array(
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
            'https://rawgit.com/select2/select2/master/dist/js/select2.js',
            base_url('assets/admin/pages/').'book.js',
        );
        $data['css']= array(
            'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
        );
        $data['assets']= base_url('assets/books/');
        $this->template->front('addbook',$data);
    }
	public function full($page = '')
	{
		$data= array();
		$data['assets']= base_url('assets/design/orignal/'); 
		// die($data['assets']);
		$this->load->library('template');
		if($page == 'cat_fields' || $page == 'search_ajax' || $page == 'ajax')
		{
		    die("Here");
		    $this->load->model('Product_model');
                $this->load->model('Common_model');
            // $this->Common_model->table = 'music';
                $data['modal'] = $this->Common_model;
                $data['product'] = $this->Product_model; 
		    $this->load->view('startup/'.$page,$data);
		    exit();
		}
		$this->template->full($page,$data);


	}
	public function page($page = '')
	{
	    
		$data= array();
		$this->load->model('Common_model');
	    $this->load->model('Product_model');
	    $product = $this->Product_model;
	    $modal = $this->Common_model;
		$data['modal']= $modal;
		$data['product']= $product;
		$data['hclass']= 'header_in clearfix';
		$data['assets']= base_url('assets/');
		// die($data['assets']);
		$this->load->library('template');
		if($page == 'cat_fields' || $page == 'search_ajax' || $page == 'ajax')
		{
		    
		    $this->load->model('Product_model');
                $this->load->model('Common_model');
            // $this->Common_model->table = 'music';
                $data['modal'] = $this->Common_model;
                $data['product'] = $this->Product_model;
		    $this->load->view('foogra/'.$page,$data);
		  //  exit();
		}
		$this->template->front($page,$data);


	}
    
	public function mail($page = '')
	{
	    
		$data= array();
		$this->load->model('Common_model');
	    $this->load->model('Product_model');
	    $product = $this->Product_model;
	    $modal = $this->Common_model;
		$data['modal']= $modal;
		$data['product']= $product;
		$data['hclass']= 'header_in clearfix';
		$data['assets']= base_url('assets/');
		// die($data['assets']);
		$this->load->library('template');
		echo $this->template->mailt($page,$data);


	}
    public function saveContact()
    {
        // $this->form_validation->set_rules('uname', 'uname', 'required');
        // $this->form_validation->set_rules('uemail', 'uemail', 'required');
        // $this->form_validation->set_rules('usubject', 'usubject', 'required');
        // $this->form_validation->set_rules('message', 'message', 'required');
        $this->load->model('Login_model');
        // if ($this->form_validation->run() == FALSE)
        // {
        //         $this->session->set_flashdata('error', validation_errors());
        // }
        // else
        // {
            $arr = array(
                "name" => $this->input->post('uname'),
                "email" => $this->input->post('uemail'),
                "subject" => $this->input->post('usubject'),
                "message" => $this->input->post('message'),
            );
            $subject=$this->input->post('usubject');
            if($this->Login_model->saveContactUs($arr))
            {

                $em = array(
                    "name" => $this->input->post('uname'),
                    "email" => $this->input->post('uemail'),
                    "subject" => $subject,
                    "message" => $this->input->post('message'),
                );
                $msg=$this->load->view('mail/contactUSMail', $em, true);
                $email = 'info@shareyourbook.org';
              echo $this->template->mail($email,$msg, $subject); 
                $this->session->set_flashdata('success', 'Your contact mail send  successfully!');
            }
            else
            {
                $this->session->set_flashdata('error', 'server error');
            }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function addgroup()
	{
		// die("OK");
		$data= array();
		$data['assets']= base_url('assets/books/');
		// die($data['assets']);
		$this->load->library('template');
		$this->template->front('addgroup',$data);

		
	}
    public function books()
    {
        $data= array();
        // load Pagination library
        $this->load->library('pagination');
        // load URL helper
        $this->load->helper('url');
        $this->load->model('Book_model');
        $data['assets']= base_url('assets/books/');
        $limit_per_page = 12;
        if($this->input->post('submit')){
            $data['key']=$this->input->post('key');
            $array = array(
                'search_key' => $this->input->post('key'),
            );
            
            $this->session->set_userdata( $array );
            $key=$this->input->post('key');
            $data['assets']= base_url('assets/books/');
            $limit_per_page = 12;
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = count($this->Book_model->fine_search_book($key));
     
            if ($total_records > 0) 
            {
                // get current page records
                $data["books"] =  $this->Book_model->fine_search_book($key,$limit_per_page, $start_index);
                $config['base_url'] = base_url() . 'index/books/';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;
                // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
                 
                $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                        <ul class="pagination">';
                $config['full_tag_close'] = '</ul>
                    </nav>';
                 
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li class="page-item">';
                $config['first_tag_close'] = '</li>';
                 
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li class="page-item">';
                $config['last_tag_close'] = '</li>';
                 
                $config['next_link'] = 'Next';
                $config['next_tag_open'] = '<li class="page-item">';
                $config['next_tag_close'] = '</li>';
     
                $config['prev_link'] = 'Prev';
                $config['prev_tag_open'] = '<li class="page-item">';
                $config['prev_tag_close'] = '</li>';
     
                $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
                $config['cur_tag_close'] = '</a></li>';
     
                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                // build paging links
                $data["links"] = $this->pagination->create_links();
            }
            $this->load->library('template');
            $this->template->front('homesearch',$data);
            
        }else if($this->session->userdata('search_key'))
        {

            $data['key']=$this->session->userdata('search_key');
           
            $key=$this->session->userdata('search_key');
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = count($this->Book_model->fine_search_book($key));
     
            if ($total_records > 0) 
            {
                // get current page records
                $data["books"] =  $this->Book_model->fine_search_book($key,$limit_per_page, $start_index);
                $config['base_url'] = base_url() . 'index/books/';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;
                // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
                 
                $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                        <ul class="pagination">';
                $config['full_tag_close'] = '</ul>
                    </nav>';
                 
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li class="page-item">';
                $config['first_tag_close'] = '</li>';
                 
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li class="page-item">';
                $config['last_tag_close'] = '</li>';
                 
                $config['next_link'] = 'Next';
                $config['next_tag_open'] = '<li class="page-item">';
                $config['next_tag_close'] = '</li>';
     
                $config['prev_link'] = 'Prev';
                $config['prev_tag_open'] = '<li class="page-item">';
                $config['prev_tag_close'] = '</li>';
     
                $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
                $config['cur_tag_close'] = '</a></li>';
     
                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                // build paging links
                $data["links"] = $this->pagination->create_links();
            }
            $this->load->library('template');
            $this->template->front('homesearch',$data);
        }else{   
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Book_model->get_total(); 
        if ($total_records > 0) 
        {
            // get current page records
            $data["books"] =  $this->Book_model->getHomeProducts($limit_per_page, $start_index);
            $config['base_url'] = base_url() . 'index/books';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                    <ul class="pagination">';
            $config['full_tag_close'] = '</ul>
                </nav>';
             
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
            $config['cur_tag_close'] = '</a></li>';
 
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Book_model->get_total();
        $this->load->library('template');
        $this->template->front('homesearch',$data);
        }
    }
    public function availableBook()
    {
        $data= array();
        // load Pagination library
        $this->load->library('pagination');
        // load URL helper
        $this->load->helper('url');
        $this->load->model('Book_model');
        $data['assets']= base_url('assets/books/');
        $limit_per_page = 12;
        if($this->input->post('submit')){
            $data['key']=$this->input->post('key');
            $array = array(
                'search_key_' => $this->input->post('key'),
            );
            
            $this->session->set_userdata( $array );
            $key=$this->input->post('key');
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $total_records = count($this->Book_model->get_available_book_total(0,0,$key));
            if ($total_records > 0) 
            {
                // get current page records

                $data["books"] =  $this->Book_model->get_available_book_total($limit_per_page, $start_index,$key);
                $config['base_url'] = base_url() . 'index/availableBook/';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;
                // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
                 
                $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                        <ul class="pagination">';
                $config['full_tag_close'] = '</ul>
                    </nav>';
                 
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li class="page-item">';
                $config['first_tag_close'] = '</li>';
                 
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li class="page-item">';
                $config['last_tag_close'] = '</li>';
                 
                $config['next_link'] = 'Next';
                $config['next_tag_open'] = '<li class="page-item">';
                $config['next_tag_close'] = '</li>';
     
                $config['prev_link'] = 'Prev';
                $config['prev_tag_open'] = '<li class="page-item">';
                $config['prev_tag_close'] = '</li>';
     
                $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
                $config['cur_tag_close'] = '</a></li>';
     
                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                // build paging links
                $data["links"] = $this->pagination->create_links();
            }
            
        }else if($this->session->userdata('search_key_'))
        {

            $data['key']=$this->session->userdata('search_key_');
           
            $key=$this->session->userdata('search_key_');
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = count($this->Book_model->get_available_book_total(0,0,$key));
     
            if ($total_records > 0) 
            {
                // get current page records
                $data["books"] =  $this->Book_model->get_available_book_total($limit_per_page, $start_index,$key);
                $config['base_url'] = base_url() . 'index/availableBook/';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;
                // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
                 
                $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                        <ul class="pagination">';
                $config['full_tag_close'] = '</ul>
                    </nav>';
                 
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li class="page-item">';
                $config['first_tag_close'] = '</li>';
                 
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li class="page-item">';
                $config['last_tag_close'] = '</li>';
                 
                $config['next_link'] = 'Next';
                $config['next_tag_open'] = '<li class="page-item">';
                $config['next_tag_close'] = '</li>';
     
                $config['prev_link'] = 'Prev';
                $config['prev_tag_open'] = '<li class="page-item">';
                $config['prev_tag_close'] = '</li>';
     
                $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
                $config['cur_tag_close'] = '</a></li>';
     
                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                // build paging links
                $data["links"] = $this->pagination->create_links();
            }
            $this->load->library('template');
            $this->template->front('availableBook',$data);
        }else{
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = count($this->Book_model->get_available_book_total()); 
        if ($total_records > 0) 
        {
            // get current page records
            $data["books"] =  $this->Book_model->get_available_book_total($limit_per_page, $start_index);
            $config['base_url'] = base_url() . 'index/availableBook';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                    <ul class="pagination">';
            $config['full_tag_close'] = '</ul>
                </nav>';
             
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
            $config['cur_tag_close'] = '</a></li>';
 
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        
        }
        $this->load->library('template');
        $this->template->front('availableBook',$data);
    }
    public function accept_invite()
    {
        $token=$_GET['token'];
        $request=$_GET['requestno'];
        $this->load->model('Group_model');
        $check=[
            'token'=>$token,
            'id'=>$request,
        ];
        $response=$this->Group_model->getMemberToken($check);
        $user = $this->session->userdata('user_login');
        if($this->Group_model->usersbymail($response->email))
        {
            if(isset($user) && $user->email == $response->email)
            {    
                redirect(base_url().'Groups/Invition');
            }else{
                $this->session->set_flashdata('success', 'Please login please first!');
                session_destroy();
                unset($_SESSION['user_login']);
                redirect(base_url().'auth/login');
            }
        }
        else
        {
            $this->session->set_flashdata('success', 'Please Register first!');
            session_destroy();
            unset($_SESSION['user_login']);
            redirect(base_url().'auth/register');
        }
        $this->session->set_flashdata('error', 'server error');
        redirect(base_url());
    }
}
