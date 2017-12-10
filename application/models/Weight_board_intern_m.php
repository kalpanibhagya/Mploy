<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/12/2017
 * Time: 02:45 AM
 */
class Weight_board_intern_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

    }

    public function insert_weight($data){
        $this->db->insert('weight_board_intern', $data);
    }
}