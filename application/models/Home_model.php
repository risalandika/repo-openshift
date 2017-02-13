<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        function get_website($id='',$start_date='', $end_date='')
        {
                $sql = "SELECT web,prov,USER,page_view,SESSION, pages_per_session  FROM(
                        SELECT c.web, c.PROV 
                        FROM oa_login a, oa_login_permission b, oa_registration c 
                        WHERE a.id = b.id_login AND b.id_website=c.id AND a.id='".$id."' GROUP BY 1)v0
                        LEFT JOIN 
                        (SELECT a.id_pub, CONCAT(LEFT(MONTHNAME(a.ds),3), ' ',RIGHT(a.ds,2)) AS DATE, USER AS USER, pageviews AS page_view, SESSION AS SESSION, pages_per_session AS pages_per_session 
                        FROM oa_summary a WHERE a.ds BETWEEN '".$start_date."' AND '".$end_date."' 
                        GROUP BY 1 ORDER BY a.ds ASC) v1
                        ON v1.id_pub = v0.prov";
                $query = $this->db->query($sql);
                return $query;
        }

}