<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inout_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        //load session library
		$this->load->library('session');
    }

    //Get Users
    public function getUsers($userId)
    {
        $sql = "SELECT id, user_name,phone FROM users WHERE id <> ".$userId;
        $query = $this->db->query($sql, array($userId));
        return $query->result();
    }

    //Get Current Balance
    public function getBalance($userId,$send_dt='default',$receive_dt='default')
    {
        $userPhone=$this->getUserPhonebyId($userId);
        $sql="SELECT (";
        $sql.="(SELECT IFNULL(SUM(amount),0) FROM in_out WHERE receiver_phone = '".$userPhone."' AND (status='2' OR status='4' OR status='5') AND send_dt<=".($receive_dt=='default'?"concat(curdate(),' ',curtime())":"'".$receive_dt."'").")";
        $sql.= "-(SELECT IFNULL(SUM(amount),0) FROM in_out WHERE sender_phone = '".$userPhone."' AND (status='1' OR status='2' OR status='3' OR status='5') AND send_dt<=".($send_dt=='default'?"concat(curdate(),' ',curtime())":"'".$send_dt."'").")";
        $sql.=") as balance";
        $query = $this->db->query($sql);
        $bal = $query->row_array();
        return $bal["balance"];
    }

    //Get Balance History
    public function getBalanceHistory(){
        $userdata = $this->session->userdata('user');
        $userPhone=$this->getUserPhonebyId($userdata['id']);

        $sql="SELECT (IF(A.sender_phone='".$userPhone."',A.receiver_phone,A.sender_phone)) as phone";
        $sql.=",IF(A.sender_phone='".$userPhone."',(-1)*A.amount,A.amount) as amount ";
         $sql.=",A.send_dt,A.receive_dt,A.id";
        $sql.=", A.status";
        $sql.=" FROM in_out AS A";
        $sql.=" LEFT JOIN users as B ON B.id=A.sender_phone";
        $sql.=" LEFT JOIN users as C ON C.id=A.receiver_phone";
        $sql.=" WHERE (A.sender_phone='".$userPhone."' OR A.receiver_phone='".$userPhone."')";
        $sql.=" ORDER BY A.id DESC";
        $query=$this->db->query($sql);
        return $query->result();
    }

    //Get All Balance History for Manager
    public function getAllBalanceHistory(){
        $this->db->order_by('id','DESC');
        $query=$this->db->get('in_out');
        return $query->result();
    }

    //Get Balance chart Data
//    public function getBalanceChart(){
//        $userdata = $this->session->userdata('user');
//
//        $duration=$_POST['duration'];
//        $from=$_POST['from'];
//        $to=$_POST['to'];
//        $yearCount=$to-$from;
//        $balance=array();
//        $date=date_create();
//
//        if($duration=='year')
//            $date=date_create($to.date("-m-d"));
//
//        $end = date_format($date, "Y-m-d 23:59:59");
//
//        //default week
//        $curValue = date_timestamp_get($date);
//        $startValue = $curValue - (3600*24*6);
//        $dayStep=1;
//        $dayCount=6;
//        $receiveDate = date('Y-m-d 00:00:00', $startValue);
//
//        if($duration == "month"){
//         $dayStep=3;
//         $startValue = $curValue - (3600*24*29);
//         $dayCount=29;
//        }
//        if($duration == "quarter"){
//            $dayStep=9;
//            $startValue = $curValue - (3600*24*89);
//            $dayCount=89;
//        }
//
//        if($duration == "half"){
//            $dayStep=15;
//            $startValue = $curValue - (3600*24*179);
//            $dayCount=179;
//        }
//
//        if($duration == "year"){
//            if($yearCount>0)
//            {
//                $dayStep=30*$yearCount;
//                $startValue = $curValue - (3600*24*364*$yearCount);
//                $dayCount=364*$yearCount;
//            }
//            else{
//                $dayStep=29;
//                $startValue = $curValue - (3600*24*29*date("m"));
//                $dayCount=29*date("m");
//            }
//        }
//
//        $step=3600*24;
//
//        for($i=$dayCount;$i>=1;){
//            $receiveDate = date('Y-m-d 23:59:59', $curValue-$step*$i);
//
//            $sql="SELECT (";
//            $sql.="(SELECT IFNULL(SUM(amount),0) FROM in_out WHERE receive_user_id = '".$userdata['id']."' AND status='1' AND receive_dt<='".$receiveDate."')";
//            $sql.= "-(SELECT IFNULL(SUM(amount),0) FROM in_out WHERE sender_phone = '".$userdata['id']."' AND status='1' AND receive_dt<='".$receiveDate."')";
//            $sql.=") as balance";
//
//            $query = $this->db->query($sql);
//            $bal = $query->row_array();
//
//            $balance[]=array(substr($receiveDate,0,10),$bal['balance']);
//            $i-=$dayStep;
//        }
//
//        $userPhone=$this->getUserPhonebyId($userdata['id']);
//
//        $sql="SELECT (";
//        $sql.="(SELECT IFNULL(SUM(amount),0) FROM in_out WHERE receiver_phone= '".$userPhone."' AND status='1' AND receive_dt<='".$end."')";
//        $sql.= "-(SELECT IFNULL(SUM(amount),0) FROM in_out WHERE sender_phone = '".$userPhone."' AND status='1' AND receive_dt<='".$end."')";
//        $sql.=") as balance";
//        $query = $this->db->query($sql);
//        $bal = $query->row_array();
//
//
//            $balance[]=array('Current',$bal['balance']);
//
//        return json_encode($balance);
//    }


    public function getUserRole($userId)
    {
        $sql = "SELECT user_role FROM users WHERE id = '$userId'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result ["user_role"];
    }

    public function getUserInfo($userPhone)
    {
        $sql = "SELECT * FROM users WHERE phone = '$userPhone'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

    //Send Money
    public function sendAmount()
    {   
        if($_POST){

            $userdata = $this->session->userdata('user');
            $status=1;
            $insert_id='';

           
            if(!empty($_POST['phone']))
            {
                $userPhone=$this->getUserPhonebyId($userdata['id']);
                $insert_id=0;
                if($userPhone!=$_POST['phone'])
                {
                    $sql="INSERT INTO in_out (`sender_phone`,`receiver_phone`,`amount`,`status`,`send_dt`)";
                    $sql.=" VALUES('".$userPhone."','".$_POST['phone']."','".$_POST['amount']."','".$status."',concat(curdate(),' ',curtime()))";
                    $this->db->query($sql);
                    $insert_id = $this->db->insert_id();
                }
            }
           return $insert_id==0?$insert_id:$this->getTransactionInfo($insert_id);
        }       
    }

    function getTransactionInfo($trasactionId) {
        $sql = "SELECT * FROM in_out WHERE id=".$trasactionId;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getUserPhonebyId($userId){
        $sql = "SELECT phone FROM users WHERE id=".$userId;
        $query = $this->db->query($sql);
        $result=$query->row_object();
        return $result->phone;
    }
    function getUserIdbyPhone($userPhone){
        $sql = "SELECT id FROM users WHERE phone='".$userPhone."'";
        $query = $this->db->query($sql);
        if($query->num_rows())
        {
            $result=$query->row_object();
            return $result->id;
        }
        else{
            return 0;
        }

    }

    //Admin Store Money
    public function storeMoney()
    {
        if($_POST)
        {
            $userdata = $this->session->userdata('user');
            $userPhone=$this->getUserPhonebyId($userdata['id']);

            $sql="INSERT INTO in_out (`sender_phone`,`receiver_phone`,`amount`,`status`,`send_dt`,`receive_dt`)";
            $sql.=" VALUES('000-000-0000','".$userPhone."','".$_POST['amount']."','2',concat(curdate(),' ',curtime()),concat(curdate(),' ',curtime()))";
            $id = $this->db->query($sql);
            return $id;
        }
    }

    //Get Send and Receive Data
    public function getData($flag){
        $userdata = $this->session->userdata('user');
        $field = $flag==1 ?'sender':'receiver';
        $to_field = $flag==2 ?'sender':'receiver';
        $userPhone=$this->getUserPhonebyId($userdata['id']);

        $sql="SELECT A.id,A.send_dt,A.receive_dt,A.amount as value, B.user_name, A.status FROM in_out as A";
        $sql.=" LEFT JOIN users as B ON B.phone=A.".$to_field."_phone";
        $sql.=" WHERE A.".$field."_phone='".$userPhone."' AND A.amount>0";

        $query=$this->db->query($sql);
        return $query->result();
    }

    

    //Get Receive Count for notification
    public function getReceiveCount(){
        $userdata = $this->session->userdata('user');
        $userPhone=$this->getUserPhonebyId($userdata['id']);

        $sql="SELECT count(*) as count FROM in_out where receiver_phone='".$userPhone."' AND status='0'";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result[0]->count;
    }

    //Set Status Read Receive data
    public function confirmReceive(){
        $sql="UPDATE in_out SET status='2',receive_dt=concat(curdate(),' ',curtime()) where id='".$_POST['id']."'";
        $query=$this->db->query($sql);
        return true;
    }

    //Check Expired
    public function checkExpired(){
        $flag=0;//Is there expired transactions?

        $query=$this->db->get('setting');
        foreach ($query->result() as $result)
        {
            $limit_time=$result->limit_time;
        }

        //Convert Second
        $limit_time=$limit_time*3600;


        $sql="SELECT CONCAT(CURDATE(),' ', CURTIME()) as now";
        $query=$this->db->query($sql);
        foreach ($query->result() as $row) {
            $now=$row->now;
        }

        //Pending Transactions
        $this->db->where('status',1);
        $query=$this->db->get('in_out');

        foreach ($query->result() as $row) {
            $expired_date=date("Y-m-d H:i:s",strtotime($row->send_dt)+$limit_time);
            $diff=strtotime($now) - strtotime($row->send_dt);

            if($diff>$limit_time)
            {
                $sql="UPDATE in_out SET status=3,receive_dt='".$expired_date."' WHERE id='".$row->id."'";
                $this->db->query($sql);

                //In case refunded, receiver_phone will be same set past pending transaction's receiver_phone
                $sql="INSERT INTO in_out (`sender_phone`,`receiver_phone`,`amount`,`status`,`send_dt`,`receive_dt`)";
                $sql.=" VALUES('".$row->receiver_phone."','".$row->sender_phone."','".$row->amount."',4,'".$expired_date."','".$expired_date."')";
                $this->db->query($sql);
                $flag=1;
            }
        }

        return $flag;
    }

    //Check Incoming Transactions
    public function checkIncoming(){
        $userdata = $this->session->userdata('user');
        $userPhone=$this->getUserPhonebyId($userdata['id']);

        $shareAmount=$this->getSentAmount($userPhone);

        $query=$this->db->get('setting');
        $result=$query->row_object();

        $minimum_share=$result->minimum_share;
        $penalty=$result->penalty;
        $isFirst=$this->isFirstIncoming($userPhone);

        $this->db->select('SUM(amount) as sumIncoming');
        $this->db->where('status',1);
        $this->db->where('receiver_phone',$userPhone);
        $query=$this->db->get('in_out');
        $result=$query->row_object();
        $sumIncoming=$result->sumIncoming;
        $minimum_share_amount=((float)$sumIncoming)*$minimum_share/100;

        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->where('receiver_phone',$userPhone);
        $query=$this->db->get('in_out');

        foreach ($query->result() as $row) {
            $penalty_amount=number_format($row->amount*$penalty/100,0);

            if($minimum_share_amount>$shareAmount&&!$isFirst)
            {
                $sql="INSERT INTO in_out (`sender_phone`,`receiver_phone`,`amount`,`status`,`send_dt`,`receive_dt`)";
                $sql.=" VALUES('".$row->receiver_phone."','".$row->sender_phone."','".$penalty_amount."',5,CONCAT(CURDATE(),' ',CURTIME()),CONCAT(CURDATE(),' ',CURTIME()))";
                $this->db->query($sql);
            }

            $sql="UPDATE in_out SET status=2,receive_dt=CONCAT(CURDATE(),' ',CURTIME()) WHERE id=".$row->id;
            $this->db->query($sql);
        }
    }

    function isFirstIncoming($userPhone){
        $this->db->where('status',2);
        $this->db->where('receiver_phone',$userPhone);
        $query=$this->db->get('in_out');

        return !$query->num_rows();
    }

    function getSentAmount($userPhone){
        $this->db->select('SUM(amount) as amount');
        $this->db->group_start();
        $this->db->where('status',1);
        $this->db->or_where('status',2);
        $this->db->group_end();
        $this->db->where('sender_phone',$userPhone);
        $query=$this->db->get('in_out');

        $result=$query->row_object();
        return $result->amount;
    }

    //Check Minimum_Share
//    public function checkMinimumShare(){
//        $query=$this->db->get('setting');
//        foreach ($query->result() as $result)
//        {
//            $limit_time=$result->limit_time;
//            $minimum_share=$result->minimum_share;
//            $penalty=$result->penalty;
//        }
//
//        $this->db->where('activated',1);
//        $this->db->where('user_role',0);
//        $users=$this->db->get('users');
//
//        foreach ($users->result() as $user) {
//            $sql="SELECT (amount*".$minimum_share."/100) as shareAmount,(amount*".$penalty."/100) as penaltyAmount,send_dt,id,sender_phone";
//            $sql.=" FROM in_out WHERE receive_user_id='".$user->id."' AND status=2 limit 1";
//            $result=$this->db->query($sql);
//            if($result->num_rows())//Exist First Receive Transaction
//            {
//                $fTrans=$result->row_object();
//                $send_dt=new DateTime($fTrans->send_dt);
//                $limit=date("Y-m-d H:i:s",$send_dt->getTimestamp() + $limit_time*3600);
//
//
//                $now=date("Y-m-d h:i:s");
//
//                var_dump($limit->getTimestamp());
//                var_dump($now->getTimestamp());
//                exit();
//                if($now->getTimestamp() >$limit->getTimestamp()){
//                    $sql="SELECT SUM(amount) as amount FROM in_out WHERE sender_phone='".$user->id."' AND status=2 AND receive_dt<='".$limit."'";
//                    $result=$this->db->query($sql);
//                    $realShare=$result->row_object();
//
//                    if($fTrans->shareAmount > $realShare->amount)// First Real Share Money is less than Minimum Share Money
//                    {
//                        $sql="SELECT phone FROM users WHERE id=".$fTrans->sender_phone;
//                        $result=$this->db->query($sql);
//                        $receiver_phone=$result->row_object();
//                        $receiver_phone=$receiver_phone->phone;
//
//                        $sql="INSERT INTO in_out (`sender_phone`,`receive_user_id`,`receiver_phone`,`amount`,`status`,`send_dt`,`receive_dt`)";
//                        $sql.=" VALUES('".$user->id."','".$fTrans->sender_phone."','".$receiver_phone."','".$fTrans->penaltyAmount."',2,CONCAT(CURDATE(),' ',CURTIME()),CONCAT(CURDATE(),' ',CURTIME()))";
//                        $this->db->query($sql);
//                    }
//                }
//            }
//        }
//    }
}