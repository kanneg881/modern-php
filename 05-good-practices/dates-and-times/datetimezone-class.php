<?php
date_default_timezone_set('Asia/Taipei');

/** @var DateTimeZone $timezone 時區 */
$timezone = new DateTimeZone('Asia/Taipei');
/** @var DateTime $datetime 日期時間 */
$datetime = new DateTime('2018-04-21', $timezone);
$datetime->setTimezone(new DateTimeZone('Asia/Taipei'));
