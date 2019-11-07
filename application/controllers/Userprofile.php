<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofile extends CI_Controller {

	/**
	 * Login Page for this controller.
	 *	 
	 */
	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('inout_model');
		$this->load->model('login_model');
		$this->load->helper('url_helper');
		//load session library
		$this->load->library('session');
		$this->load->helper('url', 'form');
	}

	public function index()
	{

        //restrict users to go back to login if session has been set
        $session=$this->session->userdata('user');
        $login_phone=$this->session->userdata('login_phone');
        if(!$session['user_name']&&!$login_phone){
            redirect('login');
        }

        if(!$session['user_name']){
            redirect('login/loginFb');
        }

        if(!$login_phone){
            redirect('login/loginPhone');
        }

//        if(!$this->login_model->checkUser())
//        {
//            echo "<script>alert('Invalid User)</script>";
//            redirect('login');
//        }

		// $this->load->view('userprofile/userprofile');
		$userdata = $this->session->userdata('user');
        $profile = $this->login_model->getProfile($userdata['id']);
        $data['profile'] = $profile;
        $data['user_role']=$this->inout_model->getUserRole($userdata['id']);
        $data['phone']=$userdata['phone'];
        $data['flag'] = 3;

        $this->load->view('header',$data);
		$this->sidebar();
		$this->userProfile();
        $this->load->view('modals',$data);
		//send user footer
        $users = $this->inout_model->getUsers($userdata['id']);
        $data['users']=$users;
        $this->load->view('footer',$data);
	}

	// load sidebar 
	public function sidebar()
	{	
		$userdata = $this->session->userdata('user');
		$profile = $this->login_model->getProfile($userdata['id']);
		$data['profile'] = $profile;
		$data['user_role']=$this->inout_model->getUserRole($userdata['id']);
		$data['flag'] = 3; 
		$this->load->view('sidebar', $data);
	}
	//load userProfile
	public function userProfile()
	{
		$userdata = $this->session->userdata('user');
		//receive count
		$profile = $this->login_model->getProfile($userdata['id']);
		$data['profile'] = $profile;
		$this->load->view('userprofile/userprofile', $data);
	}

	//save Profile
	public function save()
	{
		$path='';
        $session=$this->session->userdata('user');

		if($_FILES['file']['name'] != ''){
			$path = './public/assets/admin/pages/media/users';
//			$date = date("Y-m-d_H-i-s");
//			$filename = $date.'_'.basename( $_FILES['file']['name']);
			$filename = $session['phone'].'.jpg';
			$path = $path .'/'. $filename;
			move_uploaded_file($_FILES['file']['tmp_name'], $path);
			$path = 'public/assets/admin/pages/media/users';
			$path = $path .'/'. $filename;
		}
		//database image save url
		$profile = $this->login_model->saveProfile($path);
	}
	//change password
	public function savePwd()
	{
		$profile = $this->login_model->changePwd();
		// $data['pwd'] = $profile;
		if($profile){
			redirect("userprofile");
		}		
	}
}