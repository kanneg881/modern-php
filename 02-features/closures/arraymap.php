<?php

/** @var array $numbersPlusOne 數字加1 */
$numbersPlusOne = array_map(
    function ($number) {
        return $number + 1;
    },
    [1, 2, 3]);

print_r($numbersPlusOne);
// 輸出 --> [2,3,4]
