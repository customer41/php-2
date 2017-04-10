<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Exceptions\E404Exception;
use App\Models\Article;

class News
    extends Controller
{

    protected function actionAll()
    {
        $this->view->news = Article::findAll('DESC');
        $this->view->display(__DIR__ . '/../Templates/News/All.php');
    }

    protected function actionOne()
    {
        $article = Article::findById($_GET['id']);
        if (false == $article) {
            throw new E404Exception('Запрашиваемая новость не найдена.');
        }
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../Templates/News/One.php');
    }

}