<?php

namespace App\classes\traits;

trait ValueTypes
{
    public function password($value)
    {
        return "<input type=\"password\" placeholder=\"Enter password\" value=\"{$value}\">";
    }

    public function textarea($value)
    {
        return "<textarea rows=\"4\" cols=\"50\">{$value}</textarea>";
    }
}