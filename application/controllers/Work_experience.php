<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Work_experience extends CI_Controller
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
            'applicant_id'=>$this->input->post('applicant_id'),
            'job_title' => $this->input->post('job_title'),
            'contract_type' => $this->input->post('contract_type'),
            'date_from'=>$this->input->post('date_from'),
            'date_to'=>$this->input->post('date_to'),
            'company_name' => $this->input->post('company_name'),
            'company_website' => $this->input->post('company_website'),
            'company_country' => $this->input->post('company_country'),
        );

        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m','Applicant');
        $type =$this->Applicant->check_type($email);

        if($type =='job')
        {
            $this->load->model('Work_experience_job_m','Work');

            $this->Work->insert_data($data);

            $this->load->model('Applicant_m','Applicant');
            

            echo json_encode(array("status" => TRUE));
        }
        elseif($type =='intern')
        {
            $this->load->model('Work_experience_intern_m','Work');

            $this->Work->insert_data($data);

            echo json_encode(array("status" => TRUE));
        }
    }
}