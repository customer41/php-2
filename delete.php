<?php

require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findById($_GET['id']);

if (false != $article) {
    $article->delete();
}

header('Location: /admin.php');