<?php

class Applicant_update_m extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function count_certificate($email){
        $this->db->where('email', $email);
        $query = $this->db->get('job_applicant');
        if ($query -> num_rows() > 0){

        }else {

        }
        //take academic data table and count no of certificates for this applicant
    }

    function update_diploma($applicant_id){
        //take academic data table and count no of diplomas for this applicant
    }
    function update_degree($applicant_id){
        //take academic data table and count no of degrees for this applicant
    }
    function update_master($applicant_id){

    }
    function update_phd($applicant_id){

    }


    function count_work_exp_full($applicant_id){
        //take work experience data table and count no of job-full time for this applicant
        //when adding count++
    }
    function count_work_exp_part($applicant_id){
        //take work experience data table and count no of job-part time for this applicant
    }
    function count_intern_full($applicant_id){
        //take work experience data table and count no of intern-full time for this applicant
    }
    function count_intern_part($applicant_id){
        //take work experience data table and count no of intern-part time for this applicant
    }
    function count_projects($applicant_id){
        //take project data table and count no of projects for this applicant
    }

    function count_professional($applicant_id){
        //take professional data table and count no of professional qualifications for this applicant
    }
    function count_hackathons($applicant_id){
        //take extra curricular data table and count no of hackathons for this applicant
    }
    function count_societies($applicant_id){

    }

    function count_volunteering($applicant_id){

    }

    function count_sports($applicant_id){

    }

    function count_aesthetic($applicant_id){

    }

    function count_blogging($applicant_id){

    }

    function update_academic_nos($applicant_id){
        //update academic qualifications nos. inside the academic qualifications update query
    }

    function update_experiences_nos($applicant_id){
        //update academic qualifications nos. inside the  qualifications update query
    }

    function update_professional_nos($applicant_id){
        //update academic qualifications nos. inside the  qualifications update query
    }

    function update_project_nos($applicant_id){
        //update academic qualifications nos.
    }
    function update_extra_nos($applicant_id){
        //update academic qualifications nos.
    }



}
