<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InternController extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->model('Company_m', 'person');
       // $this->load->model('Post_job_m', 'theJob');
        $this->load->model('Post_internship');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Pages/Company/dashboard');
    }

    function posted_internships(){
        //$company_id = $this->session->userdata('company_id');

        $companyID = $this->session->userdata('company_id');

        $result['internships'] = $this->Post_internship->getPostedInternships($companyID);

        $this->load->view('Pages/Company/posted_internships',$result);


    }

    function deleteInternShip($id){

        $this->Post_internship->deleteInternship($id);


        redirect('Company/dashboard');

    }
}