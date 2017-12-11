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

    public function ajax_list()
    {
        $this->load->model('Professional_job_m','Professional');
        $list = $this->Professional->get_datatables();
        $data = array();

        $email = $this->session->userdata['email'];

        $this->load->model('Applicant_m','Applicant');
        $data1 = $this->Applicant->get_data($email);

        $id = $data1['applicant_id'];

        $no = $_POST['start'];
        foreach ($list as $professional) {
            if ($id == $professional->applicant_id)
            {
                $no++;
                $row = array();
                //$row[] = $academic->id;
                $row[] = $professional->title;
                $row[] = $professional->professional_body;
                $row[] = $professional->licence_no;
                $row[] = $professional->valid_from;
                $row[] = $professional->valid_to;

                //add html for action
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_academic('."'".$professional->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_academic('."'".$professional->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_academic('."'".$professional->id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

                $data[] = $row;
            }

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Professional->count_all(),
            "recordsFiltered" => $this->Professional->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}