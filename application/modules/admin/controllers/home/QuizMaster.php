<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class QuizMaster extends ADMIN_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
        $this->action = [
            'updateUrl' => site_url('quiz/update'),
            'deleteUrl' => site_url('quiz/delete'),
            'addUrl' => site_url('quiz/add'),
        ];
        
    }

    public function index($param1=null, $param2=null)
    {
        if ($this->uri->segment(2) == 'update') {
            $data = [
                $this->input->post('columnName') => $this->input->post('field')
            ];
            $this->db->where('quiz_setup_id' , $this->input->post('id'));
            $this->db->update('quiz_setup',$data);
            
            echo "data updated"; 
            die;           
        }

        if ($this->uri->segment(2) == 'add') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->insert('quiz_setup',$data);
            
            echo json_encode(['status' => true,'id' => $this->db->insert_id()]); 
            die;           
        }

        if ($this->uri->segment(2) == 'delete') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->where('quiz_setup_id', $data['id']);
            $this->db->delete('quiz_setup');

            echo json_encode(['status' => true]); 
            die;           
        }

        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Quiz';
        $head['description'] = 'Quiz Management';
        $head['updateUrl'] = $this->action['updateUrl'];
        $head['addDataUrl'] = $this->action['addUrl'];
        $head['deleteDataUrl'] = $this->action['deleteUrl'];
        $head['keywords'] = 'PSC,PCC..etc';
        $this->db->order_by('quiz_setup_id', 'desc');
        $data['data'] = $this->db->get('quiz_setup')->result();
        
        $this->render('quiz/index', $head, $data);
    }

    public function quizReq($param1=null, $param2=null) {
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'started');
        $this->login_check();
        
        if ($this->uri->segment(2) == 'update') {
            $this->form_validation->set_rules('callback', 'Call Back', 'trim|required');
            $this->form_validation->set_rules('remark', 'Remark', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == FALSE ) {
                $error_array = array_values($this->form_validation->error_array());
                echo json_encode(['status' => false, 'result' => $error_array]);
                die;
            }

            $data = [
                'callback_on' => $this->input->post('callback'),
                'remark' => $this->input->post('remark'),
                'status' => $this->input->post('status'),
            ];

            $this->db->where('follow_up_id' , $this->input->post('id'));
            $this->db->update('follow_up',$data);

            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');         
            
            $list =$this->load->view($this->template.'potential-users/follow-up/table',$data1, true);
            echo json_encode(['status' => true, 'result' => $list]);
            die; 
        }

        if ($this->uri->segment(2) == 'add') {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {                
                $this->form_validation->set_rules('callback', 'Call Back', 'trim|required');
                $this->form_validation->set_rules('remark', 'Remark', 'trim|required');
                $this->form_validation->set_rules('status', 'Status', 'trim|required');
    
                if ($this->form_validation->run() == FALSE ) {
                    $error_array = array_values($this->form_validation->error_array());
                    echo json_encode(['status' => false, 'result' => $error_array]);
                    die;
                }
                $appendOnId = $this->input->post('append_on_id');
                $appendOn = $this->db->get_where('follow_up', ['follow_up_id' => $appendOnId])->row();
                // echo "<pre>";print_r($appendOn);die;

                $data = [
                    'callback_on' => $this->input->post('callback'),
                    'remark' => $this->input->post('remark'),
                    'status' => $this->input->post('status'),
                    'stream_id' => $this->input->post('stream_id'),
                    'course_id' => $this->input->post('course_id'),
                    'user_id' => $appendOn->user_id,
                    'created_by' => $this->user['login_as'],
                    'created_id' => $this->user['login_id'],
                ];
    
                $this->db->insert('follow_up',$data);
    
                $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');         
                
                $list =$this->load->view($this->template.'potential-users/follow-up/table',$data1, true);
                echo json_encode(['status' => true, 'result' => $list]);
                die;                
            } else {
                $type = $this->input->get('type');
                if($type === 'model') {
                    $data['title'] = 'Follow Up Add'; 
                    $data['append_on_id'] = $this->input->get('id'); 
                    $list =$this->load->view($this->template.'potential-users/follow-up/model-add',$data, true);
                    echo json_encode(['result' => $list]);
                    die;
                }
            }
        }

        if ($this->uri->segment(2) == 'delete') {
                       
        }

        if ($this->uri->segment(2) == 'edit') {
            $type = $this->input->get('type');
            $id = $this->input->get('id');

            if ($type === 'model' ) {
                $data['title'] = 'Follow-Up Edit'; 
                $data['id'] = $id; 
                $list =$this->load->view($this->template.'potential-users/follow-up/model-add',$data, true);
                echo json_encode(['result' => $list]);
                die;
            }
        }

        $data = array();
        $head = array();
        $head['title'] = 'Administration - Quiz Result';
        $head['description'] = 'Quiz Result';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        $this->render('quiz/quiz-req/index', $head, $data);
    }
}
