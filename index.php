<?php
require_once 'core/Request.php';
require_once 'core/Response.php';
require_once 'core/Router.php';
require_once 'core/BaseController.php';
require_once 'validator/ArticleValidator.php';

require_once 'controllers/IndexController.php';
include_once 'config/routes.php';

$router = new Router($routes);
$request = Request::createFromGlobals();

try {
    $route = $router->match($request->getPath());
} catch (\InvalidArgumentException $exception) {
    $route = [
        'controller' => 'index',
        'action' => 'index'
    ];
}

$controllers = [
    'index' => new IndexController(),
];

$controller = $controllers[$route['controller']];
$actionMethod = $route['action'] . 'Action';

/** @var Response $response */
$response = $controller->$actionMethod($request);
$response->send();