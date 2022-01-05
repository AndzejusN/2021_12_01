<?php

if (!function_exists('env')) {
    function env($name, $default = FALSE) {
        return isset(_ENV[$name]) ? _ENV[$name] : $default;
    }
} else {
    throw new Exception('Env function exist');
}

if (!function_exists('dd')) {
    function dd() {
        array_map(function($x) {
            var_dump($x);
        }, func_get_args());

        die(0);
    }
}

if (!function_exists('asset')) {
    function asset($asset) {
        $manifestPath = ROOT_PATH . '/public/mix-manifest.json';

        if (!is_file($manifestPath)) {
            throw new Exception('Manifest file not found', 500);
        }

        $manifest = file_get_contents($manifestPath);
        $manifest = json_decode($manifest, TRUE);

        if (array_key_exists($asset, $manifest)) {
            return $manifest[$asset];
        } else {
            throw new Exception('Asset in manifest file not found', 500);
        }

        return $asset;
    }
}