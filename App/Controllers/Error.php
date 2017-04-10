<?php

namespace App\Controllers;

use App\Classes\Controller;

class Error
    extends Controller
{

    public function actionShow(\Exception $ex)
    {
        $this->view->ex = $ex;
        $this->view->display(__DIR__ . '/../Templates/Error/Error.php');
    }

}