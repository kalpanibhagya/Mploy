<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_post extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Job_post_m','job');

    }

    public function showAllJobs(){
        $result = $this->job->showAllJobs();
        echo json_encode($result);
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
            $row[] = '<a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_job(' . "'" . $job->opportunity_id . "'" . ')"><i class="glyphicon glyphicon-file"></i> View</a>
             <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="apply_job(' . "'" . $job->opportunity_id . "'" . ')"><i class="glyphicon glyphicon-edit"></i> Apply</a>';

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



    public function list_by_id($opportunity_id){

        $data['output'] = $this->job->get_by_id_view($opportunity_id);
        $this->load->view('Pages/Company/view', $data);
    }

    public function apply($opportunity_id)
    {
        $email = $this->session->userdata['email'];

        $this->load->model('Applicant_m','Applicant');
        $result = $this->Applicant->get_data($email);

        $applicant_id = $result['applicant_id'];

        $data = array('applicant_id'=>$applicant_id, 'opportunity_id'=>$opportunity_id);

        //$data = array('applicant_id' => '1', 'opportunity_id'=>'7');

        $this->load->model('Job_post_m','Job');
        $result = $this->Job->insert_data_rank($data);

        echo json_encode($result);

        return $result;


    }
}