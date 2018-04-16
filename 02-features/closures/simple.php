<?php

/**
 * @param string $name 名稱
 * @return string 格式化問候字串
 */
$closure = function ($name) {
    return sprintf('Hello %s', $name);
};

echo $closure("Josh");
// 輸出 --> "Hello Josh"
