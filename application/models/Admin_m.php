<?php

class Admin_m extends CI_Model{

    function can_login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('administrator');

        if ($query -> num_rows() > 0){
            return true;
        }else {
            return false;
        }
    }
}

?>