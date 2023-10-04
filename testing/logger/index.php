<?php

require '../../vendor/autoload.php'; // If you're using Composer (recommended)

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a logger
$log = new Logger('my_logger');

// Create a log file handler and set the log level (e.g., INFO, ERROR)
$log->pushHandler(new StreamHandler('logfile.log', Logger::INFO));
$log->error('An error occurred.', ['user_id' => 123, 'exception' => ['data' => 'error']]);
