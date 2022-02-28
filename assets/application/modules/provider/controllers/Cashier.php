<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Cashier extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect('/login');
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'users';
		$this->Common_model->key = 'UserID';
		$this->modal = $this->Common_model;
		$this->url = base_url('/admin/cashier');
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Cashier';
    private $multi= 'Cashiers';
    private $add= 'addsaleman';
    private $all= 'allsalesman';
    private $url= '';
    private $modal= '';
    private $roleID= 2;
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

        	 $user = $this->session->userdata('knet_login');
        	if($id)
        	{
        		if($this->modal->get(array('email'=> $this->input->post('email'),'UserID !', $id)))
        	{
        		$this->session->set_flashdata('error', "Email already exist");
        		redirect($_SERVER['HTTP_REFERER']);
        	}
        		if($this->input->post('pass'))
        		{
	        		$arr = array(
		        		"first_name" => $this->input->post('fname'),
		        		"last_name" => $this->input->post('lname'),
		        		"email" => $this->input->post('email'),
		        		"upass" => md5($this->input->post('pass '))
		        		// "userID" => $user->UserID,
		        	);
	        	}
        		else
        		{
	        		$arr = array(
		        		"first_name" => $this->input->post('fname'),
		        		"last_name" => $this->input->post('lname'),
		        		"email" => $this->input->post('email'),
		        		// "upass" => md5($this->input->post('pass')),
		        		// "roleID" => 3,
		        		// "userID" => $user->UserID,
		        	);
        		}

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
        	if($this->modal->get(array('email'=> $this->input->post('email'))))
        	{
        		$this->session->set_flashdata('error', "Email already exist");
        		redirect($_SERVER['HTTP_REFERER']);
        	}
        		$arr = array(
	        		"first_name" => $this->input->post('fname'),
	        		"last_name" => $this->input->post('lname'),
	        		"email" => $this->input->post('email'),
	        		"upass" => md5($this->input->post('pass')),
	        		"created_by" => $user->UserID,
	        		"roleID" => $this->roleID,
	        	);
	        	if($this->modal->add($arr))
	        	{
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
		 $data['album'] = 1;

		$data['page']= $this->single;
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
		$user = $this->session->userdata('knet_login');
		$data['data']= $this->modal->get(array('roleID'=> $this->roleID,"created_by"=>$user->UserID,'status'=>0));
		$this->template->admin($this->all,$data);
	}



}

