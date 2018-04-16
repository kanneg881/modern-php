<?php
/**
 * 終端指令輸出文件
 */

class CommandOutputDocument implements Documentable
{
    /** @var string 指令 */
    protected $command;

    /**
     * CommandOutputDocument 建構子.
     *
     * @param string $command 指令
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * 取得唯一的ID
     *
     * @return string 唯一的ID
     */
    public function getId()
    {
        return $this->command;
    }

    /**
     * 取得內容
     *
     * @return string 內容
     */
    public function getContent()
    {
        return shell_exec($this->command);
    }
}
