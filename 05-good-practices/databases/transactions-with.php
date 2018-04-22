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
} catch (PDOException $e) {
    echo "資料庫連線失敗";
    exit;
}

/** @var PDOStatement|bool $statementSubtract 預備陳述式減去 */
$statementSubtract = $pdo->prepare('
    UPDATE accounts
    SET amount = amount - :amount
    WHERE name = :name
');
/** @var PDOStatement|bool $statementAdd 預備陳述式減去 */
$statementAdd = $pdo->prepare('
    UPDATE accounts
    SET amount = amount + :amount
    WHERE name = :name
');

// 開始交易
$pdo->beginTransaction();

// 從帳戶 1 抽取一筆資金
/** @var string $fromAccount 來自的帳戶 */
$fromAccount = 'Checking';
/** @var int $withdrawal 抽取的資金 */
$withdrawal = 50;
$statementSubtract->bindParam(':name', $fromAccount);
$statementSubtract->bindParam(':amount', $withdrawal, PDO::PARAM_INT);
$statementSubtract->execute();

// 將資金存入帳戶 2
/** @var string $toAccount 存入的帳戶 */
$toAccount = 'Savings';
/** @var int $deposit 存入的資金 */
$deposit = 50;
$statementAdd->bindParam(':name', $toAccount);
$statementAdd->bindParam(':amount', $deposit, PDO::PARAM_INT);
$statementAdd->execute();

// 承認交易
$pdo->commit();
