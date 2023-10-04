<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Acadamic extends ADMIN_Controller
{
    public $action;
    public function __construct()
    {
        
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('History_model'));
        $this->action = [
            'editUrl' => site_url('acadamic/edit'),
            'updateUrl' => site_url('acadamic/update'),
            'deleteUrl' => site_url('acadamic/delete'),
            'loginUrl' => site_url('acadamic/login'),
            'addUrl' => site_url('acadamic/add'),
            'bulkAddUrl' => site_url('acadamic/bulkAdd'),

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
                    'user_type' => 'acadamic',
                    'password' => md5($this->input->post('password')),
                ];

                $this->db->insert('users', $data);
                $this->do_upload($this->db->insert_id());

                $list =$this->load->view($this->template.'acadamic/table',$data1, true);
                echo json_encode(['status' => true, 'result' => $list]);
                die;
            } else {
                $type = $this->input->get('type');
                if($type === 'model') {
                    $data['title'] = 'acadamic ADD'; 
                    $list =$this->load->view($this->template.'acadamic/model-add',$data, true);
                    echo json_encode(['result' => $list]);
                    die;
                }
            }
        }

        if ($this->uri->segment(2) == 'delete') {
            $id = $this->input->get('id');

            $this->db->where('id', $id);
            $this->db->delete('users');

            $list =$this->load->view($this->template.'acadamic/table',$data, true);
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

        $data = array();
        $head = array();
        $head['title'] = 'Administration - acadamic';
        $head['description'] = 'acadamic Management';
        $head['keywords'] = 'PSC,PCC..etc';
        
        $this->saveHistory(__FUNCTION__, $this->uri->segment(2), 'completed');
        
        $this->render('acadamic/index', $head, $data);
    }

    private function readExcel($filePath) : array {
        $this->load->library('spreadsheet');
        $spreadsheet = $this->spreadsheet->load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        
        $mergedCells = $worksheet->getMergeCells();

        // Initialize an array to store merged cell values
        $mergedCellValues = [];

        // Iterate through the merged cell ranges
        foreach ($mergedCells as $mergedRange) {
            list($startCell, $endCell) = explode(':', $mergedRange);
            
            $startColumn = preg_replace('/[0-9]+/', '', $startCell);
            $startRow = (int)preg_replace('/[A-Z]+/', '', $startCell);
            
            $endColumn = preg_replace('/[0-9]+/', '', $endCell);
            $endRow = (int)preg_replace('/[A-Z]+/', '', $endCell);
            
            // Extract the value from the top-left cell of the merged range
            $value = $worksheet->getCell($startColumn . $startRow)->getValue();
            
            // Store the merged cell range and its value in the array
            $mergedCellValues[$mergedRange] = $value;
        }


        $data = [];

        // Initialize a variable to store the header row values
        $headerRow = [];
        
        // Iterate through rows and columns
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $cellValue = $cell->getValue();

                $currentCellAddress = $cell->getCoordinate();
                if (preg_match('/S/i', $currentCellAddress)) {
                    $startRange = $this->spreadsheet->checkCellIsMergedOne($currentCellAddress, $mergedCellValues);
                    if ($startRange != null) {
                        $cellValue = $worksheet->getCell($startRange)->getValue();
                    }
                }
                $rowData[] = $cellValue;
            }
            
            if (empty($headerRow)) {
                $headerRow = $rowData;
            } else {
                $rowAssoc = [];
                foreach ($headerRow as $index => $header) {
                    if ($rowData[$index] === 'yes') {
                        $rowData[$index] = true;
                    }
    
                    if ($rowData[$index] === 'no') {
                        $rowData[$index] = false;
                    }
                    $rowAssoc[$header] = isset($rowData[$index]) ? $rowData[$index] : null;

                }
                $data[] = $rowAssoc;
            }
        }
        
        return $data;
    }

    private function addExplanation($exp) : array {
        $this->db->insert('explanation',['explanation' => $exp]);

        return ['explanation_id' => $this->db->insert_id()];
    }
    public function bulkAdd() {
        
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            error_reporting(E_ALL & ~E_DEPRECATED);
            try {
                //code...
            if (!isset($_FILES['file']) || empty($_FILES['file'])) {
                $this->response->create(['status' => false,'message' => 'invalid file']);
            }
            $inputFileName = $_FILES['file']['tmp_name'];
            $choosen = $this->input->post('choosen');
            if (!in_array($choosen, $this->allowedFileuploads)) {
                $this->response->create(['status' => false,'message' => 'invalid option']);
            }else {
                $extractToDirectory = 'extractedInputs/input-'.time();
                $zip = new ZipArchive();
                if ($zip->open($inputFileName) === TRUE) {
                    $zip->extractTo($extractToDirectory);
                    $zip->close();
                }
            }
             

            
            $filePath = sprintf('%s/%s/excel.xls', $extractToDirectory, $choosen);
            $excelData = $this->readExcel($filePath);
            $this->validate($excelData, $choosen);

            foreach ($excelData as $key => $value) {
                // echo "<pre>";print_r($value);die;
                if (!isset($value['si no'])) {
                    continue;
                }

                $stream = $this->db->select('stream_id')->get_where('stream', ['name' => $value['strem']])->row_array();
                if(empty($stream)) {
                    $stream = $this->addStream($value['strem']);
                }

                $subject = $this->db->select('subject_id')->get_where('subject', ['name' => $value['subject']])->row_array();
                if(empty($subject)) {
                    $subject = $this->addSubject($value['subject']);
                }

                $section = $this->db->select('section_id')->get_where('section', ['name' => $value['section']])->row_array();
                if(empty($section)) {
                    $section = $this->addSection($subject['subject_id'], $value['section']);
                }
                $path = '';

                if($value['have_explanation']) {
                    $explanation = $this->db->select('explanation_id')->get_where('explanation', ['explanation' => $value['explanation']])->row_array();
                    if(empty($explanation)) {
                        $explanation = $this->addExplanation($value['explanation']);
                    }
                }

                $insertData = [
                    'question' => $value['question'],
                    'option1' => $value['option1'],
                    'option2' => $value['option2'],
                    'option3' => $value['option3'],
                    'option4' => $value['option4'],
                    'option5' => $value['option5'],
                    'answer' => $value['answer'],
                    'stream_id' => $stream['stream_id'],
                    'prilims' => $value['prilims'],
                    'main' => $value['main'],
                    'sslc' => $value['sslc'],
                    'hsc' => $value['hsc'],
                    'degree' => $value['degree'],
                    'subject_id' => $subject['subject_id'],
                    'section_id' => $section['section_id'],
                    'topic' => $value['topic'],
                    'model' => $value['model'],
                    'have_explanation' => $value['have_explanation'],
                    'explanation_id' => isset($explanation['explanation_id'])?$explanation['explanation_id']:'',
                    'have_image' => $value['have_image'],
                    'mark' => $value['mark'],
                    'negative_mark' => $value['negative_mark'],
                    'question_type' => $value['question_type'],
                    'enabled_for_quiz' => true,
                    'lang' => $value['lang'],
                    'created_by' => $this->session->userdata('logged_id'),
                    'status' => 1,
                ];
                $this->db->insert($choosen,$insertData);
                $insert_id = $this->db->insert_id();
                if (isset($insertData['have_image']) && $insertData['have_image'] === true ) {
                    $imagePath = sprintf('%s/%s/%s/%s', $extractToDirectory, $choosen, 'images', $value['image']);
                    $this->doUploadFromBulk('question',$insert_id, $imagePath);
                }
                
            }
            $this->deleteDirectory($extractToDirectory);

            $this->response->create(['status' => true,'message' => 'data added']);

            } catch (\Throwable $th) {
                $this->response->create(['status' => false,'message' => 'something went wrong']);
            }
        } else {
            $this->render('acadamic/bulkAdd', $head, $data);
        }
    }

    function deleteDirectory($dir) {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );
        
        foreach ($iterator as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        
        rmdir($dir);
    }

    private function doUploadFromBulk($option, $insert_id, $filePath) {
        copy($filePath, 'upload/'.$option.'/'.$insert_id.'.jpg');
    }

    private function addStream($name) : array {
        $this->db->insert('stream',['name' => $name]);

        return ['stream_id' => $this->db->insert_id()];
    }

    private function addSubject($name) : array {
        $this->db->insert('subject',['name' => $name]);

        return ['stream_id' => $this->db->insert_id()];
    }

    private function addSection($subject_id, $name) : array {
        $this->db->insert('section',['subject_id' => $subject_id, 'name' => $name]);

        return ['section_id' => $this->db->insert_id()];
    }

    private function validate($data, $type) {
        if (false) {
            $this->response->create(['status' => false,'message' => 'message']);
        }
    }

    public function questions($param1=null, $param2=null)
    {
        
    }
}
