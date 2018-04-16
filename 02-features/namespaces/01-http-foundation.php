<?php
require 'vendor/autoload.php';

/** @var \Symfony\Component\HttpFoundation\Response $response 回應狀態碼 */
$response = new \Symfony\Component\HttpFoundation\Response('Oops', 400);
$response->send();
