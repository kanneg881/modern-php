<?php
date_default_timezone_set('Asia/Taipei');

/** @var DateTime $dateStart 起始日期時間 */
$dateStart = new DateTime();
/** @var DateInterval $dateInterval 時間間隔 */
$dateInterval = DateInterval::createFromDateString('-1 day');
/** @var DatePeriod $datePeriod 時間週期 */
/** @noinspection PhpParamsInspection */
$datePeriod = new DatePeriod($dateStart, $dateInterval, 6);

/** @var DateTime $date 迭代日期時間 */
foreach ($datePeriod as $date) {
    echo $date->format('Y-m-d'), PHP_EOL;
}
