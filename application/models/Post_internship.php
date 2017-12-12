<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08/12/2017
 * Time: 01:07 PM
 */
class Post_internship extends CI_Model{

    /*var $table = 'intern_opportunity';
    var $column = array('job_title','job_category','location','salary','open_date_to');
    var $order = array('opportunity_id' => 'desc');*/

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
       // $this->load->library('session');

    }

    /*public function insert_data($data){
        $this->db->insert('intern_opportunity', $data);
    }*/
    public function insert_internship_data($data){
        $this->db->insert('intern_opportunity', $data);
    }

    public function get_last_opportunity_id(){

        $query ="select opportunity_id from intern_opportunity order by opportunity_id DESC limit 1";

        $res = $this->db->query($query);

        if($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }

    public function getPostedInternships($companyID){
        $query = $this->db->query("select opportunity_id, job_title,job_category,location,salary,open_date_to from intern_opportunity where company_id=$companyID");
        $res = $query->result();
        return $res;
    }

    public function deleteInternShip($id){
//        $query = $this->db->query("delete from intern_opportunity where opportunity_id=$id");
//        $res = $query->result();
//        return $res;


        $this->db->where( 'opportunity_id', $id );
        $this->db->delete( 'intern_opportunity' );

        if ( $this->db->affected_rows() == '1' ) {return TRUE;}
        else {return FALSE;}
    }



    /*function get_datatables($company_id)
    {
        $query = $this->db->query("job_title,job_category,location,salary,open_date_to from intern_opportunity where company_id=2;");
        $ary = array();
        foreach ($query->result('Post_internship') as $post)
        {
            array_push($ary,$post);
        }
        return $query->result();
        //return $ary;

    }*/

   /* private function _get_datatables_query($company_id)
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
    }*/



   /* public function get_by_id($company_id)
    {
       /* $this->db->from($this->table);
        $this->db->where('company_id',$company_id);
        $query = $this->db->get();

        return $query->row();*/

        /*$query ="select job_title,job_category,location,salary,open_date_to from intern_opportunity where company_id=2";

        $res = $this->db->query($query);

        $row = $res->row_array();
        //var_dump($row);
        if (isset($row))
        {
            echo $row['job_title'];
            echo $row['job_category'];
            echo $row['location'];
        }
        return $row;
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

    public function get_by_id_view($company_id)
    {
        $this->db->from($this->table);
        $this->db->where('company_id',$company_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
    }*/
}
