<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Login Page for this controller.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url');

        $this->load->helper('url_helper');
        //load session library
        $this->load->library('session');
    }

    //log out
    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('phone_number');
        $this->session->unset_userdata('login_phone');
 		$this->session->sess_destroy();

        // Remove user data from session

        redirect("login");
    }

    public function sessionTest(){
        $this->session->set_userdata('user',$this->login_model->getSessionUser());
        // var_dump($this->session->userdata('user'));exit();
    }

    public function index($fb=false)
    {
        if( ! file_exists(APPPATH.'views/login/login.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        //restrict users to go back to login if session has been set
        $this->session->set_userdata('user',$this->login_model->getSessionUser());
        $this->session->set_userdata('login_phone','195-461-1816');
        @$session=$this->session->userdata('user');
        @$login_phone=$this->session->userdata('login_phone');
        if(@$session['user_name']&&$login_phone){
            redirect('main');
        }
        else{
            $manager = $this->login_model->getManager();
            $data["manager"] = $manager;
            $data['fb']=$fb;
            $this->load->view('login/login', $data);
        }

    }
    // user verify
    public function verify(){
        $verify = $this->login_model->verify();
        if($verify){
            //set session
            $this->session->set_userdata('user', $verify);
            redirect('main');// call Main controller
        }else{
            $this->session->set_flashdata('error','Invalid login. User not found');
            $data['logout_message']="Invalid Username or Password";
            $this->load->view('login/login', $data);
        }
    }
    public function loginFb(){
        $this->load->view('login/login_fb');
    }
    public function loginPhone()
    {
        $this->load->view('login/login_phone');
    }

    //Forget Password : Send Verification Code Email
    public function sendVerificationCode(){
        if($this->login_model->checkEmail()>0)
        {
            $from_email = $this->login_model->getAdminEmail();
            $to_email = $this->input->post('email');
            $code=$this->login_model->generateCode();
            if($code>0)
            {
                //Load email library
                $this->load->library('email');

                $config = array();
//                $config['protocol'] = 'smtp';
//                $config['smtp_host'] = 'ssl://smtp.googlemail.com';
//                $config['smtp_user'] = 'xxx';
//                $config['smtp_pass'] = 'xxx';
//                $config['smtp_port'] = 465;
//                $this->email->initialize($config);
//                $this->email->set_newline("\r\n");
//
//                $this->email->from($from_email, 'Identification');
//                $this->email->to($to_email);
//                $this->email->subject('Reset Password Verification Code');
//                $this->email->message($code);
//                //Send mail
//                if($this->email->send())
//                    echo 3;//Success
//                else
//                    echo 2;//Fail
                echo 1;
            }
            else{
                echo 1;//Code Fail
            }
        }
        else{
            echo 0;//Unregistered User
        }
    }

    //Reset Password
    public function resetPassword(){
        echo $this->login_model->resetPassword();
    }

    // user data register (sign up)
    public function register(){
        $userId = $this->login_model->register();
        if($userId){
            $data['message_display'] = "Registration Successfully !";
            $this->load->view('login/login', $data);
        }else{
            $data['register_error'] = "Username already exist!";
            $this->load->view('login/login', $data);
        }
    }
    public function user_id()
    {
        $facebook_user_id=$this->uri->segment(3);

        $this->session->set_userdata('facebook_user_id',$facebook_user_id);
        redirect('Login');
        // echo $this->session->userdata('facebook_user_id');
        // exit();
    }
}

