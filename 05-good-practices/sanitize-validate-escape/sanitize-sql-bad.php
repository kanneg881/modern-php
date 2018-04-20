<?php
/** @var string $sql 不良的 SQL 查詢 */
$sql = sprintf(
    'UPDATE users SET password = "%s" WHERE id = %s',
    $_POST['password'],
    $_GET['id']
);
echo $sql;
