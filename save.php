<?php

session_start();

require __DIR__ . '/autoload.php';

if (empty($_POST)) {
    header('Location: /add.php');
} elseif ('' == $_POST['title'] || '' == $_POST['lead']) {
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['lead'] = $_POST['lead'];
    $_SESSION['error'] = 'Пожалуйста, заполните все поля!';
    header('Location: /add.php');
} else {
    $article = new \App\Models\Article();
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->author_id = $_POST['author_id'];
    $article->save();
    header('Location: /admin.php');
    session_destroy();
}