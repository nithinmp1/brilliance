<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_controller'] = array(
    'class'    => 'Validate',
    'function' => 'validateToken', // Your custom function
    'filename' => 'Validate.php', // The file where the function is located
    'filepath' => 'libraries', // The directory where the file is located
);