<?php

$arr = ['!', 'Hello', 'world'];

$result = '\'' . $arr[1] . ', ' . $arr[2] . $arr[0] . '\'';

echo $result;