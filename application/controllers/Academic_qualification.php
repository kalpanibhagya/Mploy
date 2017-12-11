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
            'applicant_id'=>$this->input->post('applicant_id'),
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

            $this->load->model('Applicant_m','Applicant');
            $result = $this->Applicant->get_data($email);


            $type = $this->input->post('degree_type');
            $count = $result[$type];
            $count = $count + 1;

            $where = array('email'=>$email);
            $data = array($type=>$count );
            $table = 'job_applicant';


            $this->load->model('Applicant_m','Applicant');
            $this->Applicant->update_table($table,$where,$data);


            echo json_encode(array("status" => TRUE));
        }
        elseif($type =='intern')
        {
            $this->load->model('Academic_intern_m','Academic');

            $this->Academic->insert_data($data);


            echo json_encode(array("status" => TRUE));
        }

    }

    public function ajax_list()
    {
        $this->load->model('Academic_job_m','Academic');
        $list = $this->Academic->get_datatables();
        $data = array();

        $email = $this->session->userdata['email'];

        $this->load->model('Applicant_m','Applicant');
        $data1 = $this->Applicant->get_data($email);

        $id = $data1['applicant_id'];

        $no = $_POST['start'];
        foreach ($list as $academic) {
            if ($id == $academic->applicant_id)
            {
                $no++;
                $row = array();
                //$row[] = $academic->id;
                $row[] = $academic->degree;
                $row[] = $academic->university;
                $row[] = $academic->degree_type;
                $row[] = $academic->date_from;
                $row[] = $academic->date_to;
                $row[] = $academic->gpa;

                //add html for action
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_academic('."'".$academic->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_academic('."'".$academic->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_academic('."'".$academic->id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

                $data[] = $row;
            }

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Academic->count_all(),
            "recordsFiltered" => $this->Academic->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m','Applicant');

        $type = $this->Applicant->check_type($email);

        if ($type == 'job')
        {
            $this->load->model('Academic_job_m','Academic');
            $data = $this->Academic->get_data_by_id($id);

            echo json_encode($data);
        }
        elseif ($type == 'intern')
        {
            $this->load->model('Academic_intern_m','Academic');
            $data = $this->Academic->get_data_by_id($id);

            echo json_encode($data);
        }
    }


}

