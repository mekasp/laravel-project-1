<?php

//use Hillel\Src\Models\User;

require_once __DIR__ . '/../vendor/autoload.php';

//$model = new \Hillel\Src\Models\Currency('UAH');
//$model1 = new \Hillel\Src\Models\Currency('UAH');
//$model2 = $model->equals($model1);
//var_dump($model2);

//$currency = new \Hillel\Src\Models\Currency('UAH');
//$currency1 = new \Hillel\Src\Models\Currency('UAH');
//$money = new \Hillel\Src\Models\Money(125,$currency);
//$money1 = new \Hillel\Src\Models\Money(76,$currency1);
//$money2 = $money->add($money1);
//var_dump($money2);

$userFind = \Hillel\Src\Models\User::find(2);
//var_dump($userFind);
$user = new \Hillel\Src\Models\User();

$user->id = 5;
$user->name = 'asdad';
$user->email = '@safg';
//var_dump($user);


$userCreate = $user->create();
//var_dump($userCreate);

$userUpdate = $user->update();
//var_dump($userUpdate);

$userDelete = $user->delete();
//var_dump($userDelete);

$userSave = $user->save();
var_dump($userSave);
