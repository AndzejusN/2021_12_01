<?php
define('ROOT_PATH', dirname(__DIR__));

ini_set('error_reporting', E_ALL);

ini_set('log_errors', 1);
ini_set('error_log', sprintf('%s/logs/error-%s.log', ROOT_PATH, date('Y-m-d')));

ob_start();

try {
    require_once ROOT_PATH . '/src/functions.php';

    $envPath = ROOT_PATH . '/.env';

    if (file_exists($envPath)) {
        define('_ENV', parse_ini_file($envPath));
    } else {
        throw new Exception('Env file not found');
    }

    if (env('APP_DEBUG', FALSE)) {
        ini_set('display_errors', 1);
        ini_set('log_errors', 0);
    } else {
        ini_set('display_errors', 0);
    }

    require_once ROOT_PATH . '/src/app.php';

    ob_end_flush();
} catch (Exception $e) {
    ob_end_clean();

    $code = $e->getCode();
    $message = $e->getMessage();

    if ($code == 404) {
        http_response_code(404);
    } else {
        echo "Error: {$e->getMessage()}";
    }

    exit;
}