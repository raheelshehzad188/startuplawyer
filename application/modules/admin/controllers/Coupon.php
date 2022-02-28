<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Coupon extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect('/login');
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'coupon';
		$this->modal = $this->Common_model;
		$this->url = base_url('/admin/coupon');
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Coupon';
    private $multi= 'Coupons';
    private $add= 'addcoupon';
    private $all= 'allcoupon';
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
        $this->form_validation->set_rules('label', $this->single.' Label', 'required');
        $this->form_validation->set_rules('catID', $this->single.' Category', 'required');
        $this->form_validation->set_rules('qty', $this->single.' Quantity', 'required');
        $this->form_validation->set_rules('rID', $this->single.' Reseller', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
        	
        	$user = $this->session->userdata('knet_login');
        	if($id)
        	{
        		$arr = array(
	        		"name" => $this->input->post('name'),
	        		"rID" => $this->input->post('rID'),
	        		"userID" => $user->UserID,
	        	);
        		if($this->modal->update($id,$arr))
	        	{
	                $this->session->set_flashdata('success', $this->single.' update successfully!');
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('error', 'server error');
	        	}
        	}
        	else
        	{
        		$code = time();
        		$catID = $this->input->post('catID');
        		$arr = array(
	        		"label" => $this->input->post('label'),
	        		"catID" => $this->input->post('catID'),
	        		"qty" => $this->input->post('qty'),
	        		"rID" => $this->input->post('rID'),
	        		"code" => $code,
	        		"userID" => $user->UserID,
	        	);
	        	if($cid = $this->modal->add($arr))
	        	{
	        		$this->modal->table = 'genres';
	        		$gen = $this->modal->getbyid($catID);
	        		$value = $gen->value;
	        		$entry = array();
	        		for ($i=1; $i <=$this->input->post('qty') ; $i++) { 
	        			$entry[$i]['cID'] = $cid;
	        			$entry[$i]['code'] = $code.$i;
	        			$entry[$i]['value'] = $value;
	        			$entry[$i]['userID'] = $user->UserID;
	        		}
	        		
	        		// die()
	        		$ret = $this->db->insert_batch('coupon_item', $entry);
;
	                $this->session->set_flashdata('success', $this->single.' add successfully!');
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
			if($this->modal->update($id, array('status'=> 1)))
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

	public function all($id = 0)
	{
		$data= array();
		$data['url']= $this->url; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$page = 'Manage'.$this->multi;
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
		$user = $this->session->userdata('knet_login');
		$UserID = $user->UserID;
		$data['is_send'] = 1;
    
		if(!$id)
		{
			if($user->roleID == 3)
			{
				$data['data']= $this->modal->get(array('status'=> 0,'userID'=>$UserID));
			}
			elseif($user->roleID == 4)
			{
				
				$data['data']= $this->modal->get(array('status'=> 0,'rID'=>$UserID));
			}

			
			$this->template->admin($this->all,$data);
		}
		else
		{
			if($user->roleID == 4)
			{
				$data['is_send'] = 1;
			}
			$this->modal->table = 'coupon_item';
			$data['data']= $this->modal->get(array('cID'=> $id));
			$this->template->admin('allcoupon_items',$data);
		}
	}



}

