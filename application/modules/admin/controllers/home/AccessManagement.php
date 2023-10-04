<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AccessManagement extends ADMIN_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
    }

    public function index($param1=null, $param2=null)
    {
        if ($this->uri->segment(2) == 'update') {
            $data = [
                $this->input->post('columnName') => $this->input->post('field')
            ];

            $this->db->where('accessManagement_id' , $this->input->post('id'));
            $this->db->update('accessmanagement',$data);
            echo "data updated"; 
            die;           
        }

        if ($this->uri->segment(2) == 'add') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->insert('accessmanagement',$data);
            
            echo json_encode(['status' => true,'id' => $this->db->insert_id()]); 
            die;           
        }

        if ($this->uri->segment(2) == 'delete') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->where('accessManagement_id', $data['id']);
            $this->db->delete('accessmanagement');

            echo json_encode(['status' => true]); 
            die;           
        }
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - accessManagement';
        $head['description'] = 'accessManagement Management';
        $head['updateUrl'] = site_url('access-management/update');
        $head['addDataUrl'] = site_url('access-management/add');
        $head['deleteDataUrl'] = site_url('access-management/delete');
        $head['keywords'] = 'PSC,PCC..etc';
        $this->db->order_by('accessManagement_id', 'desc');
        $data['data'] = $this->db->get('accessmanagement')->result();

        $this->render('accessManagement', $head, $data);
    }
}
