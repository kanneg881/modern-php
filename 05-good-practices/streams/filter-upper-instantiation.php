<?php
/** @var resource|bool $handle 檔案資源 */
$handle = fopen('php://filter/read=string.toupper/resource=data.txt', 'rb');

while(feof($handle) !== true) {
    // 輸出所有大寫字元
    echo fgets($handle);
}
fclose($handle);
