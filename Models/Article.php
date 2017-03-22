<?php

require_once __DIR__ . '/../Classes/Db.php';
require_once __DIR__ . '/../Classes/Model.php';

class Article
    extends Model
{

    protected const TABLE = 'news';

    public $title;
    public $lead;

}