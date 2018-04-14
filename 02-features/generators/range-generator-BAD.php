<?php

/**
 * 產生範圍數值
 *
 * @param int $length 長度
 * @return array 範圍數值
 */
function makeRange($length) {
    /** @var array $range 範圍數值 */
    $range = [];

    for ($i = 0; $i < $length; $i++) {
        $range[] = $i;
    }

    return $range;
}

/** @var array $customRange 範圍數值 */
$customRange = makeRange(1000000);

/** @var int $value 數值 */
foreach ($customRange as $value) {
    echo $value , PHP_EOL;
}
