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
            $result = $this->Applicant->get_data($email);


            $type = $this->input->post('contract_type');
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
            $this->load->model('Work_experience_intern_m','Work');

            $this->Work->insert_data($data);

            echo json_encode(array("status" => TRUE));
        }
    }

    public function ajax_list()
    {
        $this->load->model('Work_experience_job_m','Work');
        $list = $this->Work->get_datatables();
        $data = array();

        $email = $this->session->userdata['email'];

        $this->load->model('Applicant_m','Applicant');
        $data1 = $this->Applicant->get_data($email);

        $id = $data1['applicant_id'];

        $no = $_POST['start'];
        foreach ($list as $work) {
            if ($id == $work->applicant_id)
            {
                $no++;
                $row = array();
                //$row[] = $work->id;
                $row[] = $work->job_title;
                $row[] = $work->company_name;
                $row[] = $work->contract_type;
                $row[] = $work->date_from;
                $row[] = $work->date_to;
                $row[] = $work->company_country;
                $row[] = $work->company_website;

                //add html for action
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_work(' . "'" . $work->work_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_work(' . "'" . $work->work_id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_work(' . "'" . $work->work_id . "'" . ')"><i class="glyphicon glyphicon-file"></i> View</a>';

                $data[] = $row;
            }

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Work->count_all(),
            "recordsFiltered" => $this->Work->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

    }
}