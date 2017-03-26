<?php

require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findById($_GET['id']);
if (false == $article) {
    header('Location: /admin.php');
    die;
}

if (!empty($_POST)) {
    $title = $_POST['title'];
    $lead = $_POST['lead'];
    if ('' != $title && '' != $lead) {
        $article->title = $title;
        $article->lead = $lead;
        $article->save();
        header('Location: /admin.php');
        die;
    }
}

include __DIR__ . '/templates/admin/edit.php';