<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {
	function __construct() {
        parent::__construct();


        if(!isset($_SESSION['user_login']))
		{
     		header('Location: ' . base_url());
     	}
		$this->load->library('template');
		$this->load->model('Book_model');
		$this->load->model('Group_model');
        $this->load->model('Tags_model');
    }
	public function index()
    {

        $data= array();
        $data['assets']= base_url('assets/books/');

        $data['books']= $this->Book_model->getHomeProducts(12);
        $this->template->front('home',$data);
    }
    public function save()
	{
        $this->form_validation->set_rules('langID', 'Group Language', 'required');
        $this->form_validation->set_rules('grouptypeID', 'Group Type', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Group Description', 'required');
        if(!isset($_FILES['groupImage']['name']) && $_FILES['groupImage']['name'])
        {
        	$this->form_validation->set_rules('groupImage', 'Group Image', 'required');
        }


        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {

        	$groupImage = 0;
        	if(isset($_FILES['groupImage']))
	        {
	        	$imgData = $this->template->upload('groupImage');
	        	$groupImage = $this->Group_model->addMedia($imgData);
	        	// die();
	        }
        	$user = $this->session->userdata('user_login');
        	$arr = array(
        		"name" => $this->input->post('name'),
        		"description" => $this->input->post('description'),
        		"langID" => $this->input->post('langID'),
        		"grouptypeID" => $this->input->post('grouptypeID'),
        		"groupImage" => $groupImage,
        		"userID" => $user->UserID
        	);
        	if($this->Group_model->add($arr))
        	{
                $this->session->set_flashdata('success', 'Group created successfully! please wait Until Admin Approval');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'Sorry something went wrong!');
        	}

        }
        redirect($_SERVER['HTTP_REFERER']);
	}
    public function create()
	{
		$data= array();
		$data['list']= $this->Group_model->getList(array());
		$data['types']= $this->Group_model->getGrouptype(array());
		$data['assets']= base_url('assets/books/');
		$this->template->front('addgroup',$data);
    }
    public function myGroups()
    {
        $data= array();
        $user = $this->session->userdata('user_login');
        $data['groups']= $this->Group_model->get_user_group($user->UserID);
        if(count($data['groups'])==0)
        redirect(base_url().'groups/create','refresh');   
        $data['user_id']=$user->UserID;
        $data['assets']= base_url('assets/books/');
        $this->template->front('myGroups',$data);
    }
    public function delete()
    {
        $data= array();
        $user = $this->session->userdata('user_login');
        $update=[
            'status'=>0
        ];
        $group=$this->input->post('group');
        $response=$this->Group_model->update($group,$update);
        if($response)
        $this->session->set_flashdata('success', 'Group delete successfully!');
        else
        $this->session->set_flashdata('error', 'Sorry something went wrong!');

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function leave()
    {
        $data= array();
        $user = $this->session->userdata('user_login');
        $update=[
            'status'=>1
        ];
        $group=$this->input->post('group');
        $response=$this->Group_model->groupleave($group,$user->UserID,$update);
        if($response)
        $this->session->set_flashdata('success', 'leave group successfully!');
        else
        $this->session->set_flashdata('warning', 'Sorry something went wrong!');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function invite($value='')
    {
        $user = $this->session->userdata('user_login');
        $data= array();
        $this->load->model('Group_model');
        $data['group']=$this->Group_model->get_user_group($user->UserID);
        $data['scripts']= array(
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
            'https://rawgit.com/select2/select2/master/dist/js/select2.js',
        );
        $data['css']= array(
            'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
        );
        $data['assets']= base_url('assets/books/');
        $this->template->front('groupinvite',$data);
    }
    public function sendingInvition($value='')
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('group_id', 'Group', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {

            $user = $this->session->userdata('user_login');
            $users=$this->Group_model->usersbymail($this->input->post('email'));
            $username=$user->first_name.' '.$user->last_name;
            //status=2 (onrequest), 1 (delete) , 0 (active),
            $arr = array(
                "groupID"=>$this->input->post('group_id'),
                "name" => $this->input->post('name'),
                "email" => $this->input->post('email'),
                "message" => $this->input->post('discription'),
                "userID"=>isset($users)?$users->UserID:0,
                "token" => rand(10000000,1000000),
                "email" => $this->input->post('email'),
                'status'=>2,
                "addBY" => $user->UserID
            );
            $id=$this->Group_model->saveMember($arr);
            $notiData['sender_id']=$user->UserID;
            $notiData['reciver_id']=isset($users)?$users->UserID:0;
            $notiData['mail']=$this->input->post('email');
            $notiData['message_id']=$id;
            $notiData['type']='invitegroup';
            $this->Group_model->addNotification($notiData);
            $record=$this->Group_model->getMember($id);
            $group=$this->Group_model->getGroupByID($this->input->post('group_id'));
            if($record)
            {
                $em = array(
                    "name"=> $this->input->post('name'),
                    "linkA"=> base_url('/auth/accept_invite').'?token='.$record->token.'&requestno='.$record->id,
                    "linkR"=> base_url('/auth/reject_invite').'?token='.$record->token.'&requestno='.$record->id,
                    "fromuser"=>$username,
                    "pass"=>"Invition For Join Group",
                    "group"=>$group,
                );
                $msg = $this->load->view('mail/invitefriend', $em, true);
                $email = $this->input->post('email');
                echo $this->template->mail($email,$msg, "Join Group!");
                $this->session->set_flashdata('success', 'Invition send successfully!');
            }
            else
            {
                $this->session->set_flashdata('error', 'server error');
            }

        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function Notification()
    {
        $data= array();
        $user = $this->session->userdata('user_login');
        $data['notification']= $this->Group_model->getGroupNotification($user->email,$user->UserID);
        $data['assets']= base_url('assets/books/');
        $this->template->front('groupNotifi',$data);
    }
    public function join($id)
    {
        $user = $this->session->userdata('user_login');
        $notification=$this->Group_model->getNotificationInfo($id);
        $data=[
            'userID'=>$user->UserID,
            'status'=>0,
        ];
        if($notification->type='invitegroup'){
            if($this->Group_model->groupMemberStatus($notification->message_id,$data))
            {
            $this->Group_model->groupNotificationStatus($id,['status'=>'completed']) ;   
            $this->session->set_flashdata('success', 'Group Join successfully!');
            }
        }
        else
        {
        $this->session->set_flashdata('warning', 'something went wrong !');

        }    

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function decline($id)
    {
        $user = $this->session->userdata('user_login');
        $notification=$this->Group_model->getNotificationInfo($id); 
        $data=[
            'userID'=>$user->UserID,
            'status'=>1,
         ];
        if($notification->type='invitegroup'){
            if($this->Group_model->groupMemberStatus($notification->message_id,$data))
            {
            $this->Group_model->groupNotificationStatus($id,['status'=>'completed']) ;
            $this->session->set_flashdata('success', 'decline request successfully!');
            }
        }    
        else
        {
        $this->session->set_flashdata('warning', 'something went wrong !');

        }    

        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>