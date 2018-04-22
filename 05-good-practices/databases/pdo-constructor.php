<?php
try {
    /** @var PDO $pdo 資料庫物件 */
    $pdo = new PDO(
        'mysql:host=127.0.0.1;dbname=database_name;port=3306;charset=utf8',
        'username',
        "password");
} catch (PDOException $exception) {
    echo "資料庫連線失敗";
    exit;
}
