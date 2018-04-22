<?php
date_default_timezone_set('America/New_York');

/** @var DateTime $start 起始日期時間 */
$start = new DateTime();

try {
    /** @var DateInterval $interval 時間區間 */
    $interval = new DateInterval('P2W');
} catch (Exception $exception) {
    echo $exception->getMessage();
}

/** @var DatePeriod $period 時間週期 */
/** @noinspection PhpParamsInspection */
$period = new DatePeriod(
    $start,
    $interval,
    3,
    DatePeriod::EXCLUDE_START_DATE
);

/** @var DateTime $nextDateTime 迭代日期時間 */
foreach ($period as $nextDateTime) {
    echo $nextDateTime->format('Y-m-d H:i:s'), PHP_EOL;
}
