<?php
/**
 * 用戶個人資料
 *
 * @author Enjoy
 */

session_start();

if ($_SESSION['user_logged_in'] != 'yes') {
    echo "請登入";
    exit;
}
echo "你好, ", $_SESSION['user_email'];