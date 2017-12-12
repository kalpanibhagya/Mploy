<?php

class Job_m extends CI_Model{

    var $table = 'job_applicant';

    var $column = array('full_name','username','dob','gender','email','contact','address');
    var $order = array('applicant_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    public function insert_intern($data){
        $this->db->insert('intern_applicant', $data);
    }

    public function insert_job($data){
        $this->db->insert('job_applicant', $data);
    }

    function can_login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query1 = $this->db->get('intern_applicant');
        $query2 = $this->db->get('job_applicant');
        if ($query1 or $query2-> num_rows() > 0){
            return true;
        }else {
            return false;
        }
    }

    function get_data($email)
    {
        $this->db->where('email', $email);

        $query1 = $this->db->get('intern_applicant');
        $this->db->where('email', $email);
        $query2 = $this->db->get('job_applicant');
        if ($query1->num_rows()>0){

            $result = $query1->row();
            $data = array('username'=> ($result->username), 'full_name'=> ($result->full_name),
                'dob'=>($result->dob), 'gender'=>($result->gender), 'email'=>($result->email),
                'contact'=>($result->contact), 'address'=>($result->address),
                'preffered_area'=>($result->preffered_area), 'company_one'=>($result->company_one),
                'company_two'=>($result->company_two), 'company_three'=>($result->company_three),
                'password'=>($result->password));

            return $data;

        }elseif ($query2->num_rows()>0){
            $result = $query2->row();
            $data = array('username'=> ($result->username), 'full_name'=> ($result->full_name),
                'dob'=>($result->dob), 'gender'=>($result->gender), 'email'=>($result->email),
                'contact'=>($result->contact), 'address'=>($result->address),
                'password'=>($result->password));

            return $data;
        }


    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
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

    function get_data_by_email($email){

        $this->db->where('email', $email);
        $query = $this->db->get('intern_applicant');

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



    public function get_by_id($applicant_id)
    {
        $this->db->from($this->table);
        $this->db->where('applicant_id', $applicant_id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_id_view($applicant_id)
    {
        $this->db->from($this->table);
        $this->db->where('applicant_id',$applicant_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
    }

    public function delete_by_id($applicant_id)
    {
        $this->db->where('applicant_id', $applicant_id);
        $this->db->delete($this->table);
    }

}

?>