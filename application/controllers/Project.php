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
            'applicant_id' => $this->input->post('applicant_id'),
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'date_from' => $this->input->post('date_from'),
            'date_to' => $this->input->post('date_to'),
            'github' => $this->input->post('github'),
            'description' => $this->input->post('description')
        );

        $email = $this->session->userdata('email');

        $this->load->model('Applicant_m', 'Applicant');
        $type = $this->Applicant->check_type($email);

        if ($type == 'job') {

            $this->load->model('Project_job_m', 'Project_job');
            $this->Project_job->insert_data($data);


            $this->load->model('Applicant_m', 'Applicant');
            $result = $this->Applicant->get_data($email);


            //$type = $this->input->post('project');
            $count = $result['project'];
            $count = $count + 1;

            $where = array('email' => $email);
            $data = array('project' => $count);
            $table = 'job_applicant';


            $this->load->model('Applicant_m', 'Applicant');
            $this->Applicant->update_table($table, $where, $data);


            echo json_encode(array("status" => TRUE));
        } elseif ($type == 'intern') {
            $this->load->model('Project_intern_m', 'Project_job');

            $this->Project_job->insert_data($data);

            echo json_encode(array("status" => TRUE));
        }
    }

    public function ajax_list()
    {
        $this->load->model('Project_job_m', 'Project');
        $list = $this->Project->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $project) {
            $no++;
            $row = array();
            //$row[] = $project->id;
            $row[] = $project->name;
            $row[] = $project->type;
            $row[] = $project->date_from;
            $row[] = $project->date_to;
            $row[] = $project->github;
            $row[] = $project->description;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_project(' . "'" . $project->project_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_project(' . "'" . $project->project_id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_project(' . "'" . $project->project_id . "'" . ')"><i class="glyphicon glyphicon-file"></i> View</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Project->count_all(),
            "recordsFiltered" => $this->Project->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

    }
}