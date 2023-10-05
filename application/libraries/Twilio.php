<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Twilio\Rest\Client;

class Twilio {
    private $accountSid = 'AC2fc756128a63c34f30e7bdc9b8bc7a75';
    private $authToken = 'b3e0aa09eca15fb0c85f3e43c0971d20';
    private $twilio;

    function __construct() {
        $this->twilio = new Client($this->accountSid, $this->authToken);
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->library('monolog'); 
    }

    function create(array $payload) {
        $this->CI->monolog->info(['function' => __class__.'/'.__FUNCTION__, 'user' => '', 'status' => 'started']);

        if ($payload['identifier'] === 'quiz' ) {
            $query = $this->CI->db->get_where('quiz_req',['quiz_req_id' => $payload['insert_id']]);
            if ( isset($query) && $query->num_rows() == 1) {
                $data = $query->row();

                $to = '+91'.$data->mobile;
                $body =sprintf('%s is your OTP',$data->otp);
            }

            $messagingServiceSid = 'MG587b59a71ac9a78314cb3dbd43b7ec6c';
        }

        if ($payload['identifier'] === 'validate_otp' ) {
            $query = $this->CI->db->get_where('quiz_req',['quiz_req_id' => $payload['insert_id']]);
            if ( isset($query) && $query->num_rows() == 1) {
                $data = $query->row();

                $to = '+91'.$data->mobile;
                // $body =sprintf('Hi %s, Please check your response %s', 'name', 'link');
                $body =sprintf('Hi %s, Your score is %s /n, Try out free quiz to improve %s ', 'name', $data->score, '<a href> here</a>');
            }

            $messagingServiceSid = 'MG587b59a71ac9a78314cb3dbd43b7ec6c';
        }

        try {
            $message = $this->twilio->messages->create(
                $to, // Recipient's phone number
                [
                    'messagingServiceSid' => $messagingServiceSid, // Your Twilio phone number
                    'body' => $body,
                ]
            );

            $this->CI->monolog->info(['function' => __class__.'/'.__FUNCTION__, 'user' => '', 'status' => 'started']);

        } catch (\Throwable $th) {
            $this->CI->monolog->push(['function' => __class__.'/'.__FUNCTION__, 'user' => '', 'data' => (array) $th]);
        }        
        
    }
}