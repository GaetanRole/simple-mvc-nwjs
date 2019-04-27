<?php

$dispatcher = FastRoute\simpleDispatcher(
    static function (FastRoute\RouteCollector $r) {
        /* You can add your routes here */
        $r->addRoute('GET', '/', 'Default/indexAction');
        $r->addRoute('GET', '/showTables/{name}', 'DB/indexAction');
    }
);

// Fetch method and URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
case FastRoute\Dispatcher::NOT_FOUND:
    echo '[ERROR] : Dispatcher error 404. No route found.';
    die(404);
        break;
case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    echo '[ERROR] : Dispatcher error 405. Method not allowed.';
    $allowedMethods = $routeInfo[1];
    die(405);
        break;
case FastRoute\Dispatcher::FOUND:
    $handler = $routeInfo[1];
    $vars = $routeInfo[2];
    list($class, $method) = explode('/', $handler, 2);
    $class = APP_CONTROLLER_NAMESPACE . $class . APP_CONTROLLER_SUFFIX;
    echo call_user_func_array(array(new $class, $method), $vars);
    break;
}
