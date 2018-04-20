<?php
require_once "User.php";

try {
    /** @var mixed $email 驗證電子郵件 */
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (!$email) {
        throw new Exception('無效的電子郵件');
    }

    /** @var mixed $password 驗證密碼 */
    $password = filter_input(INPUT_POST, 'password');

    if (!$password || mb_strlen($password) < 8) {
        throw new Exception('密碼必須大於8個字元');
    }

    // 建立密碼雜湊值
    $inputPasswordHash = password_hash(
        $password,
        PASSWORD_DEFAULT,
        ['cost' => 12]
    );

    if ($inputPasswordHash === false) {
        throw new Exception('密碼雜湊失敗');
    }

    // 建立使用者帳戶 (這是虛擬碼)
    $user = new User();
    $user->email = $email;
    $user->passwordHash = $inputPasswordHash;
    $user->save();

    // 重新導向到登入頁面
    header('HTTP/1.1 302 Redirect');
    // 導向網址
    header('Location: ./login.php');
} catch (Exception $exception) {
    // 回報錯誤
    header('HTTP/1.1 400 Bad request');
    echo $exception->getMessage();
}
