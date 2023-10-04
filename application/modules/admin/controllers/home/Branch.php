<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Branch extends ADMIN_Controller
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

            $this->db->where('branch_id' , $this->input->post('id'));
            $this->db->update('branch',$data);
            
            echo "data updated"; 
            die;           
        }

        if ($this->uri->segment(2) == 'add') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->insert('branch',$data);
            
            echo json_encode(['status' => true,'id' => $this->db->insert_id()]); 
            die;           
        }

        if ($this->uri->segment(2) == 'delete') {
            $data = json_decode($_POST['data'], TRUE);
            $this->db->where('branch_id', $data['id']);
            $this->db->delete('branch');

            echo json_encode(['status' => true]); 
            die;           
        }
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - branch';
        $head['description'] = 'branch Management';
        $head['updateUrl'] = site_url('branch/update');
        $head['addDataUrl'] = site_url('branch/add');
        $head['deleteDataUrl'] = site_url('branch/delete');
        $head['keywords'] = 'PSC,PCC..etc';
        $this->db->order_by('branch_id', 'desc');
        $data['data'] = $this->db->get('branch')->result();

        $this->render('branch', $head, $data);
    }
}
