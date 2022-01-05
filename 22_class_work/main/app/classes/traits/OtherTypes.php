<?php

namespace App\classes\traits;

trait OtherTypes
{
    public function input($type, $text, $value){
        if (in_array($type, self::ALLOWED_TYPE) == FALSE) {
            throw new Exception('Not allowed type');
        }
        return "<input type=\"{$type}\" placeholder=\"{$text}\" value=\"{$value}\">";
    }


}