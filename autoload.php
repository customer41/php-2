<?php

function __autoload($class)
{
    $fileName =  __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($fileName)) {
        require $fileName;
    }
}