<?php

function accessible($value)
{
    return is_array($value) || $value instanceof ArrayAccess;
}

function exists($array, $key)
{
    if ($array instanceof ArrayAccess) {
        return $array->offsetExists($key);
    }
    return array_key_exists($key, $array);
}

function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }

function dataGet($array, $key, $default = null)
{
    if (! accessible($array)) {
        return value($default);
    }
    if (is_null($key)) {
        return $array;
    }
    if (exists($array, $key)) {
        return $array[$key];
    }
    if (strpos($key, '.') === false) {
        return $array[$key] ?? value($default);
    }
    foreach (explode('.', $key) as $segment) {
        if (accessible($array) && exists($array, $segment)) {
            $array = $array[$segment];
        } else {
            return value($default);
        }
    }
    return $array;
}