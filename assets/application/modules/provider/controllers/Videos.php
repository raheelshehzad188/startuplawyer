<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Videos extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect('/login');
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'videos';
		$this->modal = $this->Common_model;
		$this->url = base_url('/admin/videos');
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Workout';
    private $multi= 'Workouts';
    private $add= 'addvideos';
    private $all= 'allvideos';
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
        $this->form_validation->set_rules('equipment', $this->single.' Equipment', 'required');
        $this->form_validation->set_rules('calories', $this->single.' Calories', 'required');
        $this->form_validation->set_rules('discription', $this->single.' Discription', 'required');
        if(!isset($_POST['trainerID']))
        $this->form_validation->set_rules('trainerID', $this->single.' TrainerID', 'required');
        if(!isset($_POST['artistID']))
        $this->form_validation->set_rules('artistID', $this->single.' Artist', 'required');
        $this->form_validation->set_rules('catID', $this->single.' Category', 'required');
        if(!$_FILES['image']['name'] && $id  == 0)
        {
        	$this->form_validation->set_rules('image', $this->single.' Image', 'required');
        }
        	$this->form_validation->set_rules('videoID', $this->single.' Video', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
        	$mediaID = 0;
        	if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
	        {
	        	$imgData = $this->template->upload('image');
	        	if($imgData['localPath'])
	        	{
	        		$mediaID = $this->modal->addMedia($imgData);
	        	}

	        	if($id && $mediaID > 0 && !empty($imgData['localPath']))
	        	{
  	        		$this->modal->update($id,array('mediaID'=>$mediaID));
	        	}
	        }
        	$user = $this->session->userdata('knet_login');
        	if($id)
        	{
        		$arr = array(
	        		"title" => $this->input->post('title'),
	        		"userID" => $user->UserID,
	        		"trainerID" => implode(',', $_POST['trainerID']),
	        		"artistID" => implode(',', $_POST['artistID']),
	        		"equipment" => $this->input->post('equipment'),
	        		"videoID" => $this->input->post('videoID'),
	        		"calories" => $this->input->post('calories'),
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
        		$arr = array(
	        		"title" => $this->input->post('title'),
	        		"discription" => $this->input->post('discription'),
	        		"equipment" => $this->input->post('equipment'),
	        		"calories" => $this->input->post('calories'),
	        		"videoID" => $this->input->post('videoID'),
	        		"userID" => $user->UserID,
	        		"mediaID" => $mediaID,
	        		"trainerID" => implode(',', $_POST['trainerID']),
	        		"artistID" => implode(',', $_POST['artistID']),
	        		"catID" => $this->input->post('catID')
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

		$data['assets'] = $assets= base_url('/assets').'/';
		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add '.$this->single;
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = '';
		//get trainer
		$this->Common_model->table = 'trainer';
		$data['trainers']= $this->modal->get(array('status'=> 0));
		//get artist
		$this->Common_model->table = 'artist';
		$data['artist']= $this->modal->get(array('status'=> 0));
		$this->Common_model->table = 'videos';
		//get category
		$this->Common_model->table = 'genres';
		$data['genres']= $this->modal->get(array('status'=> 0));
		$this->Common_model->table = 'videos';
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

	public function all()
	{
		$data= array();
		$data['url']= $this->url; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Manage '.$this->single;
		$breed[$page] = '';
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
		$data['data']= $this->modal->get(array('status'=> 0));
		$this->template->admin($this->all,$data);
	}



}

