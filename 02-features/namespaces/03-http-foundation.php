<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response as Res;

/** @var Res $r 回應狀態碼 */
$r = new Res('Oops', 400);
$r->send();
