<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Company_m','person');
        $this->load->model('Post_job_m','Post_job_m');
        $this->load->model('Post_internship','Post_internship');
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

    //I think this function is useless
    public function Signup(){
        //$this->load->view('Includes/Company/header');
        $this->load->view('Pages/Company/createProfile');
    }

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
            $email = $this->session->userdata('email');
            $this->load->model('Company_m');
            $data = $this->Company_m->get_data($email);
            $this->load->view('Pages/Company/dashboard',$data);
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
        $this->form_validation->set_rules('area', 'Specialized Area', 'required');

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
                'cemail' => $this->input->post('cemail'),
                'area' => $this->input->post('area')
            );

            $this->Company_m->insert_profile_data($data);

            redirect(base_url().'Company/inserted_profile');

        }else{
            //false
            $this->createProfile();
        }
    }

    //to insert data from job details tab
    public function job_validation(){
        $this->load->model('Post_job_m');
        $data = array(
            'job_title' => $this->input->post('name'),
            'contract_type' => $this->input->post('type'),
            'location' => $this->input->post('location'),
            'number_of_opportunities' => $this->input->post('number'),
            'open_date_from' => $this->input->post('from'),
            'open_date_to' => $this->input->post('to'),
            'salary' => $this->input->post('salary'),
            'description'=>$this->input->post('description'),
            'company_id' => $this->session->userdata('company_id')

        );

        $this->Post_job_m->insert_job_data($data);
        redirect(base_url().'Company/job_redirect');}


    //next view after data passed to job_opportunity table
    public function job_redirect(){
        $this->load->view('Pages/Company/job');
    }

    //to insert data from job evaluation critaria tab
    public function evaluation_validation(){
        //get last opportunity id
        $arr = $this->Post_job_m->get_last_opportunity_id();
        $key=$this->get_keyword();
        $last_id = $arr[0]['opportunity_id'];
        $last_id = intval($last_id);

        $this->load->model('weight_board_job_m');
        $data = array(
            'certificate' => $this->input->post('marks1'),
            'deploma' => $this->input->post('marks2'),
            'bachelor' => $this->input->post('marks3'),
            'masters' => $this->input->post('marks4'),
            'phd' => $this->input->post('marks5'),
            'full_time' => $this->input->post('marks6'),
            'part_time' => $this->input->post('marks7'),
            'intern_full_time'=>$this->input->post('marks8'),
            'intern_part_time' => $this->input->post('marks9'),
            'opportunity_id' => $last_id,
            'project' => $this->input->post('marks10'),
            'professional_qualification' => $this->input->post('marks11'),
            'hackathon' => $this->input->post('marks16'),
            'keyword' => $key,
            'society' => $this->input->post('marks17'),
            'volunteering' => $this->input->post('marks18'),
            'sport' => $this->input->post('marks19'),
            'aesthetic' => $this->input->post('marks20'),
            'blogging' => $this->input->post('marks21'),
            'company_id' => $this->session->userdata('company_id'),
            'academic_percent' => $this->input->post('academic_percentage'),
            'experience_percent' => $this->input->post('experience_percentage'),
            'professional_percent' => $this->input->post('pqualification_percentage'),
            'extra_curricular_percent' => $this->input->post('extra_percentage')
        );

        $this->weight_board_job_m->insert_weight($data);
        redirect(base_url().'Company/job_redirect');
    }

    //create string for required skills
    public function get_keyword(){
        $keyword_array=array(
            'v' => 'Java',
            'p' => 'Php',
            'a' => 'Android',
            'c' => 'C',
            'l' => 'C++',
            's' => 'Scrum',
            'j' => 'JavaScript',
            'h' => 'C#',
            'f' => 'Front-End',
            'b' => 'Back-End'
        );
        $selection1 =$this->input->post('selection1');
        $selection2 =$this->input->post('selection2');
        $selection3 =$this->input->post('selection3');
        $data=[$selection1,$selection2,$selection3];
        $data2[]=[3];

        for ($i = 0; $i < 3; $i++) {
            $key = array_search($data[$i], $keyword_array);
            array_push($data2,$key);
        }
        $selection = implode(" ",$data2);
        return $selection;

    }

    //to insert data from inter job details tab
        public function intern_validation(){
            /* $this->load->library('form_validation');
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
             $this->form_validation->set_rules('ctelephone', 'Contact Number', 'required|numeric');*/

            //if($this->form_validation->run()){
            //true    //  type selection_date time description')

            $this->load->model('Post_internship');
            $data = array(
                'job_title' => $this->input->post('name'),
                'contract_type' => $this->input->post('type'),
                'location' => $this->input->post('location'),
                'number_of_opportunities' => $this->input->post('number'),
                'open_date_from' => $this->input->post('from'),
                'open_date_to' => $this->input->post('to'),
                'salary' => $this->input->post('salary'),
                'job_category' => $this->input->post('category'),
                'selection_date' => $this->input->post('selection_date'),
                'selection_time' => $this->input->post('time'),
                'description'=>$this->input->post('description'),
                'company_id' => $this->session->userdata('company_id')

            );

            $this->Post_internship->insert_internship_data($data);

            //$this->load->model('Post_internship');

            redirect(base_url().'Company/intern_redirect');}

        /*}else{
            //false
            $this->createProfile();
        }
    }*/

    //next view after data passed to intern_opportunity table
    public function intern_redirect(){
        $this->load->view('Pages/Company/internship');
    }

    //to insert data from job evaluation critaria tab
    public function intern_evaluation_validation(){
        //get last opportunity id
        $arr = $this->Post_internship->get_last_opportunity_id();
        $key=$this->get_keyword();
        $last_id = $arr[0]['opportunity_id'];
        $last_id = intval($last_id);

        $this->load->model('Weight_board_intern_m');
        $data = array(
            'certificate' => $this->input->post('marks1'),
            'deploma' => $this->input->post('marks2'),
            'bachelor' => $this->input->post('marks3'),
            //'masters' => $this->input->post('marks4'),
            //'phd' => $this->input->post('marks5'),
            //'full_time' => $this->input->post('marks6'),
            //'part_time' => $this->input->post('marks7'),
            'intern_full_time'=>$this->input->post('marks8'),
            'intern_part_time' => $this->input->post('marks9'),
            'opportunity_id' => $last_id,
            'project' => $this->input->post('marks10'),
            'professional_qualification' => $this->input->post('marks11'),
            'hackathon' => $this->input->post('marks16'),
            'keyword' => $key,
            'society' => $this->input->post('marks17'),
            'volunteering' => $this->input->post('marks18'),
            'sport' => $this->input->post('marks19'),
            'aesthetic' => $this->input->post('marks20'),
            'blogging' => $this->input->post('marks21'),
            'company_id' => $this->session->userdata('company_id'),
            'academic_percent' => $this->input->post('academic_percentage'),
            'experience_percent' => $this->input->post('experience_percentage'),
            'professional_percent' => $this->input->post('pqualification_percentage'),
            'extra_curricular_percent' => $this->input->post('extra_percentage')
        );

        $this->Weight_board_intern_m->insert_weight($data);
        redirect(base_url().'Company/intern_redirect');
    }


    public function inserted_profile(){
        $this->Login();
    }

    function profile(){
        $email = $this->session->userdata('email');
        $this->load->model('Company_m');
        $data = $this->Company_m->get_data($email);
        $this->load->view('Pages/Company/profile',$data);
    }

    function dashboard(){
        $this->load->view('Pages/Company/dashboard');
    }

    function posts(){
        $this->load->view('Pages/Company/posts');
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
        $result = $this->person ->showAllEmployers();
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
            $row[] = $person->verified_status;

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

    public function ajax_list_company()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->company_name;
            $row[] = $person->country;
            $row[] = $person->email;
            $row[] = $person->address;
            $row[] = $person->contact_no;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->company_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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

    public function ajax_edit_profile()
    {
        $email = $this->session->userdata('email');
        $data = $this->person->get_by_email($email);
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
            'verified_status' => $this->input->post('verified_status'),
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
            'verified_status' => $this->input->post('verified_status'),
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

    public function list_by_id_company($company_id){

        $data['output'] = $this->person->get_by_id_view($company_id);
        $this->load->view('Pages/Company/view_Detail', $data);
    }

    public function ajax_update_company_info()
    {
        $data = array(
            'username' => $this->input->post('username'),
        );

        $email = $this->session->userdata('email');

        $this->person->update(array('email' =>$email), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_contact_info()
    {
        $data = array(
            'address' => $this->input->post('address'),
            'contact_no' => $this->input->post('contact_no'),
            'linkedin' => $this->input->post('linkedin'),
            'website' => $this->input->post('website'),
        );

        $email = $this->session->userdata('email');

        $this->person->update(array('email' =>$email), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_update_company_details()
    {
        $data = array(
            'company_name' => $this->input->post('company_name'),
            'register_no' => $this->input->post('register_no'),
            'country' => $this->input->post('country'),
            'type' => $this->input->post('type'),
            'size' => $this->input->post('size'),
            'hiring_status' => $this->input->post('hiring_status'),
            'about' => $this->input->post('about'),
        );

        $email = $this->session->userdata('email');

        $this->person->update(array('email' =>$email), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_contact_person()
    {
        $data = array(
            'cname' => $this->input->post('cname'),
            'cemail' => $this->input->post('cemail'),
            'ctelephone' => $this->input->post('ctelephone'),
        );

        $email = $this->session->userdata('email');

        $this->person->update(array('email' =>$email), $data);
        echo json_encode(array("status" => TRUE));
    }



}