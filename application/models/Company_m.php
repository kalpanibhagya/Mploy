<?php

class Company_m extends CI_Model{

    public function insert_data($data){
        $this->db->insert('registered_company', $data);
    }

    function can_login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('registered_company');

        if ($query -> num_rows() > 0){
            return true;
        }else {
            return false;
        }
    }

    public function insert_profile_data($data){
        $this->db->insert('registered_company', $data);
    }

    public function fetch_data(){
        $query = $this->db->get("registered_company");
        return $query;
    }
}

?>