<?php
// 註冊你的例外處理器
set_exception_handler(function (Exception $exception) {
    // 處理並記錄例外
    echo "處理例外: " . $exception->getMessage();
});

// 你的程式碼在此...
throw new Exception("發生了一些錯誤!");

// 回復原本的例外處理器
restore_exception_handler();
