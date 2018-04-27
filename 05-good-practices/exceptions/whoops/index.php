<?php
require 'vendor/autoload.php';

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

/** @var Run $whoops 設定 Whoops 錯誤和例外處理 */
$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

throw new Exception('這是一個例外!');
