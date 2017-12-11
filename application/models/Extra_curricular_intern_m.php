<?php

class Extra_curricular_intern_m extends CI_Model
{

    var $table = 'extra_curricular_intern';
    //var $column = array('degree', 'university', 'degree_type', 'date_from', 'date_to', 'gpa');
    //var $order = array('degree' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    public function insert_data($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
}


?>