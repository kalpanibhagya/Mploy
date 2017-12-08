<?php

class job_selection extends CI_Model{
    //var keyword = ''
    //var requitred_no_of_employees

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function run_selection(){
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

    }
}