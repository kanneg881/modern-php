<?php
date_default_timezone_set('Asia/Taipei');

/** @var DateTime $datetime 建立日期時間實體 */
$datetime = new DateTime();

try {
    /** @var DateInterval $interval 建立兩週區間 */
    $interval = new DateInterval('P2W');
} catch (Exception $exception) {
    echo $exception->getMessage();
}

// 更動日期時間實體
$datetime->add($interval);
echo $datetime->format('Y-m-d H:i:s');
