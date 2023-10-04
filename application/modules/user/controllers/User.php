<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends AUTH_Controller
{
    public function __construct()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL & ~E_DEPRECATED);
        parent::__construct();
        $this->load->model(array('admin/History_model','admin/Home_admin_model'));
        $this->load->library('input');
        $this->load->library('form_validation');
        $this->load->library('token');
    }

    public function index()
    {
        // $this->login_check();
        if ($this->session->userdata('logged_in')) {
            $userType = $this->session->userdata('logged_as');
            redirect($userType.'/home');
        }
        $data = array();
        $head = array();
        $head['title'] = 'Login';
        $head['description'] = '';
        $head['keywords'] = '';
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run($this)) {
                $result = $this->Home_admin_model->loginCheck($_POST);
                if (!empty($result)) {

                    $payload = [
                        'login_as' => $result['user_type'],
                        'login_id' => $result['id'],
                        'username' => $result['username'],
                        'time' => time(),
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'device' => $_SERVER['HTTP_USER_AGENT'],
                        'accessID' => $result['accessManagement_id'],
                    ];

                    $this->session->set_userdata('token', $this->token->create($payload));
                    $_SESSION['last_login'] = $result['last_login'];
                    

                    $this->session->set_userdata('first_name', $result['first_name']);
                    $this->session->set_userdata('logged_in', $result['username']);
                    $this->session->set_userdata('logged_id', $result['id']);
                    $this->session->set_userdata('logged_as', $result['user_type']);
                    
                    
                    $this->saveHistory($result['user_type'].' ' . $result['username'] . ' logged in');
                    redirect('dashboard');
                } else {
                    $this->saveHistory('Cant login with - User: ' . $_POST['username'] . ' and Pass: ' . $_POST['username']);
                    $this->session->set_flashdata('err_login', 'Wrong username or password!');
                    redirect('admin');
                }
            }
        }
        $this->load->view('login');
    }

    /*
     * Called from ajax
     */

    public function changePass()
    {
        $this->login_check();
        $result = $this->Home_admin_model->changePass($_POST['new_pass'], $this->username);
        if ($result == true) {
            echo 1;
        } else {
            echo 0;
        }
        $this->saveHistory('Password change for user: ' . $this->username);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }

    function dashboard() {
        if ($this->session->userdata('logged_id')) {
            $userType = $this->session->userdata('logged_as');
            if($userType == 'staff'){
                $userType = 'admin';
            }
            redirect($userType.'/home');
        } else {
            redirect('login');
        }
    }
}
