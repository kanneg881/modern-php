<?php
/**
 * 串流文件
 */

class StreamDocument implements Documentable
{
    /** @var resource 資源 */
    protected $resource;
    /** @var int 緩衝 */
    protected $buffer;

    /**
     * StreamDocument 建構子.
     *
     * @param resource $resource 資源
     * @param int $buffer 緩衝
     */
    public function __construct($resource, $buffer = 4096)
    {
        $this->resource = $resource;
        $this->buffer = $buffer;
    }

    /**
     * 取得唯一的ID
     *
     * @return string 唯一的ID
     */
    public function getId()
    {
        return 'resource-' . (int)$this->resource;
    }

    /**
     * 取得內容
     *
     * @return string 內容
     */
    public function getContent()
    {
        /** @var string $streamContent 串流內容 */
        $streamContent = '';
        rewind($this->resource);

        while (feof($this->resource) === false) {
            $streamContent .= fread($this->resource, $this->buffer);
        }

        return $streamContent;
    }
}
