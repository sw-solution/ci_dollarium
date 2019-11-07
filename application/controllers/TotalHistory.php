<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TotalHistory extends CI_Controller {

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
	}
	//$flag=true -
	public function index($flag=4)
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

		$this->checkExpired();

		$userdata = $this->session->userdata('user');
        $profile = $this->login_model->getProfile($userdata['id']);
        $data['profile'] = $profile;
        $data['user_role']=$this->inout_model->getUserRole($userdata['id']);
        $data['phone']=$userdata['phone'];
        $data['flag'] = $flag;

        $this->load->view('header',$data);
		$this->sidebar($flag);
		$this->table();
        $this->load->view('modals',$data);
        $users = $this->inout_model->getUsers($userdata['id']);
        $data['users']=$users;
        $this->load->view('footer',$data);
	}

	// load sidebar 
	public function sidebar($flag)
	{
		$userdata = $this->session->userdata('user');
		$profile = $this->login_model->getProfile($userdata['id']);
		$data['profile'] = $profile;
		$data['user_role']=$this->inout_model->getUserRole($userdata['id']);
		$data['flag'] = $flag;
		$this->load->view('sidebar', $data);
	}

	//Total Transaction History
	public function table(){
		$userdata = $this->session->userdata('user');
		$users = $this->inout_model->getUsers($userdata['id']);
		//balance
        $transactions = $this->inout_model->getAllBalanceHistory();
							  
		$data['users'] = $users;
		$data['transactions']=$transactions;
		$this->load->view('total_history',$data);
	}

	//Check Expired
    public function checkExpired(){
	    echo $this->inout_model->checkExpired();
    }
}