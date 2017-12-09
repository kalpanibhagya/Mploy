<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Academic_qualification extends CI_Controller
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
            'degree' => $this->input->post('degree'),
            'university' => $this->input->post('university'),
            'degree_type' => $this->input->post('degree_type'),
            'date_from'=>$this->input->post('date_from'),
            'date_to'=>$this->input->post('date_to'),
            'gpa' => $this->input->post('gpa')
        );

        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m','Applicant');
        $type =$this->Applicant->check_type($email);

        if($type =='job')
        {
            $this->load->model('Academic_job_m','Academic');

            $this->Academic->insert_data($data);

            echo json_encode(array("status" => TRUE));
        }
        //echo json_encode(array("status" => TRUE));

    }

    public function ajax_list()
    {
        $this->load->model('Academic_job_m','Academic');
        $list = $this->Academic->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $academic) {
            $no++;
            $row = array();
            $row[] = $academic->id;
            $row[] = $academic->university;
            $row[] = $academic->country;
            $row[] = $academic->email;
            $row[] = $academic->address;
            $row[] = $academic->contact_no;
            $row[] = $academic->hiring_status;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_academic('."'".$academic->company_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_academic('."'".$academic->company_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_academic('."'".$academic->company_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->person->count_all(),
            "recordsFiltered" => $this->person->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}

