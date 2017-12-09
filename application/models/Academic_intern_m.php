<?php

class Academic_intern_m extends CI_Model
{

    var $table = 'academic_qualification_intern';
    //var $column = array('fullname', 'username', 'dob', 'gender');
    //var $order = array('fullname' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    public function insert_data($data)
    {
        $this->db->insert($this->table,$data);
        return$this->db->affected_rows();
    }


}