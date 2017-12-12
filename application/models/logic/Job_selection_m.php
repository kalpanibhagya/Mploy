<?php

class Job_selection_m extends CI_Model
{
    //var keyword = ''
    //var requitred_no_of_employees

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function run_selection($opportunity_id){

        $this->load->database();

        //$this->db->select('weight_board_id');
        //$this->db->from('job_opportunity');
        $this->db->where('opportunity_id',$opportunity_id);
        $result= $this->db->get('job_opportunity');

        foreach ($result->result() as $row)
        {
            $weight_id = $row->weight_board_id;
        }


        $this->db->where('weight_id',$weight_id);
        $result = $this->db->get('weight_board_job');

        foreach ($result->result() as $row)
        {
            $weights['certificate'] = $row->certificate;
            $weights['diploma'] = $row->deploma;
            $weights['bachelor'] = $row->bachelor;
            $weights['masters'] = $row->masters;
            $weights['phd'] = $row->phd;
            $weights['job_full'] = $row->job_full;
            $weights['job_part'] = $row->job_part;
            $weights['intern_full'] = $row->intern_full;
            $weights['intern_part'] = $row->intern_part;
            $weights['project'] = $row->project;
            //$weights['professional'] = $row->job_full;
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



        $value_array = array(); //array to store total values and applicant id's

        $this->db->select('applicant_id');
        $this->db->where('opportunity_id',$opportunity_id);
        $query1 = $this->db->get('applicant_rank_job'); //get applicant id's of applicants who have applied to  the opportunity

        $this->load->model('Applicant_m','Applicant');

        foreach ($query1->result() as $row1)
        {
            $id = $row1->applicant_id;


            $this->db->select('certificate,
                diploma,
                degree,
                masters,
                phd,
                work_full,
                work_part,
                intern_full,
                intern_part,
                project,
                hackathon,
                keyword,
                society,
                volunteering,
                sport,
                easthitic,
                blogging');

            $where = array('keyword' => $weights['keyword'],'applicant_id' =>$id);

           $this->db->where($where);

            //$this->db->where('applicant_id',$id);

            $query2 = $this->db->get('job_applicant'); //get data related to each applicant

            foreach ($query2->result() as $row2)
            {
                $value1 =
                    (
                        ($row2->certificate)*$weights['certificate'] +
                        ($row2->diploma)*$weights['diploma'] +
                        ($row2->degree)*$weights['bachelor'] +
                        ($row2->masters)*$weights['masters'] +
                        ($row2->phd)*$weights['phd']
                    )*$percentage_value['academic']
                     +
                    (
                        ( ($row2->work_full)*$weights['job_full'] +
                        ($row2->work_part)*$weights['job_part'] +
                        ($row2->intern_full)*$weights['intern_full'] +
                            ($row2->intern_part)*$weights['intern_part'] +
                        ($row2->project)*$weights['project'])*$percentage_value['experience']
                    )+
                    (
                    (($row2->hackathon)*$weights['hackathon'] +
                    ($row2->society)*$weights['society'] +
                    ($row2->volunteering)*$weights['volunteering'] +
                    ($row2->sport)*$weights['sport'] +
                    ($row2->easthitic)*$weights['aesthetic'] +
                    ($row2->blogging)*$weights['blogging'] )* $percentage_value['extra']

                    );


                $value_array[$id] = $value1; //append data to array. (id => value)

            }

        }

        $length = count($value_array);

        for ($i=0;$i < $length;$i++)
        {

            $current_max = max($value_array); //get current max

            $max_key = array_search($current_max,$value_array);

            $applicant_id = $max_key;
            $rank = $i +1;

            $data = array('rank'=>$rank, 'total_score'=>$current_max);

            $where = array('applicant_id'=>$applicant_id, 'opportunity_id'=>$opportunity_id);
            $this->db->where($where);
            $this->db->update('applicant_rank_job',$data);

            unset($value_array[$max_key]); //remove the current max
        }


        return array('o_id' => $opportunity_id);

    }

}