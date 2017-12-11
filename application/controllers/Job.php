<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Job_m','person');

    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Pages/Applicant/dashboard');
    }


    public function ajax_edit()
    {
        $email = $this->session->userdata('email');
        $data = $this->person->get_by_email($email);
        echo json_encode($data);
    }






    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->username;
            $row[] = $person->full_name;
            $row[] = $person->dob;
            $row[] = $person->gender;
            $row[] = $person->email;
            $row[] = $person->contact;
            $row[] = $person->address;


            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $person->applicant_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person(' . "'" . $person->applicant_id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person(' . "'" . $person->applicant_id . "'" . ')"><i class="glyphicon glyphicon-file"></i> View</a>';

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

    public function ajax_list_intern()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->username;
            $row[] = $person->full_name;
            $row[] = $person->dob;
            $row[] = $person->gender;
            $row[] = $person->email;
            $row[] = $person->contact;
            $row[] = $person->address;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->applicant_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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



    public function ajax_edit_profile()
    {
        $email = $this->session->userdata('email');
        $data = $this->person->get_by_email($email);
        echo json_encode($data);
    }
    public function ajax_edit_intern($applicant_id)
    {
        $data = $this->person->get_by_id($applicant_id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'full_name' => $this->input->post('full_name'),
            'dob' => $this->input->post('dob'),
            'gender' => $this->input->post('gender'),
            'email' => $this->input->post('email'),
            'contact' => $this->input->post('contact'),
            'address' => $this->input->post('address'),
            'password' => $this->input->post('password'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }
    public function ajax_update()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'full_name' => $this->input->post('full_name'),
            'dob' => $this->input->post('dob'),
            'gender' => $this->input->post('gender'),
            'email' => $this->input->post('email'),
            'contact' => $this->input->post('contact'),
            'address' => $this->input->post('address'),
            'password' => $this->input->post('password'),
        );
        $this->person->update(array('applicant_id' => $this->input->post('applicant_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($applicant_id)
    {
        $this->person->delete_by_id($applicant_id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($applicant_id){

        $data['output'] = $this->person->get_by_id_view($applicant_id);
        $this->load->view('Pages/Admin/view_intern', $data);
    }


}
