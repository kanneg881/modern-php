<?php
require dirname(__DIR__) . '/src/Whovian.php';

use PHPUnit\Framework\TestCase;

class WhovianTest extends TestCase
{
    /**
     * 測試建構子設定醫生
     */
    public function testSetsDoctorWithConstructor()
    {
        /** @var Whovian $whovian 測試物件 */
        $whovian = new Whovian('黑傑克');
        $this->assertAttributeEquals('黑傑克', 'favoriteDoctor',
            $whovian);
    }

    /**
     * 測試 say() 方法回傳值
     */
    public function testSaysDoctorName()
    {
        /** @var Whovian $whovian 測試物件 */
        $whovian = new Whovian('華佗');
        $this->assertEquals('最好的醫生是華佗', $whovian->say());
    }

    /**
     * 測試 respondTo() 同意機制
     *
     * @throws Exception
     */
    public function testRespondToInAgreement()
    {
        /** @var Whovian $whovian 測試物件 */
        $whovian = new Whovian('華佗');
        /** @var string $opinion 看法 */
        $opinion = '華佗是最好的醫生，當時';
        $this->assertEquals('我認同!', $whovian->respondTo($opinion));
    }

    /**
     * 測試 respondTo() 不同意機制
     *
     * @expectedException Exception
     */
    public function testRespondToInDisagreement()
    {
        /** @var Whovian $whovian 測試物件 */
        $whovian = new Whovian('華佗');
        /** @var string $opinion 看法 */
        $opinion = '沒門。黑傑克才棒!';
        $whovian->respondTo($opinion);
    }
}
