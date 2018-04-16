<?php

/**
 * 封閉人
 *
 * @param string $name 名稱
 * @return Closure
 */
function enclosePerson($name) {
    /**
     * 回傳格式化命令人做某事
     *
     * @param string $doCommand 命令
     * @return string 格式化命令人做某事
     */
    return function ($doCommand) use ($name) {
        return sprintf('%s, %s', $name, $doCommand);
    };
}

// 封入 "Clay" 字串到閉包
$clay = enclosePerson('Clay');

// 調用封閉式命令
echo $clay('給我甜茶!');
// 輸出 --> "Clay, 給我甜茶!"
