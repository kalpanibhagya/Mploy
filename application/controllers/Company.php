<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

    }

    public function Login(){
        $this->load->view('Includes/Company/header');
        $this->load->view('Pages/Company/Login');
    }

    public function Signup(){
        //$this->load->view('Includes/Company/header');
        $this->load->view('Pages/Company/createProfile');
    }

    /*
    public function form_validation(){
        //echo 'OK';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[password]');

        if($this->form_validation->run()){
            //true
            $this->load->model('Company_m');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email')
            );

            $this->Company_m->insert_data($data);

            redirect(base_url().'Company/inserted');

        }else{
            //false
            $this->Signup();
        }
    }

    public function inserted(){
        $this->Login();
    }
*/
    public function createProfile(){
        $this->load->view('Pages/Company/createProfile');
    }

    function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if($this->form_validation->run()){
            //true

            $email = $this->input->post('email');
            $password = base64_encode(strrev(md5($this->input->post('password'))));

            $this->load->model('Company_m');
            $data = $this->Company_m->can_login($email, $password);
            if ($data){
                $this->session->set_userdata('company_id',$data['company_id']);
                $this->session->set_userdata('email', $data['email'] );
                $this->session->set_userdata('username', $data['username'] );
                $this->session->set_userdata('company_name', $data['company_name'] );
                $this->session->set_userdata('register_no', $data['register_no'] );
                $this->session->set_userdata('logo', $data['logo'] );
                $this->session->set_userdata('type', $data['type'] );
                $this->session->set_userdata('size', $data['size'] );
                $this->session->set_userdata('hiring_status', $data['hiring_status'] );
                $this->session->set_userdata('address', $data['address'] );
                $this->session->set_userdata('country', $data['country'] );
                $this->session->set_userdata('contact_no', $data['contact_no'] );
                $this->session->set_userdata('linkedin', $data['linkedin'] );
                $this->session->set_userdata('website', $data['website'] );
                $this->session->set_userdata('about', $data['about'] );
                $this->session->set_userdata('cname', $data['cname'] );
                $this->session->set_userdata('ctelephone', $data['ctelephone'] );
                $this->session->set_userdata('cemail', $data['cemail'] );

                redirect(base_url().'Company/enter');
            }else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Invalid email or password!</div>');
                redirect(base_url().'Company/Login');
            }

        }else{
            //false
            $this->Login();
        }
    }

    function enter(){
        if ($this->session->userdata('email') != ''){
            $this->load->view('Pages/Company/dashboard');
        } else {
            redirect(base_url().'Company/Login');
        }
    }

    function logout(){
        $this->session->unset_userdata('email');
        redirect(base_url().'Company/Login');
    }

    public function profile_validation(){
        //echo 'OK';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('reg_number', 'Company Registration Number', 'required|alpha_numeric|max_length[8]');
        $this->form_validation->set_rules('country', 'Country', 'required|alpha_numeric');
        $this->form_validation->set_rules('company_type', 'Company Type', 'required');
        $this->form_validation->set_rules('company_size', 'Company Size', 'required');
        //$this->form_validation->set_rules('logo', 'Logo', 'required');
        $this->form_validation->set_rules('hiring_status', 'Hiring Status', 'required');
        //$this->form_validation->set_rules('description', 'Description', 'required');
        //$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telephone', 'Phone Number', 'required|numeric');
        $this->form_validation->set_rules('address', 'Address', 'required');
        //$this->form_validation->set_rules('linkedin', 'Linked In', 'required|valid_url');
        //$this->form_validation->set_rules('website', 'Website', 'required|valid_url');
        $this->form_validation->set_rules('cname', 'Name', 'required');
        $this->form_validation->set_rules('cemail', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('ctelephone', 'Contact Number', 'required|numeric');

        if($this->form_validation->run()){
            //true
            $this->load->model('Company_m');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => base64_encode(strrev(md5($this->input->post('password')))),
                'email' => $this->input->post('email'),
                'company_name' => $this->input->post('company_name'),
                'register_no' => $this->input->post('reg_number'),
                'country' => $this->input->post('country'),
                'type' => $this->input->post('company_type'),
                'size' => $this->input->post('company_size'),
                'logo' => $this->input->post('logo'),
                'hiring_status' => $this->input->post('hiring_status'),
                'about' => $this->input->post('description'),
                'contact_no' => $this->input->post('telephone'),
                'address' => $this->input->post('address'),
                'linkedin' => $this->input->post('linkedin'),
                'website' => $this->input->post('website'),
                'cname' => $this->input->post('cname'),
                'ctelephone' => $this->input->post('ctelephone'),
                'cemail' => $this->input->post('cemail')
            );

            $this->Company_m->insert_profile_data($data);

            redirect(base_url().'Company/inserted_profile');

        }else{
            //false
            $this->createProfile();
        }
    }

    public function inserted_profile(){
        $this->Login();
    }

    function profile(){
        $this->load->view('Pages/Company/profile');
    }
    public function fetch(){
        $this->load->model("Company_m");
        $data["fetch_data"] = $this->Company_m->fetch_data();
    }

    function dashboard(){
        $this->load->view('Pages/Company/dashboard');
    }

    function posted_internships(){
        $this->load->view('Pages/Company/posted_internships');
    }

    function posted_jobs(){
        $this->load->view('Pages/Company/posted_job');
    }

    function employers(){
        $this->load->view('Pages/Company/employers');
    }

    function notifications(){
        $this->load->view('Pages/Company/notifications');
    }
}