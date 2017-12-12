<?php

class Job_selection extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->model('','qualification');

    }

    public function run_selection($opportunity_id)
    {

        $this->load->model('logic/Job_selection_m','Selection');


        //$data = $this->Selection->run_selection($opportunity_id);

        $data = $this->Selection->run_selection($opportunity_id);

        //$this->load->model('Job_post_m','Job');
        $this->load->view('Pages/Company/selected_list',$data);

    }

    public function showAllApplicants($opportunity_id)
    {
        $this->load->model('Job_selection_m','Job');
        $data = $this->Job->showAllApplicants($opportunity_id);

        //$this->load->view('Pages/Company/selected_list',$data);
    }
}