<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Monolog {
    private $logger;

    function __construct() {
        $this->logger = new Logger('my_logger');

        $this->logger->pushHandler(new StreamHandler('logfile.log', Logger::INFO));
    }

    function push(array $data) {
        $this->logger->error('An error occurred.', ['user_id' => 123, 'exception' => ['data' => $data]]);
    }

    function info(array $data) {
        $this->logger->info('An event occurred.', 
        [
            'user_id' => 123,
            'info' => 
                [
                    'function' => $data['function'],
                    'status' => $data['status']
                ]
            ]);
    }
}