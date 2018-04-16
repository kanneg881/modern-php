<?php
/**
 * HTML文件
 */

class HtmlDocument implements Documentable
{
    /** @var string 網址 */
    protected $url;

    /**
     * HtmlDocument 建構子.
     *
     * @param string $url 網址
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * 取得唯一的ID
     *
     * @return string 唯一的ID
     */
    public function getId()
    {
        return $this->url;
    }

    /**
     * 取得內容
     *
     * @return string 內容
     */
    public function getContent()
    {
        /** @var resource $curl 連接通訊各種服務器 */
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);

        /** @var mixed $html html 資源 */
        $html = curl_exec($curl);

        curl_close($curl);

        return $html;
    }
}
