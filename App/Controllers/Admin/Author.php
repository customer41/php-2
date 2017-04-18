<?php

namespace App\Controllers\Admin;

use App\Classes\AdminDataTable;
use App\Classes\Controller;
use App\Models\Author as Writer;

class Author
    extends Controller
{

    protected function actionShowTable()
    {
        $authors = Writer::findAll();
        $columns = [
            'Номер' => function($author) {
                return $author->id;
            },
            'Имя' => function($article) {
                return $article->name;
            }
        ];
        (new AdminDataTable($authors, $columns))->render(__DIR__ . '/../../Templates/Admin/Author/ShowTable.php');
    }

}