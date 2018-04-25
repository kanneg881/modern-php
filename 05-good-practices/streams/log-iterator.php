<?php
/** @var DateTime $dateStart 實體日期時間 */
$dateStart = new DateTime();
/** @var DateInterval $dateInterval 實體日期區間 */
$dateInterval = DateInterval::createFromDateString('-1 day');
/** @var DatePeriod $datePeriod 實體日期區間 */
/** @noinspection PhpParamsInspection */
$datePeriod = new \DatePeriod($dateStart, $dateInterval, 30);

/** @var DateTime $date 日期時間 */
foreach ($datePeriod as $date) {
    /** @var string $file 檔案串流 */
    $file = 'sftp://USER:PASS@rsync.net/' . $date->format('Y-m-d') . '.log.bz2';

    if (file_exists($file)) {
        /** @var bool|resource $handle 檔案資源 */
        $handle = fopen($file, 'rb');
        stream_filter_append($handle, 'bzip2.decompress');

        while (feof($handle) !== true) {
            /** @var bool|string $line 每一行內容 */
            $line = fgets($handle);

            if (strpos($line, 'www.example.com') !== false) {
                fwrite(STDOUT, $line);
            }
        }
        fclose($handle);
    }
}
