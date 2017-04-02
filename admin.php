<?php

require __DIR__ . '/autoload.php';

$view = new \App\Classes\View;
$view->news = \App\Models\Article::findAll('DESC');
$view->display('admin/admin.php');