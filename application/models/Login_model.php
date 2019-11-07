<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function get_user($user = FALSE)
    {
        // if ($user === FALSE)
        // {
        //     $query = $this->db->get('users');
        //     return $query->result_array();
        // }

        // $query = $this->db->get_where('users', array('id' => $user));
        // return $query->row_array();
    }

    public function getSessionUser(){
        $this->db->where('user_name','admin');
        $query=$this->db->get('users');
        return $query->row_array();
    }
    public function setData()
    {
        if($_POST){
            $val = array(
                'user_name'=>$_POST['user_name'],
                'pwd'=>md5($_POST['pwd']),
                'full_name'=>$_POST['fullname'],
                'email'=>$_POST['email'],
                'address'=>$_POST['address'],
                'phone'=>$_POST['phone']
            );
            $userid = $this->db->insert('users', $val);
            return $userid;
        }
    }

    // find manager
    public function getManager(){
        $this->db->where('user_role', 1);
        $query = $this->db->get('users');
        if(is_null($query->row_array())){
            return 0;                
        }else{
            return 1;
        }
    }
    public function verify()
    {
        if($_POST){
            if(is_null($_POST['user_name'])){
                $userdata = $this->session->userdata('user');
                $this->db->where('user_name', $userdata['user_name']);
            }else{
                $this->db->where('user_name', $_POST['user_name']);                
            }
            $this->db->where('pwd', md5($_POST['pwd']));
            $query = $this->db->get('users');
            if(is_null($query->row_array())){
                return false;                
            }else{
                return $query->row_array();
            }
        }
    }

    public function getProfile($userid){
        $this->db->where('id', $userid);
        $query = $this->db->get('users');
        if(!is_null($query->row_array())){
            return $query->row_array();
        }else{
            return false;
        }
    }

    //Check User
    public function checkUser($user=''){
        $userdata = $this->session->userdata('user');
        $login_phone = $this->session->userdata('login_phone');
        if($user=='')
            $this->db->where('user_name',$userdata['user_name']);
        else
            $this->db->where('user_name',$user);

        $this->db->where('phone',$login_phone);
        $query=$this->db->get('users');
        return $query->num_rows();
    }

    //Check Phone&Fb
    public function checkPhoneFb($phone,$user_name)
    {
        $this->db->where('user_name',$user_name);
        $this->db->where('phone',$phone);
        $query1=$this->db->get('users');

        $this->db->group_start();
        $this->db->where('user_name IS NULL', null, false);
        $this->db->or_where('user_name', '');
        $this->db->group_end();
        $this->db->where('phone',$phone);
        $query2=$this->db->get('users');

        if($query1->num_rows()||$query2->num_rows())
            return true;
        else
            return false;
    }

    public function saveProfile($path){        
        $userdata = $this->session->userdata('user');
        $val = array(
            "full_name"=>$_POST['full_name'],
            "email"=>$_POST['email'],
            "phone"=>$_POST['phone'],
            "address"=>$_POST['address']
        );
        if($path!='')
            $val["img_url"] = $path;
        $this->db->where("id", $userdata["id"]);
        $this->db->update("users", $val);

        $this->db->where('id', $userdata["id"]);
        $query = $this->db->get('users');
        if(sizeof($query->row_array())> 0){
            return $query->row_array();
        }else{
            return false;
        }
    }

    public function changePwd(){        
		$userdata = $this->session->userdata('user');
        //receive count
        $val = array("pwd"=>(string)md5($_POST['pwd']));
        $this->db->where("id", $userdata['id']);
        if($this->db->update("users", $val)){
            return true;
        }else{
            return false;
        }
    }

    //register
    public function register(){
        if($this->verify()){
            return false;
        }
       
        $val = array(
          
                "full_name"=>$_POST["fullname"],
                "email"=>$_POST["email"],
                "phone"=>$_POST["phone"],
                "address"=>$_POST["address"],
                "user_name"=>$_POST["user_name"],
                "pwd"=>(string)md5($_POST["pwd"]),
                "user_role"=>$_POST["role"],
            
        );
        $userid = $this->db->insert('users', $val);

//        $sql = "UPDATE in_out SET receive_user_id=".$this->db->insert_id().",`receive_dt`='".date('Y-m-d h:i:s')."' WHERE receive_user_phone='".$_POST['phone']."'";
       
//        $this->db->query($sql);
        return $userid;
    }

    //Generate Verification Code
    public function generateCode(){
        $code=random_int(111111,999999);

        $this->db->set('verification_code', $code);
        $this->db->where('email', $_POST['email']);
        $this->db->update('users');

        if($this->db->affected_rows()==0)
            return 0;
        else
            return $code;
    }

    //Check Email
    public function checkEmail(){
       $sql="SELECT COUNT(*) as count FROM users WHERE email='".$_POST['email']."'";
       $result=$this->db->query($sql);
       $count=$result->row_array();
        return $count["count"];;
    }


    //Get Admin Email
    public function getAdminEmail(){
        $query = $this->db->select('email')
            ->where('user_role', '1')
            ->get('users');
        $row = $query->row();
        if(isset($row))
            return $row->email;
        else
            return "example@example.com";
    }

    //Reset Password
    public function resetPassword(){
        $this->db->set('pwd', md5($_POST['pwd']));
        $this->db->where('verification_code', $_POST['code']);
        $this->db->update('users');

        if($this->db->affected_rows()==0)
            return false;
        else
            return true;
    }
}