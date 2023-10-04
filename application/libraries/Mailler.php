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

    private function send($data) {
        try {
            $this->mail = new Mail();
            
            $this->mail->setFrom($data['from']);
            $this->mail->setSubject($data['subject']);
            $this->mail->addTo($data['to']);
            // $this->mail->addTo('nithinmp2k17@gmail.com');
            $this->mail->addContent("text/plain", $data['message']);
            
            $response = $this->sendGrid->send($this->mail);
        } catch (Exception $e) {
            $this->CI->monolog->push(['function' => __class__.'/'.__FUNCTION__, 'user' => '', 'data' => (array) $e]);
        }
    }

    function send_quiz_result(int $insert_id) {
        $query = $this->CI->db->get_where('quiz_req',['quiz_req_id' => $insert_id]);
        if ( isset($query) && $query->num_rows() == 1) {
            $data = $query->row();

            $data = [
                'from' => $this->fromMail,
                'to' => $data->email,
                'subject' => 'Quiz Result From Brilliance',
                'message' => sprintf('Hi %s,  Your Quiz Result is %s. Try free quiz and improve <a>here</a>', $data->firstname, $data->score)
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