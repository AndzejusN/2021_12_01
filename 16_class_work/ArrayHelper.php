<?php

class ArrayHelper
{
    public static array $arr = [1,2,3];

    public static function arrSum(array $arr)
    {
        $sum = array_sum(self::$arr);
        return  $sum;
    }

    public static function arrAver(array $arr)
    {
        $ave = array_sum(self::$arr) / count(self::$arr);
        return $ave;
    }

    public static function sumRes(array $arr){
        return self::arrSum($arr);
    }

    public static function averRes(array $arr){
        return self::arrAver($arr);
    }
    }