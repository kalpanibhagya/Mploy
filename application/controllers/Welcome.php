<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->view('Includes/header');
        $this->load->view('home');
        $this->load->view('Includes/footer');
	}
	public function Applicant_main(){
        $this->load->view('Includes/Applicant/header');
        $this->load->view('Applicant_main');
        $this->load->view('Includes/footer_contact');
    }
    public function Company_main(){
        $this->load->view('Includes/Company/header');
        $this->load->view('Company_main');
        $this->load->view('Includes/footer_contact');
    }
}
