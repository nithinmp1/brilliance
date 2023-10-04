<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{

    private $num_rows = 20;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('guzzle');
    }

    public function index($page = 0)
    {
        $this->load->library('guzzle');
        $head = $data =[];
        $quiz = $this->guzzle->get(['method' => 'quiz']);
        $data['quiz'] = $quiz['quiz']; 
        $data['title'] = 'Quiz';
        $data['invokeUrl'] = site_url('get-otp');
        $data['loginUrl'] = site_url('login');
        $data['checkOtpUrl'] = site_url('check-otp');

        $this->render('home', $head, $data);
    }

    public function result() {
        $mobile = $this->input->get('mobile');
        $otp = $this->input->get('otp');

        $this->load->library('guzzle');
        $result = $this->guzzle->get(['method' => 'quiz-result','postData' => ['mobile' => $mobile, 'otp' => $otp]]);

        $data['data'] = $result['data']; 
        $data['loginUrl'] = site_url('login');
        // echo "<pre>";print_r($data);die;
        $this->load->view('templates/crow/_parts/header');
        $this->load->view('templates/crow/result',$data);
        // $this->render('result', $head, $data);   
    }
}
