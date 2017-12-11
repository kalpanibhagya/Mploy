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

    function run_selection($opportunity_id, $c_id, $weights,$category, $percentage_value)
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

        $value_array = array(); //array to store total values and applicant id's


        //$this->db->select('job_category');
        //$this->db->where('opportunity_id',$opportunity_id);

        //$category = $this->db->get('intern_opportunity');

        //$this->db->select('company_id');
        //$this->db->where('opportunity_id',$opportunity_id);

        //$c_id = $this->db->get('intern_opportunity');

        $this->db->select('company_name');
        $this->db->where('company_id',$c_id);

        $c_name = $this->db->get('registered_company');

        $where = array('preffered_area'=> $category, 'keyword'=>$weights['keyword']);

        $this->db->select('applicant_id',
            'certificate,
                diploma,
                degree,
                prefferd_area,
                company_one,
                company_two,
                comany_three,
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

        $this->db->where($where);
        $query1 = $this->db->get('intern_applicant'); //get applicant id's of applicants who have applied to  the opportunity


        $this->load->model('Applicant_m', 'Applicant');

        foreach ($query1->result() as $row1) {
            $id = $row1->applicant_id;


            $value1 =
                (
                    ($row1->certificate) * $weights['certificate'] +
                    ($row1->diploma) * $weights['diploma'] +
                    ($row1->degree) * $weights['degree']
                ) * $percentage_value['academic']
                +
                (
                    (($row1->intern_full) * $weights['intern_full'] +
                        ($row1->intern_part) * $weights['intern_part'] +
                        ($row1->project) * $weights['project']) * $percentage_value['experience']
                ) +
                (
                    (($row1->hackathon) * $weights['hackathon'] +
                        ($row1->society) * $weights['society'] +
                        ($row1->volunteering) * $weights['volunteering'] +
                        ($row1->sport) * $weights['sport'] +
                        ($row1->easthitic) * $weights['easthitic'] +
                        ($row1->blogging) * $weights['blogging']) * $percentage_value['extra']

                );


            if (($row1->company_one == $c_name) || ($row1->company_one == $c_name) || ($row1->company_three == $c_name) )
            {
                $preffered_list[$id] = $value1;
            }
            else
            {
                $normal_list[$id] = $value1;
            }

        }

        $length_prefrred = count($preffered_list);
        $length_normal = count($normal_list);


        for ($i = 0; $i < $length_prefrred; $i++) {

            $current_max = max($preffered_list); //get current max

            $max_key = array_search($current_max, $preffered_list);

            $applicant_id = $max_key;
            $rank = $i + 1;

            $data = array('rank' => $rank, 'total_score' => $current_max, 'opportunity_id'=>$c_id, 'applicant_id'=>$applicant_id);
            $this->db->insert('applicant_rank_job', $data);

            unset($preffered_list[$max_key]); //remove the current max
        }

        $j = $length_prefrred;

        for ($k = 0; $k<$length_normal;$k++)
        {
            $current_max = max($normal_list); //get current max

            $max_key = array_search($current_max, $normal_list);

            $applicant_id = $max_key;
            $rank = $j + 1;

            $data = array('rank' => $rank, 'total_score' => $current_max, 'opportunity_id'=>$c_id, 'applicant_id'=>$applicant_id);
            $this->db->insert('applicant_rank_job', $data);

            unset($normal_list[$max_key]);

            $j = $j+1;

        }

        //return $value_array;
    }
}

?>