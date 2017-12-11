<?php

class Selection_test extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->model('','qualification');

    }

    public function test()
    {

        $weights = array('certificate'=>2,
            'diploma'=>2,
            'degree'=>2,
            'masters'=>2,
            'phd'=>2,
            'work_full'=>2,
            'work_part'=>2,
            'intern_full'=>2,
            'intern_part'=>2,
            'project'=>2,
            'hackathon'=>2,
            'keyword'=>'t',
            'society'=>2,
            'volunteering'=>2,
            'sport'=>2,
            'easthitic'=>2,
            'blogging'=>2);

        $percentage_value = array('academic'=>2, 'experience'=>2, 'extra'=>2);



        $this->load->model('logic/Job_selection','Selection');


        $data = $this->Selection->run_selection('15',$weights,$percentage_value);

        $this->load->view('selection',$data);
    }
}