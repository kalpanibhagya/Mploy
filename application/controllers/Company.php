<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Company_m','person');

    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Pages/Company/dashboard');
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
        $this->form_validation->set_rules('linkedin', 'Linked In', 'required|valid_url');
        $this->form_validation->set_rules('website', 'Website', 'required|valid_url');
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

    function post_a_job(){
        $this->load->view('Pages/Company/job');
    }

    function post_an_internship(){
        $this->load->view('Pages/Company/internship');
    }

    function employers(){
        $this->load->view('Pages/Company/employers');
    }

    function notifications(){
        $this->load->view('Pages/Company/notifications');
    }

    public function showAllEmployers(){
        $result = $this->m->showAllEmployers();
        echo json_encode($result);
    }

    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->company_name;
            $row[] = $person->register_no;
            $row[] = $person->country;
            $row[] = $person->email;
            $row[] = $person->address;
            $row[] = $person->contact_no;
            $row[] = $person->hiring_status;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->company_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->company_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->company_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->person->count_all(),
            "recordsFiltered" => $this->person->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_min()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->company_name;
            $row[] = $person->register_no;
            $row[] = $person->verified_status;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->company_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->company_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->person->count_all(),
            "recordsFiltered" => $this->person->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($company_id)
    {
        $data = $this->person->get_by_id($company_id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'company_name' => $this->input->post('company_name'),
            'register_no' => $this->input->post('register_no'),
            'country' => $this->input->post('country'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'contact_no' => $this->input->post('contact_no'),
            'hiring_status' => $this->input->post('hiring_status'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
            'company_name' => $this->input->post('company_name'),
            'register_no' => $this->input->post('register_no'),
            'country' => $this->input->post('country'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'contact_no' => $this->input->post('contact_no'),
            'hiring_status' => $this->input->post('hiring_status'),
        );
        $this->person->update(array('company_id' => $this->input->post('company_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_min()
    {
        $data = array(
            'company_name' => $this->input->post('company_name'),
            'register_no' => $this->input->post('register_no'),
            'verified_status' => $this->input->post('verified_status'),
        );
        $this->person->update(array('company_id' => $this->input->post('company_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($company_id)
    {
        $this->person->delete_by_id($company_id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($company_id){

        $data['output'] = $this->person->get_by_id_view($company_id);
        $this->load->view('Pages/Admin/view_Detail', $data);
    }
}