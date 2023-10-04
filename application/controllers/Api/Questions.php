<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Questions extends REST_Controller
{

    private $allowed_img_types;

    function __construct()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL & ~E_DEPRECATED);
        
        parent::__construct();
        $this->methods['all_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['one_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['set_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['productDel_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model(array('Api_model'));
        $this->allowed_img_types = $this->config->item('allowed_img_types');
    }

    /*
     * Get All Questions
    */
    public function index_get($lang)
    {
        $questions = $this->Api_model->getQuestions($lang);

        // Check if the products data store contains products (in case the database result returns NULL)
        if ($questions) {
            $this->response($questions, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No products were found'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    /*
     * Get Exam 
    */
    public function quiz_get($lang)
    {
        $quiz = $this->db->get('quiz_setup')->row();
        if (empty($quiz)) {
            $this->response([
                'status' => FALSE,
                'message' => 'No quiz were found'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $questions = $this->Api_model->getQuiz((int) $quiz->questionCount, $lang);

        if ($questions) {
            $this->response(
                [
                    'status' => true,
                    'quiz' => [
                        'title' => $quiz->title,
                        'resultHead' => $quiz->resultHead,
                        'questionCount' => $quiz->questionCount,
                        'total_time' => $quiz->total_time,
                        'message' => $quiz->message,
                        'questions' => $questions
                    ]
                ]
                , REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No products were found'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}