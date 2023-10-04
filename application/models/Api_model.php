<?php

class Api_model extends CI_Model
{

    public function getQuestions($lang)
    {
        $result = [];
        $questions = $this->db->select('question,option1,option2,option3,option4,answer')->get_where('question',[])->result_array();
        foreach ($questions as $key => $question) {
            $row['question'] = $question['question'];
            $row['options'] = [
                $question['option1'],
                $question['option2'],
                $question['option3'],
                $question['option4'],
            ];
            $row['answer'] = $question['answer'];
            $result[] = $row;
        }
        return $result;
    }

    public function getQuiz($count, $lang)
    {
        $result = [];
        $this->db->order_by('RAND()');
        $this->db->limit($count);
        $questions = $this->db->select('question,option1,option2,option3,option4,answer,question_type')->get_where('question',['enabled_for_quiz' => true])->result_array();
        foreach ($questions as $key => $question) {
            $row['question'] = $question['question'];
            $row['options'] = [
                $question['option1'],
                $question['option2'],
                $question['option3'],
                $question['option4'],
            ];
            $row['answer'] = $question[$question['answer']];
            $row['question_type'] = $question['question_type'];
            $result[] = $row;
        }
        return $result;
    }
}
