<?php
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SwiftMailerHandler;

ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port","465");
date_default_timezone_set('Asia/Taipei');

/** @var Logger $log Monolog 記錄器 */
$log = new Logger('my-app-name');
$log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));

// 為嚴重錯誤加上 SwiftMailer 處理器
/** @var Swift_SendmailTransport $transport 傳輸 */
$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
             ->setUsername('gamilAccount@gmail.com')
             ->setPassword('googleAppPassword');
/** @var Swift_Mailer $mailer SwiftMailer 處理器 */
$mailer = Swift_Mailer::newInstance($transport);
/** @var Swift_Message $message 訊息 */
$message = Swift_Message::newInstance()
           ->setSubject('網站錯誤!')
           ->setFrom(array('from@gmail.com' => 'YourName'))
           ->setTo(array('to@gmail.com'));
$log->pushHandler(new SwiftMailerHandler($mailer, $message, Logger::CRITICAL));

// 使用記錄器
$log->critical('伺服器著火了!');
