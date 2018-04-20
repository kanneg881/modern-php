<?php
/** @var string $input 輸入 */
$input = 'john@example.com';
/** @var bool $isEmail 是否為合格的email */
$isEmail = filter_var($input, FILTER_VALIDATE_EMAIL);

if ($isEmail !== false) {
    echo "成功";
} else {
    echo "失敗";
}
