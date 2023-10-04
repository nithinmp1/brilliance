<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Course extends ADMIN_Controller
{
    public $action;
    public function __construct()
    {
        
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
        $this->action = [
            'editUrl' => site_url('course/edit'),
            'updateUrl' => site_url('course/update'),
            'deleteUrl' => site_url('course/delete'),
            'loginUrl' => site_url('course/login'),
            'addUrl' => site_url('course/add'),
            'bulkAddUrl' => site_url('course/bulkAdd'),

        ];
        $this->load->library('upload');
    }

    public function do_upload($insert_id) {
        if ($_FILES && $_FILES['file']['name']) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/course/' . $insert_id . '.jpg');
        }
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
                    'status' => 1
                ];

                $this->db->insert('course', $data);

                $list =$this->load->view($this->template.'course/table',$data1, true);
                echo json_encode(['status' => true, 'result' => $list]);
                die;
            } else {
                $type = $this->input->get('type');
                if($type === 'model') {
                    $data['title'] = 'course ADD'; 
                    $list =$this->load->view($this->template.'course/model-add',$data, true);
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
                $data['title'] = 'Course EDIT'; 
                $data['id'] = $id; 
                $list =$this->load->view($this->template.'course/model-add',$data, true);
                echo json_encode(['result' => $list]);
                die;
            }
            
        }

        $data = array();
        $head = array();
        $head['title'] = 'Administration - Course';
        $head['description'] = 'Course Management';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        $this->render('course/index', $head, $data);
    }

}
