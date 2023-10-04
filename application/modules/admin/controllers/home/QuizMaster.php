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
}
