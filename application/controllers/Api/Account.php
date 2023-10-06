<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Account extends REST_Controller
{

    private $decodeData;

    public function __construct()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL & ~E_DEPRECATED);
        parent::__construct();
        $this->load->library('input');
        $this->load->library('form_validation');
        $this->load->library('response');
        $this->load->library('monolog');
        $this->load->library('twilio');
        $this->load->library('mailler');
    }

    public function login_post() {
        $this->load->library('form_validation');
        $_POST = $input;

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() === false) {
            $errors = validation_errors();
            $this->response->apiResponse(
                [
                    'status' => false,
                    'message' => 'input validation failed',
                    'data'=> $errors
                ]
            );
        }

        $query = $this->db->get_where('users',['email' => $input['email']
        , 'password' => $input['password']]);

        if ($query->num_rows() > 0) {
            $account = $query->row();
            echo "<pre>";print_r($account);die;

        } else {
            $this->response->apiResponse(
                [
                    'status' => false,
                    'code' => 401,
                    'message' => 'authentication failed',
                    'data'=> $errors
                ]
            );
        }

    }

    private function receiveJsonData() {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            $this->response->apiResponse(
                [
                    'status' => false,
                    'message' => 'Invalid Json'
                ]
            );
        }
        return $data;
    }

    private function ipDet(string $ip) : array {
        $this->monolog->info(['function' => __FUNCTION__, 'user' => '', 'status' => 'started']);
        $data = [];
        $ipInfo = file_get_contents("http://ipinfo.io/{$ip}/json");
        try {
            if (isset($ipInfo) && $ipInfo != '') {
                $ipInfoData = json_decode($ipInfo);
                if (isset($ipInfoData) && !empty($ipInfoData)) {
                    $data['city'] = $ipInfoData->city;
                    $data['region'] = $ipInfoData->region;
                    $data['country'] = $ipInfoData->country;
                }
            }
        } catch (\Throwable $th) {
            $this->monolog->push((array) $th);
        }
        
        $this->monolog->info(['function' => __FUNCTION__, 'user' => '', 'status' => 'completed']);

        return $data;
    }
    
    private function addQuizData(object $input) : int {
        $data = [
            'user_agent' => $_SERVER['HTTP_USER_AGENT'], 
            'ipaddress' => $_SERVER['REMOTE_ADDR'],
            // 'ipaddress' => '61.135.188.23',
            'mobile' => $input->mobile,
            'firstname' => $input->name,
            'email' => $input->email,
            'score' => $input->score,
            'questions' => json_encode($input->questions),
            'answers' => json_encode($input->answers),
            'otp' => rand(1000, 9999) 
        ];
        $ipDet = $this->ipDet($data['ipaddress']);

        if (isset($ipDet) && !empty($ipDet)) {
            $data['city'] = $ipDet['city'];
            $data['region'] = $ipDet['region'];
            $data['country'] = $ipDet['country'];
        }
        $this->db->insert('quiz_req', $data);

        return $this->db->insert_id();
    }

    function getOtp_post() {
        $input = $this->receiveJsonData();

        if(isset($input->identifier) && $input->identifier == 'quiz' ){
            $insert_id = $this->addQuizData($input);
        }
        
        $this->twilio->create(['identifier' => $input->identifier,'insert_id' => $insert_id]);

        $this->response(
            [
                'status' => true,
            ]
            , REST_Controller::HTTP_OK); 
    }
    
    function checkOtp_post() {

        $input = $this->receiveJsonData();
        $quiz_req = $this->db->get_where('quiz_req',['mobile' => $input->mobile, 'otp' => $input->otp])->row();
        if (empty($quiz_req)) {
            $this->response(
                [
                    'status' => false,
                ]
                , REST_Controller::HTTP_OK); 
        }

        $specificTimestamp = strtotime($quiz_req->updated_at);

        $currentTimestamp = time();

        $timeDifference = $currentTimestamp - $specificTimestamp;
        // echo $timeDifference;die;
         
        if ($timeDifference > 30 ) {
            $this->response(
                [
                    'status' => false,
                    'data' => [
                        'message' => 'OTP Expired'
                    ]
                ]
                , REST_Controller::HTTP_OK);
        } else {
            $this->mailler->create(['identifier' => 'quiz_result','insert_id' => $quiz_req->quiz_req_id]);

            $this->response(
                [
                    'status' => true,
                ]
                , REST_Controller::HTTP_OK); 
        }

    }

    function quizResult_post() {
        $input = $this->receiveJsonData();
        $quiz_req = $this->db->get_where('quiz_req',['mobile' => $input->mobile, 'otp' => $input->otp])->row();
        if (empty($quiz_req)) {
            $this->response(
                [
                    'status' => false,
                ]
                , REST_Controller::HTTP_OK); 
        }

        $this->response(
            [
                'status' => true,
                'data' => [
                    'city' => $quiz_req->city,
                    'region' => $quiz_req->region,
                    'country' => $quiz_req->country,
                    'score' => $quiz_req->score,
                    'mobile' => $quiz_req->mobile,
                    'email' => $quiz_req->email,
                    'firstname' => $quiz_req->firstname,
                    'questions' => json_decode($quiz_req->questions, TRUE),
                    'answers' => json_decode($quiz_req->answers, TRUE),
                ]
            ]
            , REST_Controller::HTTP_OK); 
    }
}