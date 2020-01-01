<?php

declare(strict_types=1);

define('APP_DEV', true);

// Model (for connection parameters, see constants in db.php)
// View (Twig)
define('APP_VIEW_PATH', __DIR__ . '/../src/View/');
define('APP_CACHE_PATH', __DIR__ . '/../temp/cache/');
define('APP_ASSET', '/assets/');

// Controller
define('APP_CONTROLLER_NAMESPACE', 'App\Controller\\');
define('APP_CONTROLLER_SUFFIX', 'Controller');