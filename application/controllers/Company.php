<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function Login(){
        $this->load->view('Includes/Company/header');
        $this->load->view('Pages/Company/Login');
    }

    public function Signup(){
        $this->load->view('Includes/Company/header');
        $this->load->view('Pages/Company/Signup');
    }
    public function form_validation(){
        //echo 'OK';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
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
        $this->Signup();
    }

    function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if($this->form_validation->run()){
            //true

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('Company_m');
            if ($this->Company_m->can_login($email, $password)){
                $session_data = array(
                    'email' => $email
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'Company/enter');
            }else {
                $this->session->set_flashdata('error', 'Invalid username or password!');
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
}