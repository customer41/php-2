<?php

require __DIR__ . '/Models/Article.php';

$data = Article::findFew(3, 0, 'DESC');

include __DIR__ . '/templates/index.php';