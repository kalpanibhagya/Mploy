<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 08/12/2017
 * Time: 08:04 PM
 */
class Post_job_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

    }

    public function insert_job_data($data){
        $this->db->insert('job_opportunity', $data);
    }

    public function get_last_opportunity_id(){

        $query ="select opportunity_id from job_opportunity order by opportunity_id DESC limit 1";

        $res = $this->db->query($query);

        if($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }

    public function getPostedJobs($companyID){
        $query = $this->db->query("select opportunity_id, job_title,location,salary,open_date_to from  job_opportunity where company_id=$companyID");
        $res = $query->result();
        return $res;
    }

    public function deleteJob($id){
//        /*$query = $this->db->query("delete from job_opportunity where opportunity_id=$id");
//         $query->result;*/
        $this->db->where('opportunity_id',$id);
        $this->db->delete('job_opportunity');


    }
}