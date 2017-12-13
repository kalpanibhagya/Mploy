<?php

class Intern_selection extends CI_Model
{
    //var keyword = ''
    //var requitred_no_of_employees

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function run_selection($opportunity_id, $c_id, $weights, $category, $percentage_value)
    {

        //inputs-:
        /*
        opportunity_id,
        array of qualifications and weights,

        */

        //pass keywords, required no of employees and the job id
        //load job applicant table and get job applicant data = applicant_list
        //k = convert keywords into a list
        //foreach in applicant_list{
        //ak = convert applicant_keywords into a list
        //if(match(k,ak)==Trur){
        //remain in the list
        //move to front
        //}else{
        //send to list X
        //X =sort(X)
        //}
        //}
        //applicant_list = applicant_list+X list
        //ranked_list = []
        //foreach in applicant_list{
        //  marks = marks_evaluation(applicant_list[i])
        //}
        // ranked_list = sort(applicant_rank table, total)
        //selected_list = ranked_list[0:(required_no_of_employees-1)]
        //return selected_list;



        $this->load->database();

        $this->db->where('opportunity_id',$opportunity_id);
        $result= $this->db->get('intern_opportunity');

        foreach ($result->result() as $row)
        {
            $weight_id = $row->weight_board_id;
            $type = $row->job_type;
            $c_id = $row->company_id;
        }


        $this->db->where('weight_id',$weight_id);
        $result = $this->db->get('weight_borad_intern');

        foreach ($result->result() as $row)
        {
            $weights['certificate'] = $row->certificate;
            $weights['diploma'] = $row->deploma;
            $weights['bachelor'] = $row->bachelor;
            $weights['intern_full'] = $row->intern_full;
            $weights['intern_part'] = $row->intern_part;
            $weights['project'] = $row->project;
            $weights['hackathon'] = $row->hackathon;
            $weights['keyword'] = $row->keyword;
            $weights['society'] = $row->society;
            $weights['volunteering'] = $row->volunteering;
            $weights['aesthetic'] = $row->aesthetic;
            $weights['sport'] = $row->sport;
            $weights['blogging'] = $row->blogging;

            $percentage_value['academic'] = $row->academic_percent;
            $percentage_value['experience'] = $row->experience_percent;
            $percentage_value['extra'] = $row->extra_curricular_percent;

        }

        $where = array('preffered_area'=>$type, 'keyword'=>$weights['keyword']);

        $this->db->where($where);
        $result =$this->db->get('intern_applicant');

        foreach ($result->result() as $row)
        {

            $id = $row->applicant_id;
            $prefferd = array($row->company_one, $row->company_two, $row->company_three);

            $value1 =
                (
                    ($row->certificate)*$weights['certificate'] +
                    ($row->diploma)*$weights['diploma'] +
                    ($row->degree)*$weights['bachelor']
                    //+ ($row->masters)*$weights['masters'] +
                    //($row->phd)*$weights['phd']
                )*$percentage_value['academic']
                +
                (
                    ( //($row->work_full)*$weights['job_full'] +
                        //($row->work_part)*$weights['job_part'] +
                        ($row->intern_full)*$weights['intern_full'] +
                        ($row->intern_part)*$weights['intern_part'] +
                        ($row->project)*$weights['project'])*$percentage_value['experience']
                )+
                (
                    (($row->hackathon)*$weights['hackathon'] +
                        ($row->society)*$weights['society'] +
                        ($row->volunteering)*$weights['volunteering'] +
                        ($row->sport)*$weights['sport'] +
                        ($row->easthitic)*$weights['aesthetic'] +
                        ($row->blogging)*$weights['blogging'] )* $percentage_value['extra']

                );

            //if ()

            $value_array[$id] = $value1; //append data to array. (id => value)
        }



    }
}
?>