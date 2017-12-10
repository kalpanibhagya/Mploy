<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/12/2017
 * Time: 10:00 AM
 */
class weight_board_job_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

    }

    public function insert_weight($data){
        $this->db->insert('weight_board_job', $data);
    }
}