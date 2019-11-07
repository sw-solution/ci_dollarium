<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    /**
     * Login Page for this controller.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inout_model');
        $this->load->model('login_model');
        $this->load->model('setting_model');

        $this->load->helper('url_helper');
        //load session library
        $this->load->library('session');
    }
    //$flag=true -
    public function index($flag=1)
    {
        // if( ! file_exists(APPPATH.'views/main/main.php'))
        // {
        // 	// Whoops, we don't have a page for that!
        // 	show_404();
        // }

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
//            redirect('login/logout');
//        }

        $this->checkExpired();
        $this->inout_model->checkIncoming();

        $userdata = $this->session->userdata('user');
        $profile = $this->login_model->getProfile($userdata['id']);
        $data['profile'] = $profile;
        $data['user_role']=$this->inout_model->getUserRole($userdata['id']);
        $data['phone']=$userdata['phone'];
        $data['flag'] = 1;

        $this->load->view('header',$data);
        $this->sidebar($flag);
        $this->balance();
        $this->table();
        $this->load->view('modals',$data);
        $userdata = $this->session->userdata('user');
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

    // current balance
    public function balance()
    {
        $userdata = $this->session->userdata('user');
        // get current balance
        $balance = $this->inout_model->getBalance($userdata['id']);
        $data['balance'] = $balance;

        $data['history']=$this->inout_model->getBalanceHistory();

        $users = $this->inout_model->getUsers($userdata['id']);
        $data['users']=$users;
        $data['user_id']=$userdata['id'];

        $this->load->view('main/balance', $data);
    }

    // chart
    public function chart(){
        $this->load->view('main/chart');
    }

    //table
    public function table(){
        $userdata = $this->session->userdata('user');
        $users = $this->inout_model->getUsers($userdata['id']);
        //balance
        $invoices = $this->inout_model->getBalanceHistory();

        $data['users'] = $users;
        $data['invoices']=$invoices;
        $this->load->view('main/table',$data);
    }

    //chat
    public function chat(){
        $this->load->view('main/chat');
    }

    //Send Money
    public function send(){
        $transactionInfo = $this->inout_model->sendAmount();
        $setting = $this->setting_model->getSetting();

        if($transactionInfo!=0)
        {
            $senderInfo = $this->session->userdata('user');

            if(!($this->inout_model->getUserIdbyPhone($transactionInfo[0]->receiver_phone))) {
                if(!empty($transactionInfo[0]->receiver_phone)) {
                    $body = "Hi there,\r\nYour friend ".$senderInfo['full_name']." has sent you ".$transactionInfo[0]->amount." Dollarium. To accept, click here: ".base_url();
                    $body.="\r\n The user has to share ".$setting['minimum_share']."% of amount received within ".$setting['limit_time']." hour or ".$setting['penalty']."% of amount received will go back to sender";

                    $msgObj = array(
                        "From" => $this->config->item('TWILIO_FROM_NUMBER'),
                        "Body" => $body,
                        "To" => $transactionInfo[0]->receiver_phone
                    );
                    $this->sendSMS($msgObj);
                }
            }
            else {
                $userInfo = $this->inout_model->getUserInfo($transactionInfo[0]->receiver_phone);

                if(!empty($transactionInfo[0]->receiver_phone)) {
                    $body = "Hi there,\r\nYour friend ".$senderInfo['full_name']." has sent you ".$transactionInfo[0]->amount." Dollarium. To accept, click here: ".base_url();///login/user_id/".$transactionInfo[0]->receiver_phone;
                    $body.="\r\n The user has to share ".$setting['minimum_share']."% of amount received within ".$setting['limit_time']." hour or ".$setting['penalty']."% of amount received will go back to sender";

                    $msgObj = array(
                        "From" => $this->config->item('TWILIO_FROM_NUMBER'),
                        "Body" => $body,
                        "To" => $transactionInfo[0]->receiver_phone
                    );
                    $this->sendSMS($msgObj);
                }
            }
        }
        redirect("main");
    }
    //get Receive Invoice Count
    public function getReceiveCount(){
        echo $this->inout_model->getReceiveCount();
    }

    //get Balance
    public function getBalance(){
        $userdata = $this->session->userdata('user');
        echo $this->inout_model->getBalance($userdata['id']);
    }

    // get chart data
    public function getBalanceChart(){
        echo  $this->inout_model->getBalanceChart();
    }
    //Store Money
    public function storeMoney(){
        $userdata = $this->session->userdata('user');
        if($this->inout_model->getUserRole($userdata['id']))
        {
            $this->inout_model->storeMoney();
        }
        redirect("main");
    }

    //Confirm Receive Money
    public function confirmReceive(){
        echo $this->inout_model->confirmReceive();
    }

    //Send SMS
    function sendSMS($msgObj) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/'.$this->config->item('TWILIO_ACCOUNT_SID').'/Messages.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->config->item('TWILIO_ACCOUNT_SID') . ':' . $this->config->item('TWILIO_AUTHENTICATION_TOKEN'));
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($msgObj));

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    //Check Expired
    public function checkExpired(){
        echo $this->inout_model->checkExpired();
    }
}