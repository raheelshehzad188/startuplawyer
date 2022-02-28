<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Products extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect('panel/login');
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_posts';
		$this->Common_model->key = 'ID';
		$this->modal = $this->Common_model;
		$this->url = base_url().'/admin/products';
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'subscription';
    private $multi= 'subscriptions';
    private $add= 'addsubscription';
    private $all= 'allsubscription';
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
  'post_content'  => $_POST['discription'],
  'post_status'   => 'draft',
  'post_type'=>'product',
  'post_author'   => $user->ID,
        	    );
        	    if($id)
        	    {
        	        $in['ID'] = $id;
        	        unset($in['post_status']);
        	        wp_update_post($in);
        	     $pid = $id;   
        	    }
        	    else
        	    {
        	    $pid = wp_insert_post($in);
        	    }
        	if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
	        {
	            
	        	$imgData = $this->template->upload('image');
	        	if($imgData['localPath'])
	        	{
	        		$image_url =get_site_url().'/panel/'.$imgData['localPath'];

$upload_dir = wp_upload_dir();

$image_data = file_get_contents( $image_url );

$filename = basename( $image_url );

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
$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
wp_update_attachment_metadata( $attach_id, $attach_data );
set_post_thumbnail($pid,$attach_id);
	        	}
	        }
	        else
	        {
	            if(!$id)
	            set_post_thumbnail($pid,5);
	        }
	        
	        if(!$id)
	        {
	        if($pid)
	        	{
	        	    if(isset($_POST['price']))
	        	    {
	        	    $ret = update_post_meta($pid, '_regular_price',$_POST['price']);
	        	    }
	        	    if(isset($_POST['deadline']))
	        	    update_post_meta($pid, 'dead_line',$_POST['deadline']);
	        	    if(isset($_POST['catID']))
	        	    {
	        	    $product = wc_get_product($pid);
	        	    $product->set_category_ids([ $_POST['catID'] ] );
                    $product->save();
	        	    }

	        	    //
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
	        	    if(isset($_POST['price']))
	        	    {
	        	    $ret = update_post_meta($pid, '_regular_price',$_POST['price']);
	        	    }
	        	    if(isset($_POST['deadline']))
	        	    update_post_meta($pid, 'dead_line',$_POST['deadline']);
	        	    if(isset($_POST['catID']))
	        	    {
	        	    $product = wc_get_product($pid);
	        	    $product->set_category_ids([ $_POST['catID'] ] );
                    $product->save();
	        	    }

	        	    //
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
			if($this->modal->update($id, array('post_status'=> 'trash')))
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
		$user = $_SESSION['knet_login'];
		$scats = get_user_meta($user->ID,'scats',true);
		$data['cats'] = $scats = explode(',',$scats);
		
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
		$data['url']= $this->url; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Manage Workout Categories';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['breed']= $breed;
		$user = $_SESSION['knet_login'];
		$products = $this->modal->get(array('post_author'=>$user->ID,'post_type'=>'product'));
		$data['data']= $products;
		$this->template->admin($this->all,$data);
	}



}

