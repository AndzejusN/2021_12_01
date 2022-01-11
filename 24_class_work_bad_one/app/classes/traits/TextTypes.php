<?php

namespace App\classes\traits;

trait TextTypes
{
    public function label($text){
        return "<label>{$text}</label>";
    }

    public function submit($text){
        return "<input type=\"submit\" value=\"{$text}\">";

    }

}