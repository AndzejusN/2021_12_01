<?php

namespace App;


class Helper
{
    public static function fileAccessibility()
    {
        $fileData = @file_get_contents(ROOT_PATH . '/data/data.json');

        if ($fileData === FALSE) {
            $fileData [] = 'File not accessible';
        } else {
            $fileData = file_get_contents(ROOT_PATH . '/data/data.json');
        }
        $typeData = gettype($fileData);

        if ($typeData !== "array") {
            $fileData = json_decode($fileData, true);
        }
        return $fileData;
    }
}