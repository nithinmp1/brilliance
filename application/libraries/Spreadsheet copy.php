<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Spreadsheet {

    public function __construct() {
        log_message('info', 'Spreadsheet class is loaded.');
    }

    public function load($filename) {
        return IOFactory::load($filename);
    }

    public function save($spreadsheet, $filename) {
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filename);
    }

    
}
