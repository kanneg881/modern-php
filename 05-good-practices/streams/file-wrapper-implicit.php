<?php
/** @var resource|bool $handle 檔案資源 */
$handle = fopen('/etc/hosts', 'rb');

while (feof($handle) !== true) {
    echo fgets($handle);
}
fclose($handle);
