<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
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
	public function verify()
    {
        $status = 0;
        if(isset($_GET['token']))
        {
            $this->load->model('Common_model');
                $modal = $this->Common_model;
                $modal->table = 'wp_users';
                $all = $modal->get(array());
                $uid = 0;
                $token = $_GET['token'];
                foreach ($all as $key => $value) {
                    // die($value['ID']);
                    if(md5($value['ID']) == $token)
                    {
                        $uid = $value['ID'];
                    }
                }
            if($uid)
            {
                update_user_meta($uid, 'varified',1);
                $status = 1;
            }
            else
            {
                $status = 2;
            }

        }else{

        }
        if($status==1){
        $this->session->set_flashdata('success', 'Your account is successfully varified.');
        redirect(base_url().'login');
        }
        $this->session->set_flashdata('error', 'Please try again...');
        redirect(base_url().'login');
        exit;    
         
    }
    public function create()
	{
	   // die("OK");
		$this->form_validation->set_rules('uname', 'User Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('upass', 'Password', 'required');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
        	$this->load->model('auth_model');

        	if($this->input->post('upass') != $this->input->post('cpass'))
        	{
        		$this->session->set_flashdata('error', "Password Not Match!");
        		header('Location: ' . $_SERVER['HTTP_REFERER']);
        		exit();
        	}

        	if($this->auth_model->get(array('user_login'=>$this->input->post('uname'))))
        	{
        		$this->session->set_flashdata('error', "User Name Not Avalible");
        		header('Location: ' . $_SERVER['HTTP_REFERER']);
        		exit();
        	}
        	if($this->auth_model->get(array('user_email'=>$this->input->post('email'))))
        	{
        		$this->session->set_flashdata('error', "Email Already Exist");
        		header('Location: ' . $_SERVER['HTTP_REFERER']);
        		exit();
        	}
            $password = md5(time());
                    $user_data = array(
                        'user_login' => $this->input->post('uname'),
                        'user_email' => $this->input->post('email'),
                        'user_pass' => md5($this->input->post('upass')),
                    );
                    $this->db->insert('wp_users', $user_data );           
                        $user_id = $this->db->insert_id();
                        $r = $this->input->post('role');
                        $this->load->model('Product_model');
        $product = $this->Product_model;
        	if($user_id)
        	{
                $token = md5($user_id);
                $product->updatemeta('user',$user_id, 'plain_pass',$this->input->post('upass'));
                                $role = array();
                        $role[$r] = 1;
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                $product->updatemeta('user',$user_id, 'varified',0);
                $em = array(
                    "name"=> $arr['first_name'].' '.$arr['last_name'],
                    "link"=> base_url('/auth/verify').'?token='.$token,
                    "token"=>$token,
                );
                $msg = $this->load->view('mail/signup', $em, true);
                $email = $this->input->post('email');
                if($this->input->post('role'))
                {
                    $role = array(
	    $this->input->post('role') => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                }
                // wp_mail($email,"Email Activation!",$msg,array());
                $this->session->set_flashdata('success', 'Account Created successfully! Please check your email to verify code');
                
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        		
        	}
        }
        redirect($_SERVER['HTTP_REFERER']);
		exit;
	}
	public function verification()
    {
        $data= array();
        $data['assets']= base_url('assets/books/');
        $data['email']=$this->session->userdata('veremail');
        // die($data['assets']);
        $this->load->library('template');
        $this->template->front('codeverification',$data);
    }
    public function register()
	{
		$data= array();
		$data['assets']= base_url('assets/design/orignal/');
		$data['hclass']= 'header_in clearfix';
		$url = base_url('assets/design/');
		$css = array();
		$css[] = $url.'css/bootstrap_customized.min.css';
		$css[] = $url.'css/booking-sign_up.css';
		$data['css'] = $css;
		$this->load->library('template');
		$this->template->foogra('register',$data);
	}
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
        	$this->load->model('auth_model');
        	$user = $this->auth_model->login($uname, $upass);
            if(!$user)
            {
                $this->session->set_flashdata('error', 'incorrect username or password !');    
        	}
            elseif($user->status == 1)
        	{
        		unset($user->upass);
            	$roleID = $user->roleID;
                if($roleID)
                {


            	$role = $this->auth_model->getrolebyid($roleID);
                }
                else{
                        $this->session->set_flashdata('error', 'system error');
                        redirect($_SERVER['HTTP_REFERER']);
                }
            	$lgn = array();
            	$lgn[$role->name.'_login'] = $user;
            	$this->auth_model->updateuserbyid($user->userID, array("ip"=>$this->input->ip_address()));
            	$_SESSION[$role->name.'_login'] = $user;
           		redirect(base_url().'books', 'refresh');
                exit();
            }
            else
            {
            	$this->session->set_flashdata('error', 'Account Blocked!');
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
	}
	public function logout()
    {
        session_destroy();
	    unset($_SESSION['user_login']);
	    redirect(base_url());
    }
    public function login()
	{
                
		if(isset($_SESSION['user_login']))
		{
		        redirect(base_url().'books');
		}
		$data= array();
		$data['assets']= base_url('assets/books/');
		// die($data['assets']);
		$this->load->library('template');
		$this->template->front('login',$data);

		
	}
    public function setPassword()
    {
        if(isset($_SESSION['user_login']))
        {
            redirect(base_url().'books');
        }
        if($_POST)
        {
            $this->load->model('auth_model');
            $mail=$this->input->post('email');
            $newpassword=$this->input->post('upassword');
            $confirmpassword=$this->input->post('conpassword');
            $userCheck=$this->auth_model->get(['email'=>$mail]);
            $userCheck=$userCheck[0];
            $code=$userCheck['code'];
            if($newpassword==$confirmpassword)
            {
               $userid=$userCheck['UserID']; 
              if($this->auth_model->updatePassword($userid,$newpassword)){
              $this->session->set_flashdata('success', 'change password successfully!');
              redirect(base_url().'Auth/login','refresh');
              }else{  
              $this->session->set_flashdata('warning', 'confirm password is wrong!');
              }  

            }else{
              $this->session->set_flashdata('warning', 'Incorrect confirm password!');  
            }    
                

        }
        redirect(base_url().'Auth/Confirm/'.$code);
    }
    public function changePassword()
    {
        if(!isset($_SESSION['user_login']))
        {
            redirect(base_url().'books');
        }
        if($_POST)
        {
            $this->load->model('auth_model');
            $password=$this->input->post('old_password');
            $newpassword=$this->input->post('new_password');
            $confirmpassword=$this->input->post('confirm_password');
            $user=$_SESSION['user_login'];
            $userChek=$this->auth_model->login($user->email, $password);
            if($userChek)
            {
                if($newpassword==$confirmpassword)
                {
                  if($this->auth_model->updatePassword($userChek->UserID,$newpassword))
                  $this->session->set_flashdata('success', 'change password successfully!');
                  else  
                  $this->session->set_flashdata('warning', 'confirm password is wrong!');  

                }else{
                  $this->session->set_flashdata('warning', 'confirm password is wrong!');  
                }    
            }
            else
            {
                 $this->session->set_flashdata('warning', 'your password is wrong!');
            }    

        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function reset()
    {
        $data= array();
        $data['assets']= base_url('assets/books/');
        
        if(isset($_SESSION['user_login']))
        {
           redirect(base_url().'books');
        }
        
        $data= array();
    	$data['assets']= base_url('assets/books/');
    	// die($data['assets']);
    	$this->load->library('template');
    	$this->template->front('fpass',$data);
    }
    public function confirmCode()
    {
        $data= array();
        $data['assets']= base_url('assets/books/');
        if(isset($_SESSION['user_login']))
        {
           redirect(base_url().'books');
        }
        $data= array();
        $data['assets']= base_url('assets/books/');
        // die($data['assets']);
        $this->load->library('template');
        $this->template->front('changePasswordCode',$data);
    }
    public function Confirm($code=null)
    {
        if(isset($_SESSION['user_login']))
        {
                redirect(base_url().'books');
        }
        $this->load->model('auth_model');
        if($_POST)
        {
            // $email = $this->session->userdata('checkMail');
            // echo  $email; die();
            $code=$this->input->post('token');
        }    
        $user = $this->auth_model->get(array('code'=>$code));
        if($user[0])
        {
            
            $user = $user[0];
            $UserID   = $user['UserID'];
            $data= array();
            $data['user']=$user;
            $data['assets']= base_url('assets/books/');
            // die($data['assets']);
            $this->load->library('template');
            $this->template->front('resetPassword',$data);
         
        }else{
             $this->session->set_flashdata('warning', 'Incorrect or expired token code!');
             header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    public function sendRestMail()
    {
        if(isset($_SESSION['user_login']))
        {
                redirect(base_url().'books');
        }
        if($_POST)
        {
            $this->load->model('auth_model');
            $email = $this->input->post('email');
            $user = $this->auth_model->get(array('email'=>$email));
               
            if($user[0])
            {
                
             $user = $user[0];
             $UserID   = $user['UserID'];
             $digits = 4;
             $data['name'] = $user['first_name'].' '.$user['last_name'];
             $data['pass'] = $npass = rand(1000000,100000);
             $msg = $this->load->view('mail/reset', $data, true);
             //$msg = $this->Minify_Html($msg);
             $up = array('code'=>$npass);
             $ret = $this->auth_model->updateuserbyid($UserID, $up);
             if($ret)
             {
                 $this->session->userdata('checkMail',$email);
                 $this->template->mail($email,$msg, "Password Change");
                 $this->session->set_flashdata('success', 'Please check your email to reset password code');
                 redirect(base_url().'Auth/confirmCode');
             }
            }else{
                 $this->session->set_flashdata('warning', 'your email does not exit!');
                 header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            
        }
    }
    function Minify_Html($Html)
	{
	   $Search = array(
	    '/(\n|^)(\x20+|\t)/',
	    '/(\n|^)\/\/(.*?)(\n|$)/',
	    '/\n/',
	    '/\<\!--.*?-->/',
	    '/(\x20+|\t)/', # Delete multispace (Without \n)
	    '/\>\s+\</', # strip whitespaces between tags
	    '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
	    '/=\s+(\"|\')/'); # strip whitespaces between = "'

	   $Replace = array(
	    "\n",
	    "\n",
	    " ",
	    "",
	    " ",
	    "><",
	    "$1>",
	    "=$1");

	$Html = preg_replace($Search,$Replace,$Html);
	return $Html;
	}
}
