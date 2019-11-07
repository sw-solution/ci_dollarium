<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUsers extends CI_Controller {

	/**
	 * Login Page for this controller.
	 *	 
	 */
	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('inout_model');
		$this->load->model('login_model');
		$this->load->model('ManageUsers_model');
		$this->load->helper('url_helper');
		//load session library
		$this->load->library('session');
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

		$userdata = $this->session->userdata('user');
        $data['user_role']=$this->ManageUsers_model->getUserRole($userdata['id']);
        $data['phone']=$userdata['phone'];
        $data['flag'] = 5;

        $profile = $this->ManageUsers_model->getProfile($userdata['id']);
        $data['profile'] = $profile;
        $this->load->view('header',$data);
		$this->sidebar();
		$this->manageUsers();
		$this->load->view('modals',$data);
		//send user footer
        $this->load->view('footer',$data);
	}

	// load sidebar 
	public function sidebar()
	{	
        $userdata = $this->session->userdata('user');
        $profile = $this->ManageUsers_model->getProfile($userdata['id']);
        $data['profile'] = $profile;
		$data['user_role']=$this->inout_model->getUserRole($userdata['id']);
		$data['flag'] = 5;
		$this->load->view('sidebar', $data);
	}
	//load setting
	public function manageUsers()
	{
		$userdata = $this->session->userdata('user');
		$data['users'] = $this->ManageUsers_model->getUsers();
		$data['balance'] = $this->ManageUsers_model->getBalance();

		if($this->ManageUsers_model->getUserRole($userdata['id']))
		{
			$this->load->view('manage_users', $data);
		}
	}
	
	//Activate User
//	public function activate()
//	{
//		$userdata = $this->session->userdata('user');
//		if($this->ManageUsers_model->getUserRole($userdata['id']))
//		{
//			echo $this->ManageUsers_model->activate();
//		}
//	}
	//Delete User
    public function delete()
    {
        $userdata = $this->session->userdata('user');
        if($this->ManageUsers_model->getUserRole($userdata['id']))
        {
            echo $this->ManageUsers_model->delete();
        }
    }
}