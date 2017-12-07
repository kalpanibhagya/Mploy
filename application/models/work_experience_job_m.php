<?php

class work_experience_job_m extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    function get_data($applicant_id)
    {

        $this->db->where('applicant_id', $applicant_id);
        $query = $this->db->get('work_experience_job');
        $result = $query->row();
        $data = array('job_title'=> ($result->job_title), 'contract_type'=> ($result->contract_type),
            'company_name'=>($result->company_name), 'date_from'=>($result->date_from), 'date_to'=>($result->date_to),
            'company_website'=>($result->company_website), 'company_country'=>($result->company_country),
            'applicant_id'=>($result->applicant_id));

        return $data;


    }

?>