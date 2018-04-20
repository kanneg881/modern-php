<?php
/** @var string $string 字串 */
$string = "\nIñtërnâtiônàlizætiøn\t";
/** @var string $safeString 安全的字串*/
$safeString = filter_var(
    $string,
    FILTER_SANITIZE_STRING,
    FILTER_FLAG_STRIP_LOW|FILTER_FLAG_ENCODE_HIGH
);
echo $safeString;
