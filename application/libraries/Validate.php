<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Validate Before access
| -------------------------------------------------------------------------
| 
|
*/

class Validate {
	private $token ; 

	function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('token');
        $this->CI->load->library('dynamicObject');
        $this->CI->load->library('input');
    }

	function validateToken($value=''){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$bearerToken = $this->CI->input->post('token');
        	$this->token = explode(' ', $bearerToken)[1];

		} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        	$this->token = $_SESSION['token'];
		} else {
		    
		}
		try{
			if (isset($this->token) && $this->token != '') {
				$payload = $this->CI->token->payload($this->token);
				$dynamicObject = dynamicObject::getInstance();
				$dynamicObject->set('user', $payload);
			}

		} catch (Exception $e) {
		    echo "An exception occurred: " . $e->getMessage();die;
		} 
	}
}

