<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Exceptions\E404Exception;
use App\Exceptions\MultiException;
use App\Models\Article;
use App\Models\Author;

class AdminNews
    extends Controller
{

    protected function actionDefault()
    {
        $this->view->news = Article::findAll('DESC');
        $this->view->display(__DIR__ . '/../Templates/AdminNews/Default.php');
    }

    protected function actionAdd()
    {
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../Templates/AdminNews/Add.php');
    }

    protected function actionSave()
    {
        if (empty($_POST)) {
            header('Location: /adminNews');
            die;
        }
        try {
            if (isset($_GET['id'])) {
                $article = Article::findById($_GET['id']);
            } else {
                $article = new Article;
            }
            $article->fill($_POST);
            $article->save();
            header('Location: /adminNews');
        } catch (MultiException $ex) {
            $this->view->errors = $ex->getErrors();
            $this->view->article = $article;
            if ($article->isNew()) {
                $this->view->authors = Author::findAll();
                $this->view->display(__DIR__ . '/../Templates/AdminNews/Add.php');
            } else {
                $this->view->display(__DIR__ . '/../Templates/AdminNews/Edit.php');
            }
        }
    }

    protected function actionEdit()
    {
        $article = Article::findById($_GET['id']);
        if (false == $article) {
            throw new E404Exception('Запрашиваемая новость не найдена.');
        }
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../Templates/AdminNews/Edit.php');
    }

    protected function actionDelete()
    {
        $article = Article::findById($_GET['id']);
        if (false == $article) {
            throw new E404Exception('Запрашиваемая новость не найдена.');
        }
        $article->delete();
        header('Location: /adminNews');
    }

}