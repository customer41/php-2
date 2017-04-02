<?php

session_start();

require __DIR__ . '/autoload.php';

$view = new \App\Classes\View;
$view->authors = \App\Models\Author::findAll();
$view->title = $_SESSION['title'] ?? '';
$view->lead = $_SESSION['lead'] ?? '';
$view->error = $_SESSION['error'] ?? '';
$view->display('admin/add.php');

session_destroy();