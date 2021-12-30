<?php

class ArrayHelper
{
    public static array $arr = [];

    public static function arrSum(array $arr)
    {
        return array_sum(self::$arr);
    }

    public static function arrAver(array $arr)
    {
        return array_sum(self::$arr) / count(self::$arr);
    }

    public static function sumRes(array $arr){
        return self::arrSum($arr);
    }

    public static function averRes(array $arr){
        return self::arrAver($arr);
    }
}