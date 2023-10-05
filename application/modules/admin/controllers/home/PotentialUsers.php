<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class PotentialUsers extends ADMIN_Controller
{
    public $action;
    public $user;
    public function __construct()
    {
        // ini_set('display_errors', '1');
        // ini_set('display_startup_errors', '1');
        // error_reporting(E_ALL & ~E_DEPRECATED);
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
        $this->action = [
            'editUrl' => site_url('follow-up/edit'),
            'updateUrl' => site_url('follow-up/update'),
            'deleteUrl' => site_url(''),
            'loginUrl' => site_url(''),
            'addUrl' => site_url('enqury-managment/add'),
            'appendNew' => site_url('follow-up/add'),
            'profileUrl' => site_url('potential-users/%s'),
        ];
        $this->load->library('upload');
        $this->user = $this->getUser();
    }

    public function do_upload($insert_id) {
        if ($_FILES && $_FILES['file']['name']) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/course/' . $insert_id . '.jpg');
        }
    }

    private function getUser()
    {
        $dynamicObject = dynamicObject::getInstance();
        $user =  $dynamicObject->get('user');

        return $user;
    }

    public function index($param1=null, $param2=null)
    {   
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'started');
        $this->login_check();

        if ($this->uri->segment(2) == 'update') {
                       
        }

        if ($this->uri->segment(2) == 'add') {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                
            } else {
               
            }
        }

        if ($this->uri->segment(2) == 'delete') {
                       
        }

        if ($this->uri->segment(2) == 'edit') {
            
        }

        $data = array();
        $head = array();
        $head['title'] = 'Administration - User Managment';
        $head['description'] = 'User Management';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        $this->render('potential-users/index', $head, $data);
    }

    public function followUp($param1=null, $param2=null) {
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
        $head['title'] = 'Administration - Follow Up Managment';
        $head['description'] = 'User Management';
        $head['keywords'] = 'PSC,PCC..etc';
        if (isset($param1) && $param1 == 'active') {
            $data['param1'] = $param1;            
        }
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        $this->render('potential-users/follow-up/index', $head, $data);
    }
}
