<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\Article;

class News
    extends Controller
{

    protected function actionAll()
    {
        $this->view->news = Article::findAll('DESC');
        $this->view->display('News/All.php');
    }

    protected function actionOne()
    {
        $this->view->article = Article::findById($_GET['id']);
        $this->view->display('News/One.php');
    }

}