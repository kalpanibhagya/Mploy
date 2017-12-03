<?php

class Company_m extends CI_Model{

    public function insert_data($data){
        $this->db->insert('registered_company', $data);
    }

    function can_login($email, $password){
        $this->db->select('*');
        $this->db->from('registered_company');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        if ($query = $this->db->get()){
            return $query->row_array();
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