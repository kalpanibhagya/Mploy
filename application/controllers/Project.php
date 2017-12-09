<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
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
        $data = array(
            'applicant_id'=>'1',
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'date_from'=>$this->input->post('date_from'),
            'date_to'=>$this->input->post('date_to'),
            'github' => $this->input->post('github'),
            'description' => $this->input->post('description')
        );

        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m','Applicant');
        $type =$this->Applicant->check_type($email);

        if($type =='job')
        {
            $this->load->model('Project_job_m','Project_job');

            $this->Project_job->insert_data($data);

            echo json_encode(array("status" => TRUE));
        }
    }
}