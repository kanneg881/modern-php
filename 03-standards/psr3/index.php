<?php
require 'vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

date_default_timezone_set('Asia/Taipei');

/** @var Logger $log log物件 */
$log = new Logger('myApp');

try {
    $log->pushHandler(new StreamHandler('logs/development.log', Logger::DEBUG));
    $log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));
} catch (Exception $exception) {
    echo $exception->getMessage();
}

// Use logger
$log->debug('This is a debug message');
$log->warning('This is a warning message');
