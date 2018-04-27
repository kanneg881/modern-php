<?php
try {
    throw new Exception('不是一個 PDO 例外');
    /** @var PDO $pdo 不會被執行 */
    $pdo = new PDO('mysql://host=wrongHost;dbname=wrongName');
} catch (PDOException $exception) {
    // 處理 PDO 例外
    echo "捕獲 PDO 例外";
} catch (Exception $exception) {
    // 處理所有其他例外
    echo "捕獲通用例外";
} finally {
    // 永遠這樣做
    echo "總是做這裡";
}
