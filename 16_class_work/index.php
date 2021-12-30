<?php

require_once 'ArrayHelper.php';

$parameter = ArrayHelper::$arr = [1,2,3];

$sum = ArrayHelper::sumRes($parameter);
$aver = ArrayHelper::averRes($parameter);
$sum2 = ArrayHelper::arrSum($parameter);
$aver2 = ArrayHelper::arrAver($parameter);

var_dump($sum);
var_dump($aver);
echo '<br>';
var_dump($sum2);
var_dump($aver2);