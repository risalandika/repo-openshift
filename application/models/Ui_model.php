<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ui_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

	public function change_website($website='')
	{
		$sql = "SELECT prov as id_pub from oa_registration where web='".$website."'";
		$query = $this->db->query($sql);
        return $query;
	}

}