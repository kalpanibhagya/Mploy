<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
    public function forget_password(){
        $this->load->view('Includes/Applicant/header.php');
        $this->load->view('forget_password');
        $this->load->view('Includes/footer_contact');
    }

    public function forget_password2(){
        $this->load->view('Includes/Company/header.php');
        $this->load->view('forget_password');
        $this->load->view('Includes/footer_contact');
    }

}