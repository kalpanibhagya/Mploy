<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Skill extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->model('','qualification');

    }

    public function ajax_add()
    {
        $keyword_array=array(
            'v' => 'Java',
            'p' => 'Php',
            'a' => 'Android',
            'c' => 'C',
            'l' => 'C++',
            's' => 'Scrum',
            'j' => 'JavaScript',
            'h' => 'C#',
            'f' => 'Front-End',
            'b' => 'Back-End'
        );

        $selection1 =$this->input->post('selection1');
        $selection2 =$this->input->post('selection2');
        $selection3 =$this->input->post('selection3');

        $data1 = array();
        $data2 = array();

        array_push($data1,$selection1,$selection2,$selection3);

        for ($i = 0; $i < 3; $i++) {
            $key = array_search($data1[$i], $keyword_array);
            array_push($data2,$key);
        }

        $selection = implode(" ",$data2);


        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m', 'Applicant');
        $type = $this->Applicant->check_type($email);

        if ($type == 'job') {

            $table = 'job_applicant';
            $where = array('email' => $email);
            $data = array('keyword'=>$selection);

            $this->Applicant->update_table($table, $where, $data);


            echo json_encode(array("status" => TRUE));

        } elseif ($type == 'intern') {
            $this->load->model('Academic_intern_m', 'Academic');

            $this->Academic->insert_data($data);


            echo json_encode(array("status" => TRUE));
        }

    }
}


?>