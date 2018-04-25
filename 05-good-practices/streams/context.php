<?php
/** @var string $requestBody 請求主體 */
$requestBody = '{"username":"josh"}';
/** @var resource $context 請求資源 */
$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/json;charset=utf-8;\r\n" .
            "Content-Length: " . mb_strlen($requestBody),
        'content' => $requestBody
    )
));
/** @var bool|string $response 回應資源 */
$response = file_get_contents('https://my-api.com/users', false, $context);
