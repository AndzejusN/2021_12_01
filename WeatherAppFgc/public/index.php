<?php
define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/app.php';
require_once ROOT_PATH . '/vendor/autoload.php';
require_once ROOT_PATH . '/views/index.phtml';

(Dotenv\Dotenv::createImmutable(ROOT_PATH))->load();