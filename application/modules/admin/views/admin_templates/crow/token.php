<?php
echo form_hidden('token', 'bearer '.$this->session->userdata('token'));
?>