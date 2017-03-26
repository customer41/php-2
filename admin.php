<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findAll('DESC');

include __DIR__ . '/templates/admin/admin.php';