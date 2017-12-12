<?php

class Count_table_job_m extends CI_Model
{
    //var $table = '';
    //var $column = array('fullname','username','dob','gender');
    //var $order = array('fullname' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }
}