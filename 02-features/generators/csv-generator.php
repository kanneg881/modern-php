<?php

/**
 * 取得檔案每一列的內容
 *
 * @param string $file 檔案
 * @return Generator
 * @throws Exception
 */
function getRows($file)
{
    /** @var bool|resource $handle 檔案資源 */
    $handle = fopen($file, 'rb');

    if (!$handle) {
        throw new Exception();
    }

    while (!feof($handle)) {
        yield fgetcsv($handle);
    }

    fclose($handle);
}

try {
    /** @var string $row 檔案每一列的內容 */
    foreach (getRows('data.csv') as $row) {
        print_r($row);
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}

