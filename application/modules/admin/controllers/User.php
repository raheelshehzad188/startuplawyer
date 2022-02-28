<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect(base_url());
		}
		if(!check_permission('sub_admin'))
		{
		    redirect(base_url('index/page/not_auth'));
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_users';
		$this->Common_model->key = 'ID';
		$this->modal = $this->Common_model;
		$this->url = base_url('/admin/user');
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Sub Admin';
    private $multi= 'Sub Admins';
    private $add= 'addsaleman';
    private $all= 'allsalesman';
    private $url= '';
    private $modal= '';
    private $roleID= 'sub_admin';
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
        $this->form_validation->set_rules('fname', $this->single.' First Name', 'required');
        $this->form_validation->set_rules('lname', $this->single.' Last Name', 'required');
        $this->form_validation->set_rules('email', $this->single.' Email', 'required');
        if(!$id)
        $this->form_validation->set_rules('pass', $this->single.' Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
            $this->load->model('Product_model');
    $product = $this->Product_model;
            if($id == 0)
            {
        	 $user = $this->session->userdata('knet_login');
        	 $email_check = $this->modal->get(array('user_email'=>$this->input->post('email')));
        	 $user_id = false;
    if ($email_check) {
            $this->session->set_flashdata('error', $this->single." Email already exists.");
            redirect($_SERVER['HTTP_REFERER']);
            exit();
        }
            $user_data = array(
                    'user_login' => $this->input->post('email'),
                    'user_email' => $this->input->post('email'),
                    'user_pass' => md5($this->input->post('pass'))
                );
                $user_id = $this->modal->add($user_data);
                $role = array(
	    $this->roleID => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
            }
            else
            {
              
              
                $user_id= $id;
                if($this->input->post('pass'))
                {
                    $up = array(
                        'user_pass' => md5($this->input->post('pass'))
                        );
                    $this->modal->update( $user_id,$up );
                }
                        $role = array(
	    $this->roleID => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
            }
        if ($user_id) {
            $role = array(
	    $this->roleID => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$id,'wp_capabilities',$role);
            if(isset($_REQUEST['fname']) && !empty($_REQUEST['fname']))
	{
		$ret = $product->updatemeta('user',$user_id,'first_name',$_REQUEST['fname']);
	}
            if(isset($_REQUEST['lname']) && !empty($_REQUEST['lname']))
	{
		$ret = $product->updatemeta('user',$user_id,'last_name',$_REQUEST['lname']);
	}
            if(isset($_REQUEST['permission']) && !empty($_REQUEST['permission']))
	{
		$ret = $product->updatemeta('user',$user_id,'permission',$_REQUEST['permission']);
	
            //set role logic
            if($id)
            {
                $this->session->set_flashdata('success', $this->single." update Successfully!");
            }
            else
            {
$this->session->set_flashdata('success', $this->single." Add Successfully!");
}
        }
        }
        redirect($_SERVER['HTTP_REFERER']);
	}
	}//function save end 

	public function delete($id = 0)
	{
		if($id)
		{
			if($this->db->where('ID',$id)->delete('wp_users'))
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
		$page = 'Add  '.$this->single;
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = ' ';
		 $data['album'] = 1;

		$data['page']= $page;
		$data['breed']= $breed;
		if($id)
		{
		    $this->load->model('Product_model');
    $product = $this->Product_model;
			$data['edit']= $product->getuser($id);
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
		$page = 'Manage '.$this->single;
		$breed[$page] = '';
		$data['cash'] = 1;
		$data['album'] = 1;
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
		$modal = $this->modal;
			$providers = array();
	$modal->table = 'wp_users';
	$modal->key = 'ID';
	$dusers = $modal->get(array());
	$this->load->model('Product_model');
    $product = $this->Product_model;
	foreach($dusers as $k=> $v)
	{
	    $sing = $product->getuser($v['ID']);
	    if(isset($sing->roles) && in_array('sub_admin',$sing->roles))
	    {
	        $providers[] = $sing;
	    }
	}
		
		$data['data']= $providers;
		$this->template->admin($this->all,$data);
	}



}

