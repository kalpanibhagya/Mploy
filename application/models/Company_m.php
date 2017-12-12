<?php

class Company_m extends CI_Model{

    var $table = 'registered_company';
    var $column = array('company_name','register_no','country','email','address','contact_no','hiring_status');
    var $order = array('company_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

    }

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

    public function showAllEmployers(){
        //$this->db->order_by('created_at', 'desc');
        $query = $this->db->get('registered_company');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
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

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($company_id)
    {
        $this->db->from($this->table);
        $this->db->where('company_id',$company_id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($company_id)
    {
        $this->db->where('company_id', $company_id);
        $this->db->delete($this->table);
    }

    public function get_by_id_view($company_id)
    {
        $this->db->from($this->table);
        $this->db->where('company_id',$company_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
    }

    function get_data($email)
    {
        $this->db->select('username, email, password, logo, company_name, register_no, country, type, size, hiring_status, address, contact_no, linkedin, website, cname, cemail, ctelephone, about');
        $this->db->where('email', $email);
        $query = $this->db->get('registered_company');
        $result = $query->row();


        $data = array('username'=> ($result->username), 'email'=>($result->email), 'password'=>($result->password), 'logo'=>($result->logo), 'company_name'=>($result->company_name), 'register_no'=>($result->register_no), 'country'=>($result->country), 'type'=>($result->type), 'size'=>($result->size), 'hiring_status'=>($result->hiring_status), 'address'=>($result->address), 'contact_no'=>($result->contact_no), 'linkedin'=>($result->linkedin), 'website'=>($result->website), 'cname'=>($result->cname), 'cemail'=>($result->cemail), 'ctelephone'=>($result->ctelephone), 'about'=>($result->about));

        return $data;
    }

    function get_by_email($email)
    {
        $this->db->from($this->table);
        $this->db->where('email',$email);
        $query = $this->db->get();

        return $query->row();
    }

}
