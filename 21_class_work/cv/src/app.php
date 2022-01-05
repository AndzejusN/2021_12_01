<?php

$module = isset($_GET['module']) ? $_GET['module'] : FALSE;

if ($module) {
    $modulePath = sprintf('%s/app/modules/%s.php', ROOT_PATH, $module);

    if (is_file($modulePath)) {
        require_once $modulePath;
    } else {
        throw new Exception('Module not found', 404);
    }
} else {
    require_once ROOT_PATH . '/src/modules/index.php';
}