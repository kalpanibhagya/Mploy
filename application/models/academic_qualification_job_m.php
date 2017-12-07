<?php

class academic_qualification_job_m extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    function get_data($applicant_id)
    {

        $this->db->where('applicant_id', $applicant_id);
        $query = $this->db->get('academic_qualification_job');
        $result = $query->row();
        $data = array('id'=> ($result->id), 'university'=> ($result->university),
            'degree'=>($result->degree), 'degree_type'=>($result->degree_type), 'date_from'=>($result->date_from),
            'date_to'=>($result->date_to), 'gpa'=>($result->gpa),
            'applicant_id'=>($result->applicant_id));

        return $data;


    }

?>