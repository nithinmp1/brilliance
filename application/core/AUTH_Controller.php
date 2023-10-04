<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AUTH_Controller extends MX_Controller
{
    protected $history;

    public function __construct()
    {
        parent::__construct();
        $this->history = $this->config->item('admin_history');

    }
    function login_check(){
        if (!$this->session->userdata('logged_in')) {
            // $userType = $this->session->userdata('user_type');
            // echo $userType;die;
            redirect('user');
        }
    }

    protected function saveHistory($activity)
    {
        if ($this->history === true) {
            $this->load->model('History_model');
            $usr = $this->username;
            $this->History_model->setHistory($activity, $usr);
        }
    }
}