<?php
/** @var resource|bool $handle 檔案資源 */
$handle = fopen('data.txt', 'rb');
stream_filter_append($handle, 'string.toupper');

while(feof($handle) !== true) {
    // 輸出所有大寫字元
    echo fgets($handle);
}
fclose($handle);
