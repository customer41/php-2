<?php

use App\Exceptions\DbException;
use App\Exceptions\E404Exception;
use App\Classes\LogException;
use App\Controllers\Error;

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $path);

$controllerName = $parts[1] ?: 'Index';
$controllerClassName = '\\App\\Controllers\\' . ucfirst($controllerName);
$methodName = $parts[2] ?? false ?: 'Default';

try {
    $controller = new $controllerClassName;
    $controller->action(ucfirst($methodName));
} catch (PDOException $ex) {

} catch (DbException $ex) {

} catch (E404Exception $ex) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
} finally {
    if (isset($ex)) {
        (new Error)->actionShow($ex);
        (new LogException($ex))->writeToLogFile();
    }
}