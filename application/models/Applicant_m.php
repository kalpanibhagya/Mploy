<?php

class Applicant_m extends CI_Model{

    public function insert_data($data){
        $this->db->insert('applicant', $data);
    }

    function can_login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('applicant');

        if ($query -> num_rows() > 0){
            return true;
        }else {
            return false;
        }
    }

    function get_data($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('applicant');
        $result = $query->row();


        $data = array('username'=> ($result->username), 'full_name'=> ($result->full_name),
            'dob'=>($result->dob), 'gender'=>($result->gender),
            'age'=>($result->age), 'address'=>($result->address),
            'contact'=>($result->contact),'preffered_area'=>($result->preffered_area),
            'comp_1'=>($result->company_one), 'comp_2'=>($result->company_two), 'comp_3'=>($result->company_three));

        return $data;

    }
}

?>