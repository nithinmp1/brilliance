<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Question extends ADMIN_Controller
{
    public $action;
    public function __construct()
    {
        
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
        $this->action = [
            'editUrl' => site_url('questions/edit'),
            'updateUrl' => site_url('questions/update'),
            'deleteUrl' => site_url('questions/delete'),
            'addUrl' => site_url('questions/add'),
            'statusUpdate' => site_url('questions/statusUpdate'),
            'viewUrl' => site_url('questions/view'),
        ];

        $this->allowedFileuploads = ['question'];

        $this->load->library('upload');
        $this->load->library('response');
    }

    public function do_upload($option, $insert_id) {
        if ($_FILES && $_FILES['file']['name']) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/ '.$option.' /' . $insert_id . '.jpg');
        }
    }

    public function index($param1=null, $param2=null)
    {
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'started');
        $this->login_check();


        if ($this->uri->segment(2) == 'update') {
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'trim|required');

            if ($this->form_validation->run() == FALSE ) {
                $error_array = array_values($this->form_validation->error_array());
                echo json_encode(['status' => false, 'result' => $error_array]);
                die;
            }

            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'branch_id' => $this->input->post('branch_id'),
                'address' => $this->input->post('address'),
                'whatsapp' => $this->input->post('whatsapp'),
                'mobile' => $this->input->post('mobile'),
            ];

            $this->db->where('id' , $this->input->post('id'));
            $this->db->update('users',$data);
            $this->do_upload($this->input->post('id'));
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
            $list =$this->load->view($this->template.'acadamic\table',$data1, true);
            echo json_encode(['status' => true, 'result' => $list]);
            die;           
        }

        if ($this->uri->segment(2) == 'delete') {
            $id = $this->input->get('id');

            $this->db->where('question_id', $id);
            $this->db->delete('question');

            $list =$this->load->view($this->template.'acadamic/questions-table',$data, true);
            echo json_encode(['result' => $list]);
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
            die;           
        }

        if ($this->uri->segment(2) == 'edit') {
            $type = $this->input->get('type');
            $id = $this->input->get('id');

            if ($type === 'model' ) {
                $data['title'] = 'acadamic EDIT'; 
                $data['id'] = $id; 
                $list =$this->load->view($this->template.'acadamic/model-add',$data, true);
                echo json_encode(['result' => $list]);
                die;
            }
            
        }

        if ($this->uri->segment(2) == 'view') {
            
            $type = $this->input->get('type');
            $id = $this->input->get('id');

            if ($type === 'model' ) {
                $data['title'] = 'Question View'; 
                $data['id'] = $id;
                $question = $this->db->select('question_id')->order_by('question_id','ASC')->get_where('question',['question_id >'=> $id])->row();
                if(isset($question)){
                    $data['pidPrev'] = $question->question_id;
                }
                $question = $this->db->select('question_id')->order_by('question_id','DESC')->get_where('question',['question_id <'=> $id])->row();
                if(isset($question)){
                    $data['pidNext'] = $question->question_id;
                }
                $list =$this->load->view($this->template.'acadamic/question-model-view',$data, true);
                echo json_encode(['result' => $list]);
                die;
            }
            
        }

        if($this->uri->segment(2) == 'statusUpdate'){
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            error_reporting(E_ALL & ~E_DEPRECATED);
            $id = $this->uri->segment(3);
            $question = $this->db->get_where('question',['question_id' => $id])->row();
            if ($question->enabled_for_quiz == 1) {
                $enabled_for_quiz = 0;
            } else {
                $enabled_for_quiz = 1;
            }

            $this->db->set(['enabled_for_quiz'=> $enabled_for_quiz])->where(['question_id' => $id])->update('question');
            redirect($this->input->server('HTTP_REFERER'));

        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Questions';
        $head['description'] = 'acadamic Management';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        $this->render('acadamic/questions-index', $head, $data);
    }
}
