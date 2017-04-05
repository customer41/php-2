<?php

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $path);

$controllerName = $parts[1] ?: 'Index';
$controllerClassName = '\\App\\Controllers\\' . ucfirst($controllerName);
$controller = new $controllerClassName;

$methodName = $parts[2] ?? false ?: 'Default';
$controller->action(ucfirst($methodName));