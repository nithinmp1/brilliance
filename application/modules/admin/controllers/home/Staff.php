<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Staff extends ADMIN_Controller
{
    public $action;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
        $this->action = [
            'editUrl' => site_url('staff/edit'),
            'updateUrl' => site_url('staff/update'),
            'deleteUrl' => site_url('staff/delete'),
            'addUrl' => site_url('staff/add'),
            'loginUrl' => site_url('staff/login')
        ];
        $this->load->library('upload');
        $this->load->library('monolog');
        $this->load->library('twilio');
        $this->load->library('mailler');
    }

    public function do_upload($insert_id) {
        if ($_FILES && $_FILES['file']['name']) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/staff/' . $insert_id . '.jpg');
        }
    }

    public function index($param1=null, $param2=null)
    {
        $this->monolog->info(['function' => __FUNCTION__.'-'.$param1, 'user' => '', 'status' => 'started']);
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'started');

        if ($this->uri->segment(2) == 'update') {
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
            $this->form_validation->set_rules('accessManagement_id', 'Access Name', 'trim|required');
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
                'accessManagement_id' => $this->input->post('accessManagement_id'),
                'address' => $this->input->post('address'),
                'whatsapp' => $this->input->post('whatsapp'),
                'mobile' => $this->input->post('mobile'),
            ];

            $this->db->where('id' , $this->input->post('id'));
            $this->db->update('users',$data);
            $this->do_upload($this->input->post('id'));
            $list =$this->load->view($this->template.'staff-table',$data1, true);
            
            $this->mailler->create(['identifier' => __CLASS__.'_'.__FUNCTION__.'_'.$this->uri->segment(2),'insert_id' => $insert_id]);
            
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');

            $this->monolog->info(['function' => __FUNCTION__.'-'.$param1, 'user' => '', 'status' => 'started']);
            
            echo json_encode(['status' => true, 'result' => $list]);
            die;           
        }

        if ($this->uri->segment(2) == 'add') {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('accessManagement_id', 'Access Name', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
                $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');

                if ($this->form_validation->run() == FALSE ) {
                    $error_array = array_values($this->form_validation->error_array());
                    echo json_encode(['status' => false, 'result' => $error_array]);
                    die;
                }

                $staffCount = $query = $this->db->get_where('users',['user_type' => 'staff'])->num_rows();
                $data = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'username' => $this->input->post('first_name').' '.$this->input->post('last_name'),
                    'branch_id' => $this->input->post('branch_id'),
                    'accessManagement_id' => $this->input->post('accessManagement_id'),
                    'address' => $this->input->post('address'),
                    'whatsapp' => $this->input->post('whatsapp'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'user_type' => 'staff',
                    'uuid' => PREFIX.'-'.$staffCount+1,
                    'password' => md5($this->input->post('password')),
                ];

                $this->db->insert('users', $data);
                $insert_id = $this->db->insert_id();
                $this->do_upload($insert_id);

                $list =$this->load->view($this->template.'staff-table',$data1, true);

                $this->mailler->create(['identifier' => __CLASS__.'_'.__FUNCTION__.'_'.$this->uri->segment(2),'insert_id' => $insert_id]);

                $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');

                $this->monolog->info(['function' => __CLASS__.'-'.__FUNCTION__.'-'.$param1, 'user' => '', 'status' => 'started']);

                echo json_encode(['status' => true, 'result' => $list]);
                die;
            } else {
                $type = $this->input->get('type');
                if($type === 'model') {
                    $data['actionUrl'] = site_url('staff/add'); 
                    $data['title'] = 'STAFF ADD'; 
                    $list =$this->load->view($this->template.'model-staff-add',$data, true);
                    
                    $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
                    $this->monolog->info(['function' => __FUNCTION__.'-'.$param1, 'user' => '', 'status' => 'started']);

                    echo json_encode(['result' => $list]);
                    die;
                }
            }
        }

        if ($this->uri->segment(2) == 'delete') {
            $id = $this->input->get('id');

            $this->db->where('id', $id);
            $this->db->delete('users');

            $list =$this->load->view($this->template.'staff-table',$data, true);
            echo json_encode(['result' => $list]);
            
            $this->mailler->create(['identifier' => __CLASS__.'_'.__FUNCTION__.'_'.$this->uri->segment(2),'insert_id' => $id]);
            
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
            
            $this->monolog->info(['function' => __FUNCTION__.'-'.$this->uri->segment(2), 'user' => '', 'status' => 'started']);

            die;           
        }

        if ($this->uri->segment(2) == 'edit') {
            $type = $this->input->get('type');
            $id = $this->input->get('id');

            if ($type === 'model' ) {
                $data['title'] = 'STAFF EDIT'; 
                $data['id'] = $id; 
                $list =$this->load->view($this->template.'model-staff-add',$data, true);
                echo json_encode(['result' => $list]);

                $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');

                $this->monolog->info(['function' => __FUNCTION__.'-'.$this->uri->segment(2), 'user' => '', 'status' => 'started']);
                
                die;
            }
            
        }
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - staff';
        $head['description'] = 'staff Management';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        $this->monolog->info(['function' => __FUNCTION__.'-'.$param1, 'user' => '', 'status' => 'started']);
        
        $this->render('staff', $head, $data);
    }
}
