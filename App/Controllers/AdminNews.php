<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\Article;
use App\Models\Author;

class AdminNews
    extends Controller
{

    protected function actionDefault()
    {
        $this->view->news = Article::findAll('DESC');
        $this->view->display('AdminNews/Default.php');
    }

    protected function actionAdd()
    {
        session_start();

        $this->view->authors = Author::findAll();
        $this->view->title = $_SESSION['title'] ?? '';
        $this->view->lead = $_SESSION['lead'] ?? '';
        $this->view->error = $_SESSION['error'] ?? '';
        $this->view->display('AdminNews/Add.php');

        session_destroy();
    }

    protected function actionSave()
    {
        session_start();

        if (empty($_POST)) {
            header('Location: /adminNews/add');
        } elseif ('' == $_POST['title'] || '' == $_POST['lead']) {
            $_SESSION['title'] = $_POST['title'];
            $_SESSION['lead'] = $_POST['lead'];
            $_SESSION['error'] = 'Пожалуйста, заполните все поля!';
            header('Location: /adminNews/add');
        } else {
            $article = new Article;
            $article->title = $_POST['title'];
            $article->lead = $_POST['lead'];
            $article->author = Author::findById($_POST['author_id']);
            $article->save();
            header('Location: /adminNews');

            session_destroy();
        }
    }

    protected function actionEdit()
    {
        $article = Article::findById($_GET['id']);
        if (false == $article) {
            header('Location: /adminNews');
            die;
        }
        if (!empty($_POST)) {
            $title = $_POST['title'];
            $lead = $_POST['lead'];
            if ('' != $title && '' != $lead) {
                $article->title = $title;
                $article->lead = $lead;
                $article->save();
                header('Location: /adminNews');
                die;
            }
        }
        $this->view->article = $article;
        $this->view->display('AdminNews/Edit.php');
    }

    protected function actionDelete()
    {
        $article = Article::findById($_GET['id']);
        if (false != $article) {
            $article->delete();
        }
        header('Location: /adminNews');
    }

}