<?php

use App\Exceptions\DbException;
use App\Exceptions\E404Exception;
use App\Classes\LogException;
use App\Controllers\Error;
use App\Classes\Mail;

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$parts = explode('/', $path);
$parts = array_diff($parts, ['']);

$controllerName = 'Index';
$methodName = 'Default';

if (1 == count($parts)) {
    $controllerName = ucfirst($parts[1]);
} elseif (count($parts) > 1) {
    $methodName = ucfirst(array_pop($parts));
    foreach ($parts as $key => $part) {
        $parts[$key] = ucfirst($part);
    }
    $controllerName = implode('\\', $parts);
}

$controllerClassName = '\\App\\Controllers\\' . $controllerName;

try {
    $controller = new $controllerClassName;
    $controller->action($methodName);
} catch (PDOException $ex) {
    $mail = new Mail(
        'Admin',
        'Проблема с подключением к БД',
        'Возникла проблема с подключением к БД. ' . $ex->getMessage()
    );
    $mail->send();
    (new Error)->actionShow($ex);
} catch (DbException $ex) {
    (new Error)->actionShow($ex);
} catch (E404Exception $ex) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    (new Error)->actionShow($ex);
} finally {
    if (isset($ex)) {
        (new LogException($ex))->writeToLogFile();
    }
}