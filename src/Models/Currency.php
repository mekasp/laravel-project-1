<?php

namespace Hillel\Src\Models;

class Currency
{
    private $isoCode;

    public function __construct($isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    private function setIsoCode($isoCode)
    {
        if (mb_strlen($isoCode) != 3 || !ctype_upper($isoCode)) {
            throw new InvalidArgumentException('формат не верный');
        } else {
            $this->isoCode = $isoCode;
        }
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    public function equals(Currency $currency)
    {
        if ($this->isoCode == $currency->getIsoCode()) {
            return true;
        } else {
            return false;
        }
    }
}

