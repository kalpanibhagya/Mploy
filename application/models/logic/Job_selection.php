<?php

class Job_selection extends CI_Model{
    //var keyword = ''
    //var requitred_no_of_employees

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function run_selection($opportunity_id,$weights, $percentage_value){

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
                        ($row2->degree)*$weights['degree'] +
                        ($row2->masters)*$weights['masters'] +
                        ($row2->phd)*$weights['phd']
                    )*$percentage_value['academic']
                     +
                    (
                        ( ($row2->work_full)*$weights['work_full'] +
                        ($row2->work_part)*$weights['work_part'] +
                        ($row2->intern_full)*$weights['intern_full'] +
                            ($row2->intern_part)*$weights['intern_part'] +
                        ($row2->project)*$weights['project'])*$percentage_value['experience']
                    )+
                    (
                    (($row2->hackathon)*$weights['hackathon'] +
                    ($row2->society)*$weights['society'] +
                    ($row2->volunteering)*$weights['volunteering'] +
                    ($row2->sport)*$weights['sport'] +
                    ($row2->easthitic)*$weights['easthitic'] +
                    ($row2->blogging)*$weights['blogging'] )* $percentage_value['extra']

                    );

//                array_push($value_array, $id => $value1);
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

            $data = array('rank'=>$rank, 'total_score'=>$current_max);  //update
                                                                        //rank
            $this->db->where('applicant_id',$applicant_id);            //in the
            $this->db->update('applicant_rank_job',$data);             // database

            unset($value_array[$max_key]); //remove the current max
        }


        return $value_array;

    }

}