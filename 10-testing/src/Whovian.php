<?php

class Whovian
{
    /** @var string 最愛的醫生 */
    protected $favoriteDoctor;

    /**
     * 建構子
     *
     * @param string $favoriteDoctor 最愛的醫生
     */
    public function __construct($favoriteDoctor)
    {
        $this->favoriteDoctor = (string)$favoriteDoctor;
    }

    /**
     * 説
     *
     * @return string 回答最愛的醫生
     */
    public function say()
    {
        return '最好的醫生是' . $this->favoriteDoctor;
    }

    /**
     * 回應
     *
     * @param  string $input 輸入醫生
     * @return string 如果喜歡一樣的醫生就回答我認同
     * @throws Exception 喜歡不一樣的醫生就拋出例外
     */
    public function respondTo($input)
    {
        $input = strtolower($input);
        /** @var string $myDoctor 我喜歡的醫生 */
        $myDoctor = strtolower($this->favoriteDoctor);

        if (strpos($input, $myDoctor) === false) {
            throw new Exception(
                sprintf(
                    '沒門!%s是有史以來最好的醫生!',
                    $this->favoriteDoctor
                )
            );
        }

        return '我認同!';
    }
}
