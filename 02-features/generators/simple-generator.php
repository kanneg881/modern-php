<?php

/**
 * 產生器範例
 *
 * @return Generator
 */
function myGenerator() {
    yield 'value1';
    yield 'value2';
    yield 'value3';
}

/** @var string $value 值 */
foreach (myGenerator() as $value) {
    echo $value . PHP_EOL;
}
