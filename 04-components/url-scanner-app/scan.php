<?php
// 1. 使用 Composer 自動載入器
require 'vendor/autoload.php';

// 2. 實例化 Guzzle HTTP 客戶端
$client = new \GuzzleHttp\Client();

// 3. 開啟並迭代 CSV
$csv = \League\Csv\Reader::createFromPath($argv[1]);

foreach ($csv as $csvRow) {
    try {
        // 4. 發送 HTTP 請求
        $httpResponse =  $client->request('GET', $csvRow[0]);

        // 5. 查看 HTTP 回應狀態碼
        if ($httpResponse->getStatusCode() >= 400) {
            throw new \Exception();
        }
    } catch (\Exception $exception) {
        // 6. 發送不良的URLs到標準輸出
        echo $csvRow[0] . PHP_EOL;
    } catch (\GuzzleHttp\Exception\GuzzleException $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
}
