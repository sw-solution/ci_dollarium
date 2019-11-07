<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function getSetting(){
        $query = $this->db->get('setting');
        return $query->row_array();
    }

    public function updateSetting(){        
        $userdata = $this->session->userdata('user');
        
        $this->db->set('minimum_share', $_POST['minimum_share']);
        $this->db->set('penalty', $_POST['penalty']);
        $this->db->set('limit_time', $_POST['limit_time']);
        $this->db->update('setting');

        return $this->db->affected_rows();
    }
}