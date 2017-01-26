<?php

namespace DisruptBank;

class Account {
    /** @var int */
    public $balance;

    /**
     * Account constructor.
     */
    public function __construct() {
        $this->balance = 0;
    }

    /**
     * @param int $amount
     */
    public function withdraw($amount) {
        if ($amount < 0)
            throw new \InvalidArgumentException('Negative amount');

        if ($this->balance < $amount)
            throw new \LogicException("Insufficient funds");

        $this->balance -= $amount;
    }

    /**
     * @param int $amount
     */
    public function deposit($amount) {
        if ($amount < 0)
            throw new \InvalidArgumentException('Negative amount');

        $this->balance += $amount;
    }

    /**
     * @return int
     */
    public function balance() {
        return $this->balance;
    }
}