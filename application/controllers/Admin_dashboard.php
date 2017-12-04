<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Pages/Admin/dashboard');
}

    function employers(){
        $this->load->view('Pages/Admin/employers');
    }

    function interns(){
        $this->load->view('Pages/Admin/interns');
    }

    function jobapplicants(){
        $this->load->view('Pages/Admin/jobapplicants');
    }

    function selection_interns(){
        $this->load->view('Pages/Admin/internSelections');
    }

    function selection_jobapplicants(){
        $this->load->view('Pages/Admin/jobSelections');
    }

    function notifications(){
        $this->load->view('Pages/Admin/notifications');
    }

    function navigation_bar(){
        $this->load->view('Pages/Admin/navigation_bar');
    }

    function addAdmin(){
        $this->load->view('Pages/Admin/addAdmin');
    }
}