<?php
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/** @var Logger $log Monolog 記錄器 */
$log = new Logger('我的應用程式名稱');
$log->pushHandler(new StreamHandler('logs/development.log', Logger::WARNING));

// 使用記錄器
$log->warning('這是一個警告!');
