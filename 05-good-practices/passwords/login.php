<?php
require_once "User.php";

session_start();

try {
    /** @var mixed $email 從請求中取得電子郵件位址 */
    $email = filter_input(INPUT_POST, 'email');

    /** @var mixed $password 從請求中取得密碼 */
    $password = filter_input(INPUT_POST, 'password');

    // 用電子郵件位址查找密碼 (這是虛擬碼)
    $user = User::findByEmail($email);

    // 用帳戶密碼的雜湊值驗證密碼，測試密碼 12345678
    if (password_verify($password, $user->passwordHash) === false) {
        throw new Exception('無效的密碼');
    }

    /** @var int $hashAlgorithm 雜湊演算法 */
    $hashAlgorithm = PASSWORD_DEFAULT;
    /** @var array $hashOptions 雜湊演選項 */
    $hashOptions = array('cost' => 15);
    /** @var bool $passwordNeedsRehash 必要時重新雜湊密碼（查看以下筆記） */
    $passwordNeedsRehash = password_needs_rehash(
        $user->passwordHash,
        $hashAlgorithm,
        $hashOptions
    );

    if ($passwordNeedsRehash === true) {
        // 儲存新的密碼雜湊（這是虛擬碼）
        $user->passwordHash = password_hash(
            $password,
            $hashAlgorithm,
            $hashOptions
        );
        $user->save();
    }

    // 儲存登入狀態到 session
    $_SESSION['user_logged_in'] = 'yes';
    $_SESSION['user_email'] = $email;

    // 重新導向到個人資料頁面
    header('HTTP/1.1 302 Redirect');
    header('Location: ./userProfile.php');
} catch (Exception $exception) {
    header('HTTP/1.1 401 Unauthorized');
    echo $exception->getMessage();
}
