<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
	public function post()
	{
		
				$this->form_validation->set_rules('uname', 'Username', 'required');
                
                $this->form_validation->set_rules('upass', 'Password', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                		$this->session->set_flashdata('error', 'All fields required');

                }
                else
                { 
                	$uname = $this->input->post('uname');
                	$upass = $this->input->post('upass');
                	if(true){
    $userOK = 0;
    $user = wp_authenticate($uname , $upass );
    if(is_wp_error($user)) {
        $this->session->set_flashdata('error', $user->get_error_message());
    } else {
        wp_set_current_user($user->ID);
        $_SESSION['knet_login'] = $user; 
        if(true){
            
            if(is_user_logged_in()) {
                $userOK = 1;
            } else {
                $userOK = 0;
                
            }
        }
    }
}
                	if($userOK)
                	{
                	    redirect(('panel/admin/admin'));
                	    exit();
	                }
	                else
	                {
	                	$this->session->set_flashdata('error', 'Enter Correct Username or Password!');
	                }
                	
                	
                    
                }
                redirect($_SERVER['HTTP_REFERER']);

	}
	public function index()
	{
		if(isset($_SESSION['knet_login']))
		{
			redirect(('panel/admin/admin'));
		}
		$data= array();
		$data['assets']= base_url('assets/admin/');
		$this->load->library('template');
		$this->template->full('register',$data);

		
	}
}
