<?php

namespace App\Models;

use App\Classes\Model;

class Article
    extends Model
{

    protected const TABLE = 'news';

    public $title;
    public $lead;

}