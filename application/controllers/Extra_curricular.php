<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Extra_curricular extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function ajax_add()
    {
        $data = array(
            'applicant_id' => $this->input->post('applicant_id'),
            'name' => $this->input->post('name'),
            'activity_type' => $this->input->post('activity_type'),
            'description' => $this->input->post('degree_type')
        );

        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m', 'Applicant');
        $type = $this->Applicant->check_type($email);

        if ($type == 'job')
        {
            $this->load->model('Extra_curricular_job_m', 'Extra');
            $this->Extra->insert_data($data);


            $this->load->model('Applicant_m', 'Applicant');
            $result = $this->Applicant->get_data($email);


            $type = $this->input->post('activity_type');
            $count = $result[$type];
            $count = $count + 1;

            $where = array('email' => $email);
            $data = array($type => $count);
            $table = 'job_applicant';


            $this->load->model('Applicant_m', 'Applicant');
            $this->Applicant->update_table($table, $where, $data);

            echo json_encode(array("status" => TRUE));
        }

        elseif ($type == 'intern')
        {
            $this->load->model('Extra_curricular_intern_m', 'Extra');
            $this->Extra->insert_data($data);


            echo json_encode(array("status" => TRUE));
        }

    }
}





?>