<?php
date_default_timezone_set('Asia/Taipei');

/** @var DateTime $datetime1 實體日期時間最簡單的方式 */
$datetime1 = new DateTime();

/** @var DateTime $datetime2 實體日期時間帶參數 */
$datetime2 = new DateTime('2018-04-21 6:00 AM');

/** @var DateTime $datetime3 實體靜態格式化日期時間 */
$datetime3 = DateTime::createFromFormat('M j, Y H:i:s', 'April 21, 2018 00:00:00');
