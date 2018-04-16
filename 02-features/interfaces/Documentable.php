<?php
/**
 * 搜集來自不同來源的文字介面
 */

interface Documentable
{
    /**
     * 取得唯一的ID
     *
     * @return string 唯一的ID
     */
    public function getId();

    /**
     * 取得內容
     *
     * @return string 內容
     */
    public function getContent();
}
