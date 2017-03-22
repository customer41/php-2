<?php

require_once __DIR__ . '/Models/Article.php';

$data = Article::findAll();

var_dump($data);