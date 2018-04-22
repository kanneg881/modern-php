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
$query = 'SELECT id, email FROM users WHERE email = :email';
/** @var PDOStatement|bool $statement 預備陳述式 */
$statement = $pdo->prepare($query);
/** @var string $email 電子郵件 */
$email = filter_input(INPUT_GET, 'email');
$statement->bindValue(':email', $email, PDO::PARAM_INT);

// 每次迭代一個結果
echo '一個關聯陣列的結果', PHP_EOL;
$statement->execute();

/** @var array $result 一次一個結果 */
while (($result = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
    echo $result['email'], PHP_EOL;
}

// 一次迭代整個結果
echo '一次整個結果作為關聯陣列', PHP_EOL;
$statement->execute();
/** @var array $allResults 一次所有的結果 */
$allResults = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($allResults as $result) {
    echo $result['email'], PHP_EOL;
}

// 一次獲取一個欄位值
echo '一次取一列、一欄作為關聯陣列', PHP_EOL;
$statement->execute();

while (($email = $statement->fetchColumn(1)) !== false) {
    echo $email, PHP_EOL;
}

// 迭代結果作為物件
echo '一次一個結果作為物件', PHP_EOL;
$statement->execute();

while (($result = $statement->fetchObject()) !== false) {
    echo $result->email, PHP_EOL;
}
