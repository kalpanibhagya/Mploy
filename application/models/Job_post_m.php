<?php

class Job_post_m extends CI_Model{

    var $table = 'job_opportunity';
    var $column = array('job_title','company_id','location','open_date_to','contract_type','salary');
    var $order = array('opportunity_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

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

    public function get_by_id($opportunity_id)
    {
        $this->db->from($this->table);
        $this->db->where('$opportunity_id',$opportunity_id);
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

    public function delete_by_id($opportunity_id)
    {
        $this->db->where('opportunity_id', $opportunity_id);
        $this->db->delete($this->table);
    }

    public function get_by_id_view($opportunity_id)
    {
        $this->db->from($this->table);
        $this->db->where('opportunity_id',$opportunity_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
    }

    function get_by_email($email)
    {
        $this->db->from($this->table);
        $this->db->where('email',$email);
        $query = $this->db->get();

        return $query->row();
    }

    public function showAllJobs(){
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
}
