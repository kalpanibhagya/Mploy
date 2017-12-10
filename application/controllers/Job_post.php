<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Job_post_m','job');

    }


    public function ajax_list()
    {
        $list = $this->job->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $job) {
            $no++;
            $row = array();
            $row[] = $job->job_title;
            $row[] = $job->location;
            $row[] = $job->number_of_opportunities;
            $row[] = $job->open_date_from;
            $row[] = $job->open_date_to;
            $row[] = $job->contract_type;
            $row[] = $job->salary;
            $row[] = $job->description;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_job('."'".$job->opportunity_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->job->count_all(),
            "recordsFiltered" => $this->job->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_edit($opportunity_id)
    {
        $data = $this->person->get_by_id($opportunity_id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'job_title' => $this->input->post('job_title'),
            'location' => $this->input->post('location'),
            'number_of_opportunities' => $this->input->post('number_of_opportunities'),
            'open_date_from' => $this->input->post('open_date_from'),
            'open_date_to' => $this->input->post('open_date_to'),
            'contract_type' => $this->input->post('contract_type'),
            'salary' => $this->input->post('salary'),
            'description' => $this->input->post('description'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
            'job_title' => $this->input->post('job_title'),
            'location' => $this->input->post('location'),
            'number_of_opportunities' => $this->input->post('number_of_opportunities'),
            'open_date_from' => $this->input->post('open_date_from'),
            'open_date_to' => $this->input->post('open_date_to'),
            'contract_type' => $this->input->post('contract_type'),
            'salary' => $this->input->post('salary'),
            'description' => $this->input->post('description'),
        );
        $this->person->update(array('opportunity_id' => $this->input->post('opportunity_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($opportunity_id)
    {
        $this->person->delete_by_id($opportunity_id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($opportunity_id){

        $data['output'] = $this->job->get_by_id_view($opportunity_id);
        $this->load->view('Pages/Admin/view_Detail', $data);
    }
}