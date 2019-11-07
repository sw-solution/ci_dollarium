<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lockscreen extends CI_Controller {

	/**
	 * Login Page for this controller.
	 *	 
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url_helper');
		//load session library
		$this->load->library('session');
	}

	public function index()
	{
		if( ! file_exists(APPPATH.'views/lockscreen/lockscreen.php'))
        {
			// Whoops, we don't have a page for that!
			show_404();
		}
		// unset session
		// $this->session->unset_userdata('user');
		$userdata = $this->session->userdata('user');
		$data['full_name'] = $userdata['full_name'];
		$data['email'] = $userdata['email'];
        $this->load->view('lockscreen/lockscreen', $data);
	}
	public function verify(){
		$flag = $this->login_model->verify();
		if($flag){
			redirect('main');
		}else{
			redirect('lockscreen');
		}
	}
}