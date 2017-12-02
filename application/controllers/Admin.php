<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function Index(){
        $this->load->view('Includes/Admin/header');
        $this->load->view('Pages/Admin/Login');
    }
    function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if($this->form_validation->run()){
            //true

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('Admin_m');
            if ($this->Admin_m->can_login($email, $password)){
                $session_data = array(
                    'email' => $email
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'Admin/enter');
            }else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Invalid email or password!</div>');
                redirect(base_url().'Admin');
            }

        }else{
            //false
            $this->Index();
        }
    }

    function enter(){
        if ($this->session->userdata('email') != ''){
            $this->load->view('Pages/Admin/dashboard');
        } else {
            redirect(base_url().'Admin');
        }
    }

    function logout(){
        $this->session->unset_userdata('email');
        redirect(base_url().'Admin');
    }

    function addAdmin(){

    }

    function dashboard(){
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

    function notifications(){
        $this->load->view('Pages/Admin/notifications');
    }
}