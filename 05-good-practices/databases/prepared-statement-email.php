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

/** @var string $query 資料庫查詢 */
$query = 'SELECT id FROM users WHERE email = :email';
/** @var string $email 電子郵件 */
$email = filter_input(INPUT_GET, 'email');

/** @var PDOStatement|bool $statement 預備陳述式 */
$statement = $pdo->prepare($query);
$statement->bindValue(':email', $email);
