<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobController extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->model('Company_m', 'person');
        $this->load->model('Post_job_m');
        //$this->load->model('Post_internship');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Pages/Company/dashboard');
    }

    function posted_jobs(){
        //$company_id = $this->session->userdata('company_id');

        $companyID = $this->session->userdata('company_id');

        $result['jobs'] = $this->Post_job_m->getPostedJobs($companyID);

        $this->load->view('Pages/Company/posted_job',$result);


    }

    function deleteJob($id){

        $this->Post_job->deleteJob($id);

        $this->posted_internships();

//        print($id);
//        die();

//        $this->Post_internship->deleteInternShip($id);
//
//        $this->posted_internships();

    }
}