<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue) {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    private function setRed($red) {
        if ($red < 0 || $red > 255) {
            throw new InvalidArgumentException('диапазон');
        } else {
            $this->red = $red;
        }
    }

    private function setGreen($green) {
        if ($green < 0 || $green > 255) {
            throw new InvalidArgumentException('диапазон');
        } else {
            $this->green = $green;
        }
    }

    private function setBlue($blue) {
        if ($blue < 0 || $blue > 255) {
            throw new InvalidArgumentException('диапазон');
        } else {
            $this->blue = $blue;
        }
    }

    public function getRed() {
        return $this->red;
    }

    public function getGreen() {
        return $this->green;
    }

    public function getBlue() {
        return $this->blue;
    }

    public function equals(ValueObject $valueObject) {
        if ($this->red == $valueObject->getRed() && $this->green == $valueObject->getGreen() && $this->blue == $valueObject->getBlue()) {
            return true;
        } else {
            return false;
        }
    }

    public static function random() {
        return new ValueObject(rand(0,255),rand(0,255),rand(0,255));
    }

    public function mix(ValueObject $valueObject) {
        return new ValueObject(
            ($this->red + $valueObject->getRed()) / 2,
            ($this->green + $valueObject->getGreen()) / 2,
            ($this->blue + $valueObject->getBlue()) / 2
        );
    }

}

$model = new ValueObject(1,1,1);
$model1 = new ValueObject(1,1,1);
$model2 = $model->equals($model1);
$model3 = $model1::random();
$model4 = $model->mix($model1);
var_dump($model4);

