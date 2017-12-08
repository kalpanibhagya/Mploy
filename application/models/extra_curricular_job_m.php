<?php

class extra_curricular_job_m extends CI_Model
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
        $query = $this->db->get('extra_curricular_job');
        $result = $query->row();
        $data = array('extra_id' => ($result->extra_id), 'applicant_id' => ($result->applicant_id), 'name' => ($result->name),
            'description' => ($result->description));

        return $data;


    }
}

?>