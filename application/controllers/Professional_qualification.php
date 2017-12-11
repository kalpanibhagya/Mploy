<?php


efined('BASEPATH') OR exit('No direct script access allowed');

class Professional_qualification extends CI_Controller
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
            'professional_body_id' => '1',
            'degree' => $this->input->post('degree'),
            'university' => $this->input->post('university'),
            'degree_type' => $this->input->post('degree_type'),
            'date_from' => $this->input->post('date_from'),
            'date_to' => $this->input->post('date_to'),
            'gpa' => $this->input->post('gpa')
        );

        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m', 'Applicant');
        $type = $this->Applicant->check_type($email);

        if ($type == 'job') {
            $this->load->model('Professional_job_m', 'Professional');

            $this->Professional->insert_data($data);

            echo json_encode(array("status" => TRUE));
        }
        elseif ($type == 'intern')
        {
            $this->load->model('Professional_intern_m', 'Professional');

            $this->Professional->insert_data($data);

            echo json_encode(array("status" => TRUE));
        }

    }
}