<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

/** @var Response $response 回應狀態碼 */
$response = new Response('Oops', 400);
$response->send();
