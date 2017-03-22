<?php

require __DIR__ . '/Models/Article.php';

$article = Article::findById($_GET['id']);

include __DIR__ . '/templates/article.php';