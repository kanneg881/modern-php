<?php
require 'settings.php';

try {
    /** @var PDO $pdo 資料庫物件 */
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
        ),
        $settings['username'],
        $settings['password']
    );
} catch (PDOException $exception) {
    echo "資料庫連線失敗";
    exit;
}
