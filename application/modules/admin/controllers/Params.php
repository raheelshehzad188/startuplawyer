<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Params extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect(base_url());
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_posts';
		$this->Common_model->key = 'ID';
		$this->modal = $this->Common_model;
		$this->url = base_url().'/admin/params';
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Email Param';
    private $multi= 'Email Params';
    private $add= 'addparam';
    private $post_type= 'email_param';
    private $all= 'allparam';
    private $url= '';
    private $modal= '';
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

	
	public function add_webinar()
	{
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

    }

}
	    $data= array();
		$data['url']= $this->url; 

		$data['assets'] = $assets= base_url('/assets').'/';
// 		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add  Booking Slot';
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = '';
		//get trainer
		//get artist
// 		print_r($data['locations']);
		$css = array();
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$js = array();
		$js[] = $assets.'/app-assets/vendors/js/forms/select/select2.full.min.js';
		$js[] = $assets.'/app-assets/js/scripts/forms/select/form-select2.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $this->single;
		$data['breed']= $breed;
		if($id)
		{
			$data['edit']= $this->modal->getbyid($id);
		}
		$this->template->admin('add_webinar',$data);
	}
	function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w'); 
    // loop over the input array
    foreach ($array as $line) { 
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter); 
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}
	public function products_import()
	{
	    $data = array();
	    $file='';
	    if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name']))
        {
            
        	$imgData = $this->template->upload('file');
        	if($imgData['localPath'])
        	{
        	    $file='accepted';
        	    $data['txt'] = "Import successfully!";
        	}
        }
        else
        {
            $data['txt'] = "There is something wrong";
            $file="rejected";
        }
        $html = $this->load->view('modal/'.$file,$data,true);
	    $arr['html'] = $html;
	    echo json_encode($arr);
	}
	public function export()
	{
	    $products = $this->modal->get(array('post_type'=>'product'));
	    $h = array(
	        'SKU',
	        'Name',
	        'Type',
	        'Price',
	        'Category',
	        'Short Discription',
	        'Long Discription',
	        'Dead Line',
	        'Image',
	        );
	        $csv = array();
	        $csv[] = $h;
	        foreach($products as $k => $v)
	        {
	            $product = wc_get_product( $v['ID'] );
	            $terms = get_the_terms( $v['ID'], 'product_cat' );
	            $cat = '';
	            if(isset($terms[0]))
	            {
	                $cat = $terms[0]->name;
	            }
	            $nurl = get_the_post_thumbnail_url($v['ID']);
	            
	            $csv[] = $sing = array(
	                get_post_meta($v['ID'],'_sku',true),
	                $v['post_title'],
	                $product->get_type(),
	                get_post_meta($v['ID'], '_regular_price',true),
	                $cat,
	                $v['post_excerpt'],
	                $v['post_title'],
	                get_post_meta($v['ID'], 'dead_line',true),
	                $nurl
	                );
	        }
	        $file = 'products_'.time().'.csv';
	        $this->array_to_csv_download($csv,$file);
	    redirect($_SERVER['HTTP_REFERER']);
	}
	public function add_booking()
	{
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

    }

}
	    $data= array();
		$data['url']= $this->url; 

		$data['assets'] = $assets= base_url('/assets').'/';
// 		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add  Booking Slot';
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = '';
		//get trainer
		//get artist
// 		print_r($data['locations']);
		$css = array();
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$js = array();
		$js[] = $assets.'/app-assets/vendors/js/forms/select/select2.full.min.js';
		$js[] = $assets.'/app-assets/js/scripts/forms/select/form-select2.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $this->single;
		$data['breed']= $breed;
		if($id)
		{
			$data['edit']= $this->modal->getbyid($id);
		}
		$this->template->admin('add_booking',$data);
	}
	public function save($id = 0)
	{
        $this->form_validation->set_rules('title', $this->single.' Title', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
            $user = $_SESSION['knet_login'];
            

        	
        	$in = array(
        	    'post_title'    => wp_strip_all_tags( $_POST['title'] ),
                  'post_content'  => 'Param discription',
                  'post_status'   => 'draft',
                  'post_type'=>$this->post_type,
                  'post_author'   => $user->ID,
  //
        	    );
        	    if($id)
        	    {
        	        $in['ID'] = $id;
        	        $this->modal->update($id,$in);
        	     $pid = $id;   
        	    }
        	    else
        	    {
        	    $pid = wp_insert_post($in);
        	    }
        	    if($pid)
        	    {
        	        
        	        if(isset($_POST['title']))
	        	    update_post_meta($pid, 'param_index',$_POST['title']);
        	        if(isset($_POST['param_key']))
	        	    update_post_meta($pid, 'param_key',$_POST['param_key']);
	        	    if(isset($_POST['param_value']))
	        	    update_post_meta($pid, 'param_value',$_POST['param_value']);
        	    }
	        
	        if(!$id)
	        {
	        if($pid)
	        	{
	        	    
	        	    $this->session->set_flashdata('success', $this->single.' add successfully!');
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('error', 'server error');
	        	}
	        }
	        else
	        {
	            if($pid)
	        	{
	                $this->session->set_flashdata('success', $this->single.' update successfully!');
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('error', 'server error');
	        	}
	        }
        	
        }
        redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($id = 0)
	{
		if($id)
		{
			if(wp_delete_post($id))
        	{
                $this->session->set_flashdata('success', $this->single.' delete successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function create($id= 0)
	{
		$data= array();
		$data['url']= $this->url; 

		$data['assets'] = $assets= base_url('/assets').'/';
// 		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add '.$this->single;
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = '';
		//get trainer
		$data['tags']= $this->modal->get(array('post_type'=> 'tag'));
		$data['locations']= $this->modal->get(array('post_type'=> 'locations'));
		//get artist
// 		print_r($data['locations']);
		$css = array();
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$js = array();
		$js[] = $assets.'/app-assets/vendors/js/forms/select/select2.full.min.js';
		$js[] = $assets.'/app-assets/js/scripts/forms/select/form-select2.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $this->single;
		$data['breed']= $breed;
		if($id)
		{
			$data['edit']= $this->modal->getbyid($id);
		}
		$this->template->admin($this->add,$data);
	}

	public function create1($id= 0)
	{
		$data= array();
		$data['url']= $this->url; 
		$user = $_SESSION['knet_login'];
		$scats = get_user_meta($user->ID,'scats',true);
		$data['cats'] = $scats = array_unique(explode(',',$scats));
		
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add '.$this->single; 
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = '';

		$data['page']= $page;
		$data['breed']= $breed;
		if($id)
		{
			$data['edit']= $this->modal->getbyid($id);
		}
		$this->template->admin($this->add,$data);
	}
	public function all()
	{
		$data= array();
		$data['sing'] = $this->single;
		$data['url']= $this->url; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Manage '.$this->multi;
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $page;
		$data['footer']= 'cfooter';
		$data['breed']= $breed;
		$user = $_SESSION['knet_login'];
		$products = $this->modal->get(array('post_type'=>$this->post_type));

		$data['data']= $products;
		$this->template->admin($this->all,$data);
	}
	public function bubble_sort($arr, $attr) {
    $size = count($arr)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            if ($arr[$k][$attr] > $arr[$j][$attr]) {
                // Swap elements at indices: $j, $k
                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
            }
        }
    }
    return $arr;
}



}

