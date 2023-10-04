<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Students extends ADMIN_Controller
{
    public $action;
    public function __construct()
    {
        
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
        $this->action = [
            'editUrl' => site_url('students/edit'),
            'updateUrl' => site_url('students/update'),
            'deleteUrl' => site_url('students/delete'),
            'loginUrl' => site_url('students/login'),
            'addUrl' => site_url('students/add'),
            'bulkAddUrl' => site_url('students/bulkAdd'),

        ];
        $this->load->library('upload');
    }

    public function do_upload($insert_id) {
        if ($_FILES && $_FILES['file']['name']) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/students/' . $insert_id . '.jpg');
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
            $list =$this->load->view($this->template.'students\table',$data1, true);
            echo json_encode(['status' => true, 'result' => $list]);
            die;           
        }

        if ($this->uri->segment(2) == 'add') {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
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

                $data = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'branch_id' => $this->input->post('branch_id'),
                    'address' => $this->input->post('address'),
                    'whatsapp' => $this->input->post('whatsapp'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'user_type' => 'students',
                    'password' => md5($this->input->post('password')),
                ];

                $this->db->insert('users', $data);
                $this->do_upload($this->db->insert_id());

                $list =$this->load->view($this->template.'students/table',$data1, true);
                echo json_encode(['status' => true, 'result' => $list]);
                die;
            } else {
                $type = $this->input->get('type');
                if($type === 'model') {
                    $data['title'] = 'Students ADD'; 
                    $list =$this->load->view($this->template.'students/model-add',$data, true);
                    echo json_encode(['result' => $list]);
                    die;
                }
            }
        }

        if ($this->uri->segment(2) == 'delete') {
            $id = $this->input->get('id');

            $this->db->where('id', $id);
            $this->db->delete('users');

            $list =$this->load->view($this->template.'students/table',$data, true);
            echo json_encode(['result' => $list]);
            $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
            die;           
        }

        if ($this->uri->segment(2) == 'edit') {
            $type = $this->input->get('type');
            $id = $this->input->get('id');

            if ($type === 'model' ) {
                $data['title'] = 'students EDIT'; 
                $data['id'] = $id; 
                $list =$this->load->view($this->template.'students/model-add',$data, true);
                echo json_encode(['result' => $list]);
                die;
            }
            
        }

        $data = array();
        $head = array();
        $head['title'] = 'Administration - Students';
        $head['description'] = 'Students Management';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        $this->render('index', $head, $data);
    }

    public function bulkAdd() {
        
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            /*
                Si No
                First Name
                Last Name
                Branch
                Gender
                Address
                whatsapp
                mobile
                email
            */
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            error_reporting(E_ALL & ~E_DEPRECATED);
            $inputFileName = $_FILES['file']['tmp_name'];
            $this->load->library('spreadsheet');
            $spreadsheet = $this->spreadsheet->load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $emails = $dataArray = array();

            foreach ($worksheet->getRowIterator() as $row) {
                $data = [];
                foreach ($row->getCellIterator() as $key => $cell) {
                    $data[] = $email = $cell->getValue();
                    if ($key === "I") {
                        if (in_array($email, $emails)) {
                            echo json_encode(['status' => false, 'message' => "Duplicate found: $email"]);
                            die;
                        }
                        $emails[] = $cell->getValue();
                    }
                }
                $excelData[] = $data; 
            }
            unset($excelData[0]);
            foreach ($excelData as $key => $value) {
                $insertData[] = [
                    'first_name' => $value[1],
                    'last_name' => $value[2],
                    'branch_id' => $value[3],
                    'gender' => $value[4],
                    'address' => $value[5],
                    'whatsapp' => $value[6],
                    'mobile' => $value[7],
                    'email' => $value[8],
                    'user_type' => 'students',
                    'password' => md5($value[1]),
                ]; 
            }
            $emails = array_column($insertData, 'email');
            $this->db->where_in('email', $emails);
            $emailCheck = $this->db->get('users')->result();
            if (!empty($emailCheck)) {
                echo json_encode(['status' => false, 'message' => "Duplicate found: $email"]);
                die;
            }

            $this->db->insert_batch('users',$insertData);
            echo json_encode(['status' => false, 'message' => "datas updated"]);
        } else {
            $this->render('students/bulkAdd', $head, $data);
        }
    }
}
