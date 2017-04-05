<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\Article;

class Index
    extends Controller
{

    protected function actionDefault()
    {
        $this->view->news = Article::findFew(3, 0, 'DESC');
        $this->view->display('Index/Default.php');
    }

}