<?php

class Applicant_m extends CI_Model{

    var $table = 'applicant';
    var $column = array('fullname','username','dob','gender');
    var $order = array('fullname' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

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
            'dob'=>($result->dob), 'gender'=>($result->gender), 'email'=>($result->email),
            'contact'=>($result->contact), 'address'=>($result->address),
            'preffered_area'=>($result->preffered_area), 'company_one'=>($result->company_one),
            'company_two'=>($result->company_two), 'company_three'=>($result->company_three),
            'password'=>($result->password));

        return $data;


    }
    function get_data_by_email($email){

            $this->db->where('email', $email);
            $query = $this->db->get('applicant');

            return $query->row();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_by_email($email)
    {
        $this->db->from($this->table);
        $this->db->where('email',$email);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

}

?>