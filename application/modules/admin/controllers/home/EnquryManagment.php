<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class EnquryManagment extends ADMIN_Controller
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
            'editUrl' => site_url('enqury-managment/edit'),
            'updateUrl' => site_url('enqury-managment/update'),
            'deleteUrl' => site_url('enqury-managment/delete'),
            'loginUrl' => site_url('enqury-managment/login'),
            'addUrl' => site_url('enqury-managment/add'),
            'bulkAddUrl' => site_url('enqury-managment/bulkAdd'),
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
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
            $this->form_validation->set_rules('duration', 'Duration', 'trim|required|numeric');
            $this->form_validation->set_rules('ageFrom', 'Age From', 'trim|required|numeric');
            $this->form_validation->set_rules('ageTo', 'Age To', 'trim|required|numeric');

            if ($this->form_validation->run() == FALSE ) {
                $error_array = array_values($this->form_validation->error_array());
                echo json_encode(['status' => false, 'result' => $error_array]);
                die;
            }

            $data = [
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'duration' => $this->input->post('duration'),
                'age_from' => $this->input->post('ageFrom'),
                'age_to' => $this->input->post('ageTo'),
                'status' => $this->input->post('status')
            ];

            $this->db->where('course_id' , $this->input->post('id'));
            $this->db->update('course',$data);

            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');

            $list =$this->load->view($this->template.'course/table',$data1, true);
            echo json_encode(['status' => true, 'result' => $list]);
            die;           
        }

        if ($this->uri->segment(2) == 'add') {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric');

                if ($this->form_validation->run() == FALSE ) {
                    $error_array = array_values($this->form_validation->error_array());
                    echo json_encode(['status' => false, 'result' => $error_array]);
                    die;
                }
                $data = [
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'address' => $this->input->post('address'),
                    'dob' => $this->input->post('dob'),
                    'status' => 1,
                    'uuid' => PREFIX.time(),
                    'created_by' => $this->user['login_as'],
                    'created_id' => $this->user['login_id'],
                    'user_type' => 'potential_users',
                    'qualification_id' => $this->input->post('qualification_id'),
                    'assigned_to' => json_encode($this->input->post('staff_id')),
                    'branch_id' => $this->input->post('branch_id'),
                    'login_access' => 0,
                ];
                $this->db->insert('users', $data);

                $enqueryData = [
                    'user_id' => $this->db->insert_id(),
                    'stream_id' => $this->input->post('stream_id'),
                    'course_id' => $this->input->post('course_id'),
                    'remark' => $this->input->post('remark'),
                    'created_by' => $this->user['login_as'],
                    'created_id' => $this->user['login_id'],
                    'status' => 'Assigned',
                    'callback_on' => $this->input->post('callback_on')
                ];
                $this->db->insert('follow_up', $enqueryData);

                $list =$this->load->view($this->template.'enqury-managment/table',[], true);
                echo json_encode(['status' => true, 'result' => $list]);
                die;
            } else {
                $type = $this->input->get('type');
                if($type === 'model') {
                    $data['title'] = 'Enqury Managment'; 
                    $list =$this->load->view($this->template.'enqury-managment/model-add',$data, true);
                    echo json_encode(['result' => $list]);
                    die;
                }
            }
        }

        if ($this->uri->segment(2) == 'delete') {
            $id = $this->input->get('id');

            $this->db->where('course_id', $id);
            $this->db->delete('course');

            $list =$this->load->view($this->template.'course/table',$data, true);
            echo json_encode(['result' => $list]);
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
            die;           
        }

        if ($this->uri->segment(2) == 'edit') {
            $type = $this->input->get('type');
            $id = $this->input->get('id');

            if ($type === 'model' ) {
                $data['title'] = 'Enquery EDIT'; 
                $data['id'] = $id; 
                $list =$this->load->view($this->template.'enqury-managment/model-add',$data, true);
                echo json_encode(['result' => $list]);
                die;
            }
            
        }

        $data = array();
        $head = array();
        $head['title'] = 'Administration - Enqury Managment';
        $head['description'] = 'Enqury Management';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        // $this->load->view('admin_templates/crow/staff-select', $head, $data);
        // $this->render('staff-select', $head, $data);
        $this->render('enqury-managment/index', $head, $data);
    }

}
