<?php

namespace App\classes\traits;

trait OtherTypes
{
    public function input($type, $text, $value){
        if (in_array($type, $this->file) == FALSE) {
            throw new Exception('Not allowed type');
        }
        return "<input type=\"{$type}\" placeholder=\"{$text}\" value=\"{$value}\">";
    }
}