<?php

class Weighing_algo extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_qualification_no($applicant_id){
        //get row qualification nos.
        //return an array 'a'
    }

    function get_weights($applicant_id){
        //return an array 'b'
    }

    function get_academic_percentage($applicant_id){

    }
    function get_professional_percentage($applicant_id){

    }

    function get_experience_percentage($applicant_id){

    }

    function get_extra_percentage($applicant_id){

    }

    function marks_calculation($applicant_id){
        // for each element in array a
        // a[i] = a[i]*b[i]
        // store the total in applicant rank table with respect to the applicant id.
    }


}