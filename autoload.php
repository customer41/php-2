<?php

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {

    $fileName =  __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($fileName)) {
        require $fileName;
    }

});