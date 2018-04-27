<?php
try {
    /** @var PDO $pdo PDO資料庫 */
    $pdo = new PDO('mysql://host=wrong_host;dbname=wrong_name');
} catch (PDOException $exception) {
    /** @var int|mixed $code 錯誤代碼 */
    $code = $exception->getCode();
    /** @var string $message 錯誤訊息 */
    $message = $exception->getMessage();

    // 顯示友善的錯誤訊息給使用者
    echo '出了些問題。 請稍後回來檢查。';
    exit;
}
