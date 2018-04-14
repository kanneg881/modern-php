<?php

/**
 * 產生範圍數值
 *
 * @param int $length 長度
 * @return Generator
 */
function makeRange($length) {
    for ($i = 0; $i < $length; $i++) {
        yield $i;
    }
}

/** @var int $value 數值 */
foreach (makeRange(1000000) as $value) {
    echo $value , PHP_EOL;
}
