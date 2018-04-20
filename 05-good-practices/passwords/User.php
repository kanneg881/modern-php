<?php
/**
 * 用戶類別
 *
 * @author Enjoy
 */

class User
{
    /** @var string 電子郵件 */
    public $email;
    /** @var string 密碼雜湊 */
    public $passwordHash;

    /**
     * User 建構子
     *
     * @param string $email 電子郵件
     * @param string $passwordHash 密碼雜湊
     */
    public function __construct($email = '', $passwordHash = '')
    {
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    /**
     * 用電子郵件位址查找密碼雜湊
     *
     * @param string $email 電子郵件
     * @return User 用戶類別
     */
    public static function findByEmail($email)
    {
        // 實作在這裡

        /** @var string $passwordHash 密碼 12345678 的雜湊 */
        $passwordHash = '$2y$12$WFOaBwhKk4O.5bjD0vMdaO.rjaSxTuqC5jiNPPEFp5roDQxhzm.gi';

        return new User($email, $passwordHash);
    }

    /**
     * 儲存資料
     */
    public function save()
    {
        // 實作在這裡
    }
}