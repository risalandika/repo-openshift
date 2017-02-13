<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	 function verifyEmailID($key)
    {
    	$data2 = array('IS_ACTIVE' => 1);
    	$this->db->where('md5(email)', $key);
    	$this->db->update('oa_registration', $data2);
        $data = array('is_activated' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('oa_login', $data);
    }
}