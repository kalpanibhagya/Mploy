<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08/12/2017
 * Time: 01:07 PM
 */
class Post_internship extends CI_Model{

    var $table = 'intern_opportunity';
    var $column = array('job_title','contract_type','location','number_of_opportunities','open_date_from','open_date_to','salary','job_category');
    var $order = array('opportunity_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

    }

    /*public function insert_data($data){
        $this->db->insert('intern_opportunity', $data);
    }*/
    public function insert_internship_data($data){
        $this->db->insert('intern_opportunity', $data);
    }

    public function get_last_opportunity_id(){

        $query ="select opportunity_id from intern_opportunity order by opportunity_id DESC limit 1";

        $res = $this->db->query($query);

        if($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }
}
