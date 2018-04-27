<?php

// 建立客製過濾器
class DirtyWordsFilter extends php_user_filter
{
    /**
     * 過濾器
     *
     * @param resource $in 進來的 bucket brigade
     * @param resource $out 出去的 bucket brigade
     * @param int $consumed 消耗的字元數
     * @param bool $closing 串流中的最後一個桶隊?
     * @return int 返回代碼指示用戶空間過濾器以 $out 的形式返回 bucket。
     */
    public function filter($in, $out, &$consumed, $closing)
    {
        /** @var array $dirtyWords 不雅的字 */
        $dirtyWords = array('grime', 'dirt', 'grease');
        /** @var array $replaceWords 取代成 * 文字 */
        $replaceWords = array();

        foreach ($dirtyWords as $word) {
            /** @var array $replacement 每一個字一個索引鍵值為 * */
            $replacement = array_fill(0, mb_strlen($word), '*');
            $replaceWords[] = implode('', $replacement);
        }

        // 從進來的 bucket brigade 中迭代每個 bucket
        while ($bucket = stream_bucket_make_writeable($in)) {
            // 在 bucket 資料中過濾掉不雅字詞
            $bucket->data = str_replace($dirtyWords, $replaceWords, $bucket->data);
            // 增加讀取的資料總數
            $consumed += $bucket->datalen;
            // 將 bucket 發送到下游的 brigade
            stream_bucket_append($out, $bucket);
        }

        return PSFS_PASS_ON;
    }
}
stream_filter_register('dirty_words_filter', 'DirtyWordsFilter');

/** @var resource|bool $handle 使用客製過濾器 */
$handle = fopen('data.txt', 'rb');
stream_filter_append($handle, 'dirty_words_filter');

while (feof($handle) !== true) {
    echo fgets($handle);
}
fclose($handle);
