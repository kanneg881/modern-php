<?php
/**
 * 一個指定專案實作的例子
 *
 * 使用SPL註冊該自動加載功能後，以下行會引起該函式嘗試載入 \Foo\Bar 類別
 * 從 /path/to/project/src/Bar.php:
 *
 * @param string $class 完全合格的類別名稱。
 * @return void
 */
spl_autoload_register(
    function ($class) {

        /** @var string $prefix 指定專案的名稱空間字首 */
        $prefix = 'Foo\\';

        /** @var string $base_dir 名稱空間字首的基底目錄 */
        $base_dir = __DIR__ . '/src/';

        /** @var bool $length 這個類別使用了名稱空間的字首嗎 */
        $length = strlen($prefix);

        // 若沒有，移到下一個註冊的自動載入器
        if (strncmp($prefix, $class, $length) !== 0) {
            return;
        }

        // 取得相關的類別名稱
        $relative_class = substr($class, $length);

        /**
         * 將名稱空間字首替換成基底目錄，在相關類別名稱中
         * 將名稱空間分隔字元替換成目錄分隔字元並加上.php
         *
         * @var string $file class 檔
         */
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // 如果這個檔案存在，匯入它
        if (file_exists($file)) {
            require $file;
        }
    }
);

$bar = new \Foo\Bar();
$bar->sayHello();
