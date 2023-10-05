<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use SendGrid\Mail\Mail;
// use SendGrid;

class Mailler {
    private $token = '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';
    private $email;
    private $sendGrid;
    private $fromMail;

    function __construct() {
        $this->sendGrid = new SendGrid($this->token);
        $this->CI =& get_instance();
        $this->CI->load->library('monolog');
        $this->fromMail = 'sureshbrilliancetcr@gmail.com';    
        $this->CI->load->database();
    }

    function setContent($array) {
        $this->mail->setTemplateId('d-6af340558c074447a147088ca0b1ed11');

        foreach($array as $key => $val) {
            if (is_array($val)) {
                $question = array_column($val, 'text');
                $options = array_column($val, 'choices');
                $answers = array_column($val, 'answer');
                $choosedanswers = array_column($val, 'choosedAnswer');
                
                foreach ($question as $qk => $ques) {
                    $index = sprintf("question%s", $qk+1);
                    $this->mail->addDynamicTemplateData($index, $ques);

                    $index = sprintf("answer%s", $qk+1);
                    $this->mail->addDynamicTemplateData($index, $answers[$qk]);

                    $index = sprintf("remark%s", $qk+1);
                    if($choosedanswers[$qk] != $answers[$qk]){
                        $remark = sprintf("Wrong! your answer is %s",$choosedanswers[$qk]);
                    } else {
                        $remark = sprintf("Correct Answer!");
                    }
                    $this->mail->addDynamicTemplateData($index, $remark);
                   
                }

                foreach ($options as $ok => $opt) {
                    foreach($opt as $optK => $optV) {
                        $index = sprintf("option%s%s", $ok+1,$optK+1);
                        $this->mail->addDynamicTemplateData($index, $optV);
                    }
                }

            }else{
                $this->mail->addDynamicTemplateData($key, $val);
            }
        }
    }

    private function send($data) {
        try {
            $this->mail = new Mail();
            
            $this->mail->setFrom($data['from']);
            $this->mail->setSubject($data['subject']);
            $this->mail->addTo($data['to']);
            // $this->mail->addTo('nithinmp2k17@gmail.com');
            $this->setContent($data['message']);
            // $this->mail->addContent("text/plain", $data['message']);
            
            $response = $this->sendGrid->send($this->mail);
        } catch (Exception $e) {
            $this->CI->monolog->push(['function' => __class__.'/'.__FUNCTION__, 'user' => '', 'data' => (array) $e]);
        }
    }

    function send_quiz_result(int $insert_id) {
        $query = $this->CI->db->get_where('quiz_req',['quiz_req_id' => $insert_id]);
        if ( isset($query) && $query->num_rows() == 1) {
            $data = $query->row();
            $questions = json_decode($data->questions, TRUE);
            $questions = json_decode($questions, TRUE);
            $answers = json_decode($data->answers, TRUE);
            $answers = json_decode($answers, TRUE);
            foreach($questions as $key => $question){
                $question['choosedAnswer'] = $answers[$key];
                $quiz[] = $question; 

            }

            $data = [
                'from' => $this->fromMail,
                'to' => $data->email,
                'subject' => 'Quiz Result From Brilliance',
                'message' => [
                    'Sender_Name' => 'Brilliance',
                    'name'  => $data->firstname,
                    'score' => $data->score,
                    'loginLink' => site_url(),
                    'questions' => $quiz
                ]
            ];

            $this->send($data);
        }

    }

    function send_staff_index_add(int $insert_id) {
        
    }

    function send_staff_index_update(int $insert_id) {
        
    }

    function send_staff_index_delete(int $insert_id) {
        
    }

    function create(array $payload) {

        $this->CI->monolog->info(['function' => __class__.'/'.__FUNCTION__, 'user' => '', 'status' => 'started']);
        $action = $payload['identifier'];
        $fun = strtolower((sprintf('%s_%s','send',$action)));
        

        $this->$fun($payload['insert_id']);
        $this->CI->monolog->info(['function' => __class__.'/'.__FUNCTION__, 'user' => '', 'status' => 'started']);
        
    }
}