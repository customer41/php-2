<?php

namespace App\Controllers\Admin;

use App\Classes\Controller;
use App\Exceptions\E404Exception;
use App\Models\Article;
use App\Models\Author;

class News
    extends Controller
{

    protected function actionAll()
    {
        $this->view->news = Article::findAll('DESC');
        $this->view->display(__DIR__ . '/../../Templates/Admin/News/All.php');
    }

    protected function actionAdd()
    {
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../Templates/Admin/News/Add.php');
    }

    protected function actionSave()
    {
        if (empty($_POST)) {
            header('Location: /admin/news/all');
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
            header('Location: /admin/news/all');
        } catch (\MultiException $ex) {
            $this->view->errors = $ex;
            $this->view->article = $article;
            if ($article->isNew()) {
                $this->view->authors = Author::findAll();
                $this->view->display(__DIR__ . '/../../Templates/Admin/News/Add.php');
            } else {
                $this->view->display(__DIR__ . '/../../Templates/Admin/News/Edit.php');
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
        $this->view->display(__DIR__ . '/../../Templates/Admin/News/Edit.php');
    }

    protected function actionDelete()
    {
        $article = Article::findById($_GET['id']);
        if (false == $article) {
            throw new E404Exception('Запрашиваемая новость не найдена.');
        }
        $article->delete();
        header('Location: /admin/news/all');
    }

}