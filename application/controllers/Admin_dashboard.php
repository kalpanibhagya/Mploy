<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_m','person');
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

    public function ajax_edit($company_id)
    {
        $data = $this->person->get_by_id($company_id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'company_name' => $this->input->post('firstName'),
            'register_no' => $this->input->post('lastName'),
            'country' => $this->input->post('gender'),
            'email' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'contact_no' => $this->input->post('dob'),
            'hiring_status' => $this->input->post('hiring_status'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
            'company_name' => $this->input->post('firstName'),
            'register_no' => $this->input->post('lastName'),
            'country' => $this->input->post('gender'),
            'email' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'contact_no' => $this->input->post('dob'),
            'hiring_status' => $this->input->post('hiring_status'),
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