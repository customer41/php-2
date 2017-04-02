<?php

require __DIR__ . '/autoload.php';

$view = new \App\Classes\View;
$view->article = \App\Models\Article::findById($_GET['id']);
$view->display('article.php');