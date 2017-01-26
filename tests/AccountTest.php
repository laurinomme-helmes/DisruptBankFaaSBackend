<?php namespace tests;

use DisruptBank\Account;

class AccountTest extends \PHPUnit_Framework_TestCase {
    /** @var Account */
    protected $account;

    protected function setUp() {
        $this->account = new Account();
    }

    public function testBalance_Initially_Zero() {
        $this->assertEquals(0, $this->account->balance());
    }

    public function testDeposit_PositiveAmount_IncreasesBalance() {
        $this->account->deposit(1);
        $this->assertGreaterThanOrEqual(1, $this->account->balance());
    }

    public function testWithdraw_SufficientAmount_DecreasesBalance() {
        $this->account->deposit(100);
        $this->account->withdraw(50);
        $this->assertEquals(50, $this->account->balance());
    }

    /**
     * @expectedException \Exception
     */
    public function testWithdraw_InsufficientAmount_ThrowsException() {
        $this->account->deposit(100);
        $this->account->withdraw(9001);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Negative amount
     */
    public function testWithdraw_NegativeAmount_ThrowsException() {
        $this->account->withdraw(-123);
    }
}
