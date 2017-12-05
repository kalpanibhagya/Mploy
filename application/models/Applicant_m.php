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


        $data = array('username'=> ($result->username), 'full_name'=> ($result->full_name), 'dob'=>($result->dob), 'gender'=>($result->gender), 'profile_image'=>($result->profile_image), 'cover_image'=>($result->cover_image), 'email'=>($result->email), 'contact'=>($result->contact), 'address'=>($result->address), 'applicant_type'=>($result->applicant_type), 'preffered_area'=>($result->preffered_area), 'company_one'=>($result->company_one), 'company_two'=>($result->company_two), 'company_three'=>($result->company_three), 'password'=>($result->password));

        return $data;




    }
}

?>