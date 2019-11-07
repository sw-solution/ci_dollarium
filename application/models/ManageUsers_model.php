<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUsers_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function getUsers(){
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getUserRole($userId)
    {
        $sql = "SELECT user_role FROM users WHERE id = '$userId'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result ["user_role"];
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

    public function getBalance(){
        $sql="SELECT A.id,(SELECT SUM(amount) FROM in_out where sender_phone=A.phone AND (status='1' OR status='2' OR status='3' OR status='5')) as sendAmount,";
        $sql.="(SELECT SUM(amount) FROM in_out where receiver_phone=A.phone  AND (status='2' OR status='4' OR status='5')) as receiveAmount";
        $sql.=" FROM users as A";
        $query=$this->db->query($sql);
        $balance=array();
        foreach ($query->result() as $row)
        {
            $balance[$row->id]=array(
                'sendAmount' => $row->sendAmount,
                'receiveAmount' =>$row->receiveAmount
            );
        }
        return $balance;
    }

//    public function activate(){
//        $sql="UPDATE users SET activated=!activated where id='".$_POST['id']."'";
//        $this->db->query($sql);
//        return $this->db->affected_rows();
//    }
    public function delete(){
        $sql="DELETE FROM users where id='".$_POST['id']."'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}