<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // 錯誤沒有在 error_reporting 設定中被指定
        // 所以我們忽略
        return;
    }

    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});

trigger_error("這成為一個例外");

// 回復原本的錯誤處理器
restore_error_handler();
