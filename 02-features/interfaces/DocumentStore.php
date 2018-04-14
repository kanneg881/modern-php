<?php
/**
 * 實體文件
 */

class DocumentStore
{
    /** @var array 文字資料 */
    protected $data = [];

    /**
     * 增加文件
     *
     * @param Documentable $document
     */
    public function addDocument(Documentable $document)
    {
        /** @var string $key 文字資料的鍵值 */
        $key = $document->getId();
        /** @var string $value 文字資料的值 */
        $value = $document->getContent();
        $this->data[$key] = $value;
    }

    /**
     * 取得文字資料
     *
     * @return array 文字資料
     */
    public function getDocuments()
    {
        return $this->data;
    }
}
