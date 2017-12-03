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
        $this->db->select('username, first_name, last_name, dob, gender');
        $this->db->where('email', $email);
        $query = $this->db->get('applicant');
        $result = $query->row();


        $data = array('username'=> ($result->username), 'first_name'=> ($result->first_name), 'last_name'=>($result->last_name), 'dob'=>($result->dob), 'gender'=>($result->gender));

        return $data;




    }
}

?>