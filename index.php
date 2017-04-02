<?php

require __DIR__ . '/autoload.php';

$view = new \App\Classes\View;
$view->news = \App\Models\Article::findFew(3, 0, 'DESC');
$view->display('index.php');