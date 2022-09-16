<?php

namespace Hillel\Src\Models;

class Money
{
    private $amount;
    private $currency;

    public function __construct($amount, $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    private function setAmount($amount)
    {
        $this->amount = $amount;
    }

    private function setCurrency(Currency $currency)
    {
        $this->currency = $currency->getIsoCode();
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function equals(Money $money)
    {
        if ($this->amount == $money->getAmount() || $this->currency == $money->getCurrency()) {
            return true;
        } else {
            return false;
        }
    }

    public function add(Money $money)
    {
        if ($this->currency != $money->getCurrency()) {
            throw new InvalidArgumentException('формат не соответствует');
        } else {
            return new Money($this->amount + $money->getAmount(),new Currency($this->currency));
        }
    }

}

