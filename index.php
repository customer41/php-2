<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findFew(3, 0, 'DESC');

include __DIR__ . '/templates/index.php';