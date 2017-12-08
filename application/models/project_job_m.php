<?php

class project_job_m extends CI_Model
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
        $query = $this->db->get('project_job');
        $result = $query->row();
        $data = array('project_id' => ($result->project_id), 'name' => ($result->name),
            'type' => ($result->type), 'date_from' => ($result->date_from), 'date_to' => ($result->date_to),
            'github' => ($result->github), 'description' => ($result->description),
            'applicant_id' => ($result->applicant_id));

        return $data;


    }
}

?>