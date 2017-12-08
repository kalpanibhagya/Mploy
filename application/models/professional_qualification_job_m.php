<?php

class professional_qualification_job_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    function get_data($applicant_id)
    {

        $this->db->where('applicant_id', $applicant_id);
        $query = $this->db->get('professional_qualification_job');
        $result = $query->row();
        $data = array('applicant_id' => ($result->applicant_id), 'professional_body_id' => ($result->professional_body_id), 'licence_no' => ($result->licence_no),
            'title' => ($result->title), 'valid_from' => ($result->valid_from), 'valide_to' => ($result->valide_to),
            'verify_status' => ($result->verify_status));

        return $data;


    }

}

?>