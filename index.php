<?php

require_once 'autoload.php';

$model = new \Hillel\src\Models\Currency('UAH');
$model1 = new \Hillel\src\Models\Currency('UAH');
$model2 = $model->equals($model1);
var_dump($model2);

$currency = new \Hillel\src\Models\Currency('UAH');
$currency1 = new \Hillel\src\Models\Currency('UAH');
$money = new \Hillel\src\Models\Money(123,$currency);
$money1 = new \Hillel\src\Models\Money(76,$currency1);
$money2 = $money->add($money1);
var_dump($money2);