<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Stream extends ADMIN_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
    }

    public function index($param1=null, $param2=null)
    {
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'started');

        if ($this->uri->segment(2) == 'update') {
            $data = [
                $this->input->post('columnName') => $this->input->post('field')
            ];

            $this->db->where('stream_id' , $this->input->post('id'));
            $this->db->update('stream',$data);
            
            echo "data updated";
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');

            die;           
        }

        if ($this->uri->segment(2) == 'add') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->insert('stream',$data);
            
            echo json_encode(['status' => true,'id' => $this->db->insert_id()]); 
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
            die;           
        }

        if ($this->uri->segment(2) == 'delete') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->where('stream_id', $data['id']);
            $this->db->delete('stream');

            echo json_encode(['status' => true]); 
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
            die;           
        }
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Stream';
        $head['description'] = 'Stream Management';
        $head['updateUrl'] = site_url('stream/update');
        $head['addDataUrl'] = site_url('stream/add');
        $head['deleteDataUrl'] = site_url('stream/delete');
        $head['keywords'] = 'PSC,PCC..etc';
        $this->db->order_by('stream_id', 'desc');
        $data['data'] = $this->db->get('stream')->result();
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');

        $this->render('stream', $head, $data);
    }
}
