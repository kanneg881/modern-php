<?php

require 'vendor/autoload.php';

use TaiwanEnjoy\Url\Scanner;
use GuzzleHttp\Exception\GuzzleException;

/** @var array $urls 網址 */
$urls = [
    'http://www.apple.com',
    'http://php.net',
    'http://sdfssdwerw.org'
];
/** @var Scanner $scanner 掃瞄器 */
$scanner = new Scanner($urls);

try {
    print_r($scanner->getInvalidUrls());
} catch (GuzzleException $exception) {
    echo $exception->getMessage();
}
