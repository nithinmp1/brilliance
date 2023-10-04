<?php

/*
 * @Author:    Nithin M P
 *  Gitgub:    https://github.com/nithinmp1
*/
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ADMIN_Controller extends MX_Controller
{

    protected $username;
    protected $activePages;
    protected $allowed_img_types;
    protected $history;

    public function __construct()
    {
        parent::__construct();
        $this->loadTemplate();
        $this->load->library(array('form_validation'));
        $this->history = $this->config->item('admin_history');
        $this->load->model('admin/Home_admin_model');
        $this->load->library('dynamicObject');
    }

    /*
     * Check for selected template 
     * and set it in config if exists
     */

    private function loadTemplate()
    {
        $template = $this->Home_admin_model->getValueStore('template');
        if ($template == null) {
            $template = $this->config->item('template');
        } else {
            $this->config->set_item('template', $template);
        }
        if (!is_dir(TEMPLATES_DIR . $template)) {
            show_error('The selected template does not exists!');
        }
        $this->template = 'admin_templates' . DIRECTORY_SEPARATOR . $template . DIRECTORY_SEPARATOR;

    }

    public function render($view, $head, $data = null, $footer = null)
    {
        $this->load->view($this->template . '_parts/header', $head);
        $this->load->view($this->template . $view, $data);
        $this->load->view($this->template . '_parts/footer', $footer);
        $this->saveHistory('Go to '.$view.' page');
    }

    protected function login_check()
    {
        if (!$this->session->userdata('logged_id')) {
            redirect('user');
        }

        $userType = $this->session->userdata('logged_as');
        if($userType == 'staff' || $userType == 'admin' ){

        }else{
            redirect($userType.'/home');
        }
        $this->username = $this->session->userdata('logged_in');
    }

    protected function saveHistory($fun= null, $seg= null, $status= null)
    {
        return;
        if ($this->history === true) {
            $this->load->model('History_model');
            $usr = $this->username;
            $this->History_model->setHistory($activity, $usr);
        }
    }

    public function getActivePages()
    {
        return null;
    }

    private function warningChecker()
    {
        $errors = array();

        // Check application/language folder is writable
        if (!is_writable(APPPATH . 'language')) {
            $errors[] = 'Language folder is not writable!';
        }

        // Check application/logs folder is writable
        if (!is_writable(APPPATH . 'logs')) {
            $errors[] = 'Logs folder is not writable!';
        }

        // Check attachments folder is writable
        if (!is_writable('.' . DIRECTORY_SEPARATOR . 'attachments')) {
            $errors[] = 'Attachments folder is not writable!';
        } else {
            /*
             *  Check attachment directories exsists..
             *  ..and create him if no exsists
             */
            if (!file_exists('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'blog_images')) {
                $old = umask(0);
                mkdir('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'blog_images', 0777, true);
                umask($old);
            }
            if (!file_exists('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'lang_flags')) {
                $old = umask(0);
                mkdir('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'lang_flags', 0777, true);
                umask($old);
            }
            if (!file_exists('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'shop_images')) {
                $old = umask(0);
                mkdir('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'shop_images', 0777, true);
                umask($old);
            }
            if (!file_exists('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'site_logo')) {
                $old = umask(0);
                mkdir('.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'site_logo', 0777, true);
                umask($old);
            }
        }
        return $errors;
    }

}
