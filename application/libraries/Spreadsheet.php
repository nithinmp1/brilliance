<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

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

    public function checkCellIsMergedOne($cellAddressToCheck, $mergedCellValues) {
        list($cellColumn, $cellRow) = Coordinate::coordinateFromString($cellAddressToCheck);
        foreach ($mergedCellValues as $key => $value) {
            $range = explode(':',$key);
            list($startColumn, $startRow) = Coordinate::coordinateFromString($range[0]);
            list($endColumn, $endRow) = Coordinate::coordinateFromString($range[1]);
            if (
                $cellColumn === $startColumn && $cellRow >= $startRow && $cellRow <= $endRow
            ) {
                return $range[0];
            } 
        }

        return null;
    }
}
