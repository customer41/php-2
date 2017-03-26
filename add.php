<?php

require __DIR__ . '/autoload.php';

if (!empty($_POST)) {
    $title = $_POST['title'];
    $lead = $_POST['lead'];
    if ('' != $title && '' != $lead) {
        $article = new \App\Models\Article();
        $article->title = $title;
        $article->lead = $lead;
        $article->save();
        header('Location: /admin.php');
        die;
    }
    $error = 'Пожалуйста, заполните все поля!';
}

include __DIR__ . '/templates/admin/add.php';