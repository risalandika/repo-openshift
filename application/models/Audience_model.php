<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audience_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        // Audience Overview START
        function get_line_big($overview='',$start_date='',$end_date='')
        {
            if($overview == 'user')
            {
                $sql = "SELECT ds, CONCAT(LEFT(MONTHNAME(ds),3), ' ',RIGHT(ds,2)) AS date, daily_users as value FROM oa_summary_users WHERE ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."' group by 1 order by 1 asc";
            }
            else if($overview == 'session')
            {
                $sql = "SELECT CONCAT(LEFT(MONTHNAME(ds),3), ' ',RIGHT(ds,2)) AS date, session as value FROM oa_summary WHERE ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."'";
            }
            else if($overview == 'page_view')
            {
                $sql = "SELECT CONCAT(LEFT(MONTHNAME(ds),3), ' ',RIGHT(ds,2)) AS date, pageviews as value FROM oa_summary WHERE ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."'";
            }
            else if ($overview == 'page_session')
            {
                $sql = "SELECT CONCAT(LEFT(MONTHNAME(ds),3), ' ',RIGHT(ds,2)) AS date, pages_per_session as value FROM oa_summary WHERE ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."'";
            }
            else
            {
                $sql = "SELECT CONCAT(LEFT(MONTHNAME(ds),3), ' ',RIGHT(ds,2)) AS date, session as value FROM oa_summary WHERE ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."'";
            }

            $query = $this->db->query($sql);
            return $query;
        }

        function get_line_small($start_date='',$end_date='')
        {
            $sql = "SELECT CONCAT(LEFT(MONTHNAME(a.ds),3), ' ',RIGHT(a.ds,2)) AS DATE, USER AS user, pageviews AS page_view, SESSION AS session, pages_per_session AS pages_per_session FROM oa_summary a WHERE a.ds BETWEEN '".$start_date."' AND '".$end_date."' AND a.id_pub='".trim($this->session->userdata['ID_PUB'])."' group by 1 order by a.ds asc";
             $query = $this->db->query($sql);
            return $query;
        }

        function get_sum_small($start_date='',$end_date='')
        {
                $sql = "SELECT SUM(daily_users) AS user, SUM(SESSION) AS session, SUM(pageviews) AS page_view, AVG(pages_per_session) AS page_session FROM oa_summary_users a, oa_summary b WHERE a.ds BETWEEN '".$start_date."' AND '".$end_date."' AND a.id_pub='".trim($this->session->userdata['ID_PUB'])."' AND a.ds=b.ds AND a.id_pub=b.id_pub";
                $query = $this->db->query($sql);
                return $query;
        }


        function get_pie($start_date='',$end_date='')
        {
               $sql = "SELECT sum(daily_users) AS total, sum(daily_users)-sum(abs_uniqe_user) AS returning_user FROM oa_summary_users WHERE ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."'";
               $query = $this->db->query($sql);
               return $query;
        }

        function get_top_table($type='',$start_date='',$end_date='')
        {
               $sql = "SELECT  t.path AS `name`, SUM(t.`count`) AS `value`, a.total FROM oa_summary_top t, (SELECT SUM(`count`) as total from oa_summary_top where  path !='null' AND `type`='".$type."' AND ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."')a WHERE path !='null' AND `type`='".$type."'  AND ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".trim($this->session->userdata['ID_PUB'])."' GROUP BY `path` ORDER BY 2 DESC LIMIT 10";
               $query = $this->db->query($sql);
               return $query;
        }

        // Audience Overview END

        // Audience User Explorer START
        function get_total($start_date='',$end_date='')
        {
                $sql = "SELECT COUNT(id_track) as value FROM `oa_web_users_daily` WHERE ds BETWEEN '".$start_date."' AND '".$end_date."' AND id_pub='".$this->session->userdata['ID_PUB']."'";
                $query = $this->db->query($sql);
               return $query;                        
        }

        //Audience User Explorer END

        // Audience Active Users START

        function get_active_users_graph($start_date='',$end_date='')
        {
            $sql="SELECT CONCAT(LEFT(MONTHNAME(a.ds),3), ' ',RIGHT(a.ds,2)) AS date, 
                    SUM(CASE WHEN DATE(v.ds) BETWEEN DATE(a.ds)-INTERVAL 30 DAY AND DATE(a.ds) THEN v.daily_users ELSE 0 END ) AS 30day_active_users,
                    SUM(CASE WHEN DATE(v.ds) BETWEEN DATE(a.ds)-INTERVAL 14 DAY AND DATE(a.ds) THEN v.daily_users ELSE 0 END ) AS 14day_active_users, 
                    SUM(CASE WHEN DATE(v.ds) BETWEEN DATE(a.ds)-INTERVAL 7 DAY AND DATE(a.ds) THEN v.daily_users ELSE 0 END ) AS 7day_active_users, 
                    SUM(CASE WHEN DATE(v.ds) BETWEEN DATE(a.ds) AND DATE(a.ds) THEN v.daily_users ELSE 0 END ) AS 1day_active_users 
                    FROM 
                    (
                    SELECT ds,
                    CASE WHEN DATE(ds) BETWEEN DATE(ds)-INTERVAL 30 DAY AND DATE(ds)  THEN daily_users ELSE 0 END AS daily_users
                    FROM oa_summary_users
                    WHERE id_pub='".$this->session->userdata['ID_PUB']."'
                    AND DATE(ds) BETWEEN DATE('".$start_date."')-INTERVAL 30 DAY AND '".$end_date."'
                    ORDER BY ds
                    ) v
                    , oa_summary_users a
                    WHERE a.id_pub='".$this->session->userdata['ID_PUB']."'
                    AND a.ds BETWEEN '".$start_date."' AND '".$end_date."'
                    GROUP BY a.ds";
                     $query = $this->db->query($sql);
               return $query; 
        }

        function get_active_users_sum($start_date='',$end_date='')
        {
            $sql="SELECT 
                 SUM(IF(ABS(DATEDIFF(v.ds,'".$end_date."'))<=30,v.daily_users,0)) AS _30day_active_users
                ,SUM(IF(ABS(DATEDIFF(v.ds,'".$end_date."'))<=14,v.daily_users,0))  AS _14day_active_users
                ,SUM(IF(ABS(DATEDIFF(v.ds,'".$end_date."'))<=7,v.daily_users,0))  AS _7day_active_users
                ,SUM(IF(ABS(DATEDIFF(v.ds,'".$end_date."'))<1,v.daily_users,0))  AS _1day_active_users
                FROM
                (
                SELECT ds,
                CASE WHEN DATE(ds) BETWEEN DATE(ds)-INTERVAL 30 DAY AND DATE(ds)  THEN daily_users ELSE 0 END AS daily_users
                FROM oa_summary_users
                WHERE id_pub='".$this->session->userdata['ID_PUB']."'
                AND DATE(ds) BETWEEN DATE('".$end_date."')-INTERVAL 30 DAY AND '".$end_date."'
                ORDER BY ds
                ) v
                , oa_summary_users a
                WHERE a.id_pub='".$this->session->userdata['ID_PUB']."'
                AND a.ds=v.ds";
                 $query = $this->db->query($sql);
               return $query; 
        }

        // Audience Active Users END       
}